import customizerStyle from './_template-customizer/_template-customizer.scss';
import customizerMarkup from './_template-customizer/_template-customizer.html';

const CSS_FILENAME_PATTERN = '%name%.css';
const CONTROLS = [
  'rtl',
  'style',
  'headerType',
  'contentLayout',
  'layoutCollapsed',
  'showDropdownOnHover',
  'layoutNavbarOptions',
  'layoutFooterFixed',
  'themes'
];
const STYLES = ['light', 'dark', 'system'];
const NAVBAR_OPTIONS = ['sticky', 'static', 'hidden'];
let layoutNavbarVar;
const cl = document.documentElement.classList;

if (cl.contains('layout-navbar-fixed')) layoutNavbarVar = 'sticky';
else if (cl.contains('layout-navbar-hidden')) layoutNavbarVar = 'hidden';
else layoutNavbarVar = 'static';

const DISPLAY_CUSTOMIZER = true;
const DEFAULT_THEME = document.getElementsByTagName('HTML')[0].getAttribute('data-theme') || 0;
const DEFAULT_STYLE = cl.contains('dark-style') ? 'dark' : 'light';
const DEFAULT_TEXT_DIR = document.documentElement.getAttribute('dir') === 'rtl';
const DEFAULT_MENU_COLLAPSED = !!cl.contains('layout-menu-collapsed');
const DEFAULT_SHOW_DROPDOWN_ON_HOVER = true;
const DEFAULT_NAVBAR_FIXED = layoutNavbarVar;
const DEFAULT_CONTENT_LAYOUT = cl.contains('layout-wide') ? 'wide' : 'compact';
const DEFAULT_FOOTER_FIXED = !!cl.contains('layout-footer-fixed');

let headerType;
if (cl.contains('layout-menu-offcanvas')) {
  headerType = 'static-offcanvas';
} else if (cl.contains('layout-menu-fixed')) {
  headerType = 'fixed';
} else if (cl.contains('layout-menu-fixed-offcanvas')) {
  headerType = 'fixed-offcanvas';
} else {
  headerType = 'static';
}
const DEFAULT_LAYOUT_TYPE = headerType;

class TemplateCustomizer {
  constructor({
    cssPath,
    themesPath,
    cssFilenamePattern,
    displayCustomizer,
    controls,
    defaultTextDir,
    defaultHeaderType,
    defaultContentLayout,
    defaultMenuCollapsed,
    defaultShowDropdownOnHover,
    defaultNavbarType,
    defaultFooterFixed,
    styles,
    navbarOptions,
    defaultStyle,
    availableContentLayouts,
    availableDirections,
    availableStyles,
    availableThemes,
    availableLayouts,
    availableHeaderTypes,
    availableNavbarOptions,
    defaultTheme,
    pathResolver,
    onSettingsChange,
    lang
  }) {
    if (this._ssr) return;
    if (!window.Helpers) throw new Error('window.Helpers required.');
    this.settings = {};
    this.settings.cssPath = cssPath;
    this.settings.themesPath = themesPath;
    this.settings.cssFilenamePattern = cssFilenamePattern || CSS_FILENAME_PATTERN;
    this.settings.displayCustomizer = typeof displayCustomizer !== 'undefined' ? displayCustomizer : DISPLAY_CUSTOMIZER;

    this.settings.controls = controls || CONTROLS;
    this.settings.defaultTextDir = defaultTextDir === 'rtl' ? true : false || DEFAULT_TEXT_DIR;
    this.settings.defaultHeaderType = defaultHeaderType || DEFAULT_LAYOUT_TYPE;
    this.settings.defaultMenuCollapsed =
      typeof defaultMenuCollapsed !== 'undefined' ? defaultMenuCollapsed : DEFAULT_MENU_COLLAPSED;
    this.settings.defaultContentLayout =
      typeof defaultContentLayout !== 'undefined' ? defaultContentLayout : DEFAULT_CONTENT_LAYOUT;
    this.settings.defaultShowDropdownOnHover =
      typeof defaultShowDropdownOnHover !== 'undefined' ? defaultShowDropdownOnHover : DEFAULT_SHOW_DROPDOWN_ON_HOVER;
    this.settings.defaultNavbarType =
      typeof defaultNavbarType !== 'undefined' ? defaultNavbarType : DEFAULT_NAVBAR_FIXED;
    this.settings.defaultFooterFixed =
      typeof defaultFooterFixed !== 'undefined' ? defaultFooterFixed : DEFAULT_FOOTER_FIXED;

    this.settings.availableDirections = availableDirections || TemplateCustomizer.DIRECTIONS;
    this.settings.availableStyles = availableStyles || TemplateCustomizer.STYLES;
    this.settings.availableThemes = availableThemes || TemplateCustomizer.THEMES;
    this.settings.availableHeaderTypes = availableHeaderTypes || TemplateCustomizer.HEADER_TYPES;
    this.settings.availableContentLayouts = availableContentLayouts || TemplateCustomizer.CONTENT;
    this.settings.availableLayouts = availableLayouts || TemplateCustomizer.LAYOUTS;
    this.settings.availableNavbarOptions = availableNavbarOptions || TemplateCustomizer.NAVBAR_OPTIONS;
    this.settings.defaultTheme = this._getDefaultTheme(
      typeof defaultTheme !== 'undefined' ? defaultTheme : DEFAULT_THEME
    );

    this.settings.styles = styles || STYLES;
    this.settings.navbarOptions = navbarOptions || NAVBAR_OPTIONS;
    this.settings.defaultStyle = defaultStyle || DEFAULT_STYLE;
    this.settings.lang = lang || 'en';
    this.pathResolver = pathResolver || (p => p);

    if (this.settings.styles.length < 2) {
      const i = this.settings.controls.indexOf('style');
      if (i !== -1) {
        this.settings.controls = this.settings.controls.slice(0, i).concat(this.settings.controls.slice(i + 1));
      }
    }
    this.settings.onSettingsChange = typeof onSettingsChange === 'function' ? onSettingsChange : () => {};

    this._loadSettings();

    this._listeners = [];
    this._controls = {};

    this._initDirection();
    this._initStyle();
    this._initTheme();
    this.setLayoutType(this.settings.headerType, false);
    this.setContentLayout(this.settings.contentLayout, false);
    this.setDropdownOnHover(this.settings.showDropdownOnHover, false);
    this.setLayoutNavbarOption(this.settings.layoutNavbarOptions, false);
    this.setLayoutFooterFixed(this.settings.layoutFooterFixed, false);
    this._setup();
  }

  setRtl(rtl) {
    if (!this._hasControls('rtl')) return;
    this._setSetting('Rtl', String(rtl));
    window.location.reload();
  }

  setContentLayout(contentLayout, updateStorage = true) {
    if (!this._hasControls('contentLayout')) return;
    this.settings.contentLayout = contentLayout;
    if (updateStorage) this._setSetting('contentLayout', contentLayout);

    window.Helpers.setContentLayout(contentLayout);

    if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);
  }

  setStyle(style) {
    this._setSetting('Style', style);

    window.location.reload();
  }

  setTheme(themeName, updateStorage = true, cb = null) {
    if (!this._hasControls('themes')) return;

    const theme = this._getThemeByName(themeName);

    if (!theme) return;

    this.settings.theme = theme;
    if (updateStorage) this._setSetting('Theme', themeName);

    const themeUrl = this.pathResolver(
      this.settings.themesPath +
        this.settings.cssFilenamePattern.replace(
          '%name%',
          themeName + (this.settings.style !== 'light' ? `-${this.settings.style}` : '')
        )
    );

    this._loadStylesheets({ [themeUrl]: document.querySelector('.template-customizer-theme-css') }, cb || (() => {}));

    if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);
  }

  setLayoutType(pos, updateStorage = true) {
    if (!this._hasControls('headerType')) return;
    if (pos !== 'static' && pos !== 'static-offcanvas' && pos !== 'fixed' && pos !== 'fixed-offcanvas') return;

    this.settings.headerType = pos;
    if (updateStorage) this._setSetting('LayoutType', pos);

    window.Helpers.setPosition(
      pos === 'fixed' || pos === 'fixed-offcanvas',
      pos === 'static-offcanvas' || pos === 'fixed-offcanvas'
    );

    if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);

    // Perfectscrollbar change on Layout change
    let menuScroll = window.Helpers.menuPsScroll;
    const PerfectScrollbarLib = window.PerfectScrollbar;

    if (this.settings.headerType === 'fixed' || this.settings.headerType === 'fixed-offcanvas') {
      // Set perfectscrollbar wheelPropagation false for fixed layout
      if (PerfectScrollbarLib && menuScroll) {
        window.Helpers.menuPsScroll.destroy();
        menuScroll = new PerfectScrollbarLib(document.querySelector('.menu-inner'), {
          suppressScrollX: true,
          wheelPropagation: false
        });
        window.Helpers.menuPsScroll = menuScroll;
      }
    } else if (menuScroll) {
      // Destroy perfectscrollbar for static layout
      window.Helpers.menuPsScroll.destroy();
    }
  }

  setDropdownOnHover(open, updateStorage = true) {
    if (!this._hasControls('showDropdownOnHover')) return;
    this.settings.showDropdownOnHover = open;
    if (updateStorage) this._setSetting('ShowDropdownOnHover', open);

    if (window.Helpers.mainMenu) {
      window.Helpers.mainMenu.destroy();
      config.showDropdownOnHover = open;

      const { Menu } = window;

      window.Helpers.mainMenu = new Menu(document.getElementById('layout-menu'), {
        orientation: 'horizontal',
        closeChildren: true,
        showDropdownOnHover: config.showDropdownOnHover
      });
    }

    if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);
  }

  setLayoutNavbarOption(navbarType, updateStorage = true) {
    if (!this._hasControls('layoutNavbarOptions')) return;
    this.settings.layoutNavbarOptions = navbarType;
    if (updateStorage) this._setSetting('FixedNavbarOption', navbarType);

    window.Helpers.setNavbar(navbarType);

    if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);
  }

  setLayoutFooterFixed(fixed, updateStorage = true) {
    // if (!this._hasControls('layoutFooterFixed')) return
    this.settings.layoutFooterFixed = fixed;
    if (updateStorage) this._setSetting('FixedFooter', fixed);

    window.Helpers.setFooterFixed(fixed);

    if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);
  }

  setLang(lang, updateStorage = true, force = false) {
    if (lang === this.settings.lang && !force) return;
    if (!TemplateCustomizer.LANGUAGES[lang]) throw new Error(`Language "${lang}" not found!`);

    const t = TemplateCustomizer.LANGUAGES[lang];

    [
      'panel_header',
      'panel_sub_header',
      'theming_header',
      'style_label',
      'style_switch_light',
      'style_switch_dark',
      'layout_header',
      'layout_label',
      'layout_header_label',
      'content_label',
      'layout_static',
      'layout_offcanvas',
      'layout_fixed',
      'layout_fixed_offcanvas',
      'layout_dd_open_label',
      'layout_navbar_label',
      'layout_footer_label',
      'misc_header',
      'theme_label',
      'direction_label'
    ].forEach(key => {
      const el = this.container.querySelector(`.template-customizer-t-${key}`);
      // eslint-disable-next-line no-unused-expressions
      el && (el.textContent = t[key]);
    });

    const tt = t.themes || {};
    const themes = this.container.querySelectorAll('.template-customizer-theme-item') || [];

    for (let i = 0, l = themes.length; i < l; i++) {
      const themeName = themes[i].querySelector('input[type="radio"]').value;
      themes[i].querySelector('.template-customizer-theme-name').textContent =
        tt[themeName] || this._getThemeByName(themeName).title;
    }

    this.settings.lang = lang;

    if (updateStorage) this._setSetting('Lang', lang);

    if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);
  }

  // Update theme settings control
  update() {
    if (this._ssr) return;

    const hasNavbar = !!document.querySelector('.layout-navbar');
    const hasMenu = !!document.querySelector('.layout-menu');
    const hasHorizontalMenu = !!document.querySelector('.layout-menu-horizontal.menu, .layout-menu-horizontal .menu');
    const isLayout1 = !!document.querySelector('.layout-wrapper.layout-navbar-full');
    const hasFooter = !!document.querySelector('.content-footer');

    if (this._controls.showDropdownOnHover) {
      if (hasMenu) {
        this._controls.showDropdownOnHover.setAttribute('disabled', 'disabled');
        this._controls.showDropdownOnHover.classList.add('disabled');
      } else {
        this._controls.showDropdownOnHover.removeAttribute('disabled');
        this._controls.showDropdownOnHover.classList.remove('disabled');
      }
    }

    if (this._controls.layoutNavbarOptions) {
      if (!hasNavbar) {
        this._controls.layoutNavbarOptions.setAttribute('disabled', 'disabled');
        this._controls.layoutNavbarOptionsW.classList.add('disabled');
      } else {
        this._controls.layoutNavbarOptions.removeAttribute('disabled');
        this._controls.layoutNavbarOptionsW.classList.remove('disabled');
      }

      //  Horizontal menu fixed layout - disabled fixed navbar switch
      if (hasHorizontalMenu && hasNavbar && this.settings.headerType === 'fixed') {
        this._controls.layoutNavbarOptions.setAttribute('disabled', 'disabled');
        this._controls.layoutNavbarOptionsW.classList.add('disabled');
      }
    }

    if (this._controls.layoutFooterFixed) {
      if (!hasFooter) {
        this._controls.layoutFooterFixed.setAttribute('disabled', 'disabled');
        this._controls.layoutFooterFixedW.classList.add('disabled');
      } else {
        this._controls.layoutFooterFixed.removeAttribute('disabled');
        this._controls.layoutFooterFixedW.classList.remove('disabled');
      }
    }

    if (this._controls.headerType) {
      // ? Uncomment If using offcanvas layout
      /*
      if (!hasMenu) {
        this._controls.headerType.querySelector('[value="static-offcanvas"]').setAttribute('disabled', 'disabled')
        this._controls.headerType.querySelector('[value="fixed-offcanvas"]').setAttribute('disabled', 'disabled')
      } else {
        this._controls.headerType.querySelector('[value="static-offcanvas"]').removeAttribute('disabled')
        this._controls.headerType.querySelector('[value="fixed-offcanvas"]').removeAttribute('disabled')
      }
      */

      // Disable menu layouts options if menu (vertical or horizontal) is not there
      // if ((!hasNavbar && !hasMenu) || (!hasMenu && !isLayout1)) {
      if (hasMenu || hasHorizontalMenu) {
        // (Updated condition)
        this._controls.headerType.removeAttribute('disabled');
      } else {
        this._controls.headerType.setAttribute('disabled', 'disabled');
      }
    }
  }

  // Clear local storage
  clearLocalStorage() {
    if (this._ssr) return;
    const layoutName = this._getLayoutName();
    const keysToRemove = [
      'Theme',
      'Style',
      'LayoutCollapsed',
      'FixedNavbarOption',
      'LayoutType',
      'contentLayout',
      'Rtl',
      'Lang'
    ];

    keysToRemove.forEach(key => {
      const localStorageKey = `templateCustomizer-${layoutName}--${key}`;
      localStorage.removeItem(localStorageKey);
    });

    this._showResetBtnNotification(false);
  }

  // Clear local storage
  destroy() {
    if (this._ssr) return;

    this._cleanup();

    this.settings = null;
    this.container.parentNode.removeChild(this.container);
    this.container = null;
  }

  _loadSettings() {
    // Get settings

    // const cl = document.documentElement.classList;
    const rtl = this._getSetting('Rtl');
    const style = this._getSetting('Style');
    const theme = this._getSetting('Theme');
    const contentLayout = this._getSetting('contentLayout');
    const collapsedMenu = this._getSetting('LayoutCollapsed'); // Value will be set from main.js
    const dropdownOnHover = this._getSetting('ShowDropdownOnHover'); // Value will be set from main.js
    const navbarOption = this._getSetting('FixedNavbarOption');
    const fixedFooter = this._getSetting('FixedFooter');
    const lType = this._getSetting('LayoutType');

    if (
      rtl !== '' ||
      style !== '' ||
      theme !== '' ||
      contentLayout !== '' ||
      collapsedMenu !== '' ||
      navbarOption !== '' ||
      lType !== ''
    ) {
      this._showResetBtnNotification(true);
    } else {
      this._showResetBtnNotification(false);
    }
    let type;

    if (lType !== '' && ['static', 'static-offcanvas', 'fixed', 'fixed-offcanvas'].indexOf(lType) !== -1) {
      type = lType;
    } else {
      type = this.settings.defaultHeaderType;
    }
    this.settings.headerType = type;

    // ! Set settings by following priority: Local Storage, Theme Config, HTML Classes
    this.settings.rtl = rtl !== '' ? rtl === 'true' : this.settings.defaultTextDir;
    this.settings.stylesOpt = this.settings.styles.indexOf(style) !== -1 ? style : this.settings.defaultStyle;
    if (this.settings.stylesOpt === 'system') {
      if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        this.settings.style = 'dark';
        document.cookie = `style=dark`; // to fix laravel system mode issue
      } else {
        this.settings.style = 'light';
        document.cookie = `style=light`; // to fix laravel system mode issue
      }
    } else {
      document.cookie = `style=; expires=Thu, 01 Jan 2000 00:00:00 UTC; path=/;`; // to fix laravel system mode issue
      this.settings.style = this.settings.styles.indexOf(style) !== -1 ? style : this.settings.defaultStyle;
    }
    if (this.settings.styles.indexOf(this.settings.style) === -1) {
      // eslint-disable-next-line prefer-destructuring
      this.settings.style = this.settings.styles[0];
    }
    this.settings.contentLayout = contentLayout !== '' ? contentLayout : this.settings.defaultContentLayout;
    this.settings.layoutCollapsed =
      collapsedMenu !== '' ? collapsedMenu === 'true' : this.settings.defaultMenuCollapsed;
    this.settings.showDropdownOnHover =
      dropdownOnHover !== '' ? dropdownOnHover === 'true' : this.settings.defaultShowDropdownOnHover;
    let navType;
    if (navbarOption !== '' && ['static', 'sticky', 'hidden'].indexOf(navbarOption) !== -1) {
      navType = navbarOption;
    } else {
      navType = this.settings.defaultNavbarType;
    }

    this.settings.layoutNavbarOptions = navType;
    this.settings.layoutFooterFixed = fixedFooter !== '' ? fixedFooter === 'true' : this.settings.defaultFooterFixed;

    this.settings.theme = this._getThemeByName(this._getSetting('Theme'), true);

    // Filter options depending on available controls
    if (!this._hasControls('rtl')) this.settings.rtl = document.documentElement.getAttribute('dir') === 'rtl';
    if (!this._hasControls('style')) this.settings.style = cl.contains('dark-style') ? 'dark' : 'light';
    if (!this._hasControls('contentLayout')) this.settings.contentLayout = null;
    if (!this._hasControls('headerType')) this.settings.headerType = null;
    if (!this._hasControls('layoutCollapsed')) this.settings.layoutCollapsed = null;
    if (!this._hasControls('layoutNavbarOptions')) this.settings.layoutNavbarOptions = null;
    if (!this._hasControls('themes')) this.settings.theme = null;
  }

  // Setup theme settings controls and events
  _setup(_container = document) {
    // Function to create customizer elements
    const createOptionElement = (nameVal, title, inputName, isDarkStyle, image) => {
      image = image || nameVal;

      return this._getElementFromString(`<div class="col-4 px-2">
      <div class="form-check custom-option custom-option-icon mb-0">
        <label class="form-check-label custom-option-content p-0" for="${inputName}${nameVal}">
          <span class="custom-option-body mb-0">
            <img src="${assetsPath}img/customizer/${image}${
        isDarkStyle ? '-dark' : ''
      }.svg" alt="${title}" class="img-fluid scaleX-n1-rtl" />
          </span>
          <input
            name="${inputName}"
            class="form-check-input d-none"
            type="radio"
            value="${nameVal}"
            id="${inputName}${nameVal}" />
        </label>
      </div>
      <label class="form-check-label small text-nowrap" for="${inputName}${nameVal}">${title}</label>
    </div>`);
    };

    this._cleanup();
    this.container = this._getElementFromString(customizerMarkup);

    // Customizer visibility condition
    //
    const customizerW = this.container;
    if (this.settings.displayCustomizer) customizerW.setAttribute('style', 'visibility: visible');
    else customizerW.setAttribute('style', 'visibility: hidden');

    // Open btn
    //
    const openBtn = this.container.querySelector('.template-customizer-open-btn');
    const openBtnCb = () => {
      this.container.classList.add('template-customizer-open');
      this.update();

      if (this._updateInterval) clearInterval(this._updateInterval);
      this._updateInterval = setInterval(() => {
        this.update();
      }, 500);
    };
    openBtn.addEventListener('click', openBtnCb);
    this._listeners.push([openBtn, 'click', openBtnCb]);

    // Reset btn
    //

    const resetBtn = this.container.querySelector('.template-customizer-reset-btn');
    const resetBtnCb = () => {
      this.clearLocalStorage();
      window.location.reload();
    };
    resetBtn.addEventListener('click', resetBtnCb);
    this._listeners.push([resetBtn, 'click', resetBtnCb]);

    // Close btn
    //

    const closeBtn = this.container.querySelector('.template-customizer-close-btn');
    const closeBtnCb = () => {
      this.container.classList.remove('template-customizer-open');

      if (this._updateInterval) {
        clearInterval(this._updateInterval);
        this._updateInterval = null;
      }
    };
    closeBtn.addEventListener('click', closeBtnCb);
    this._listeners.push([closeBtn, 'click', closeBtnCb]);

    // Style
    const styleW = this.container.querySelector('.template-customizer-style');
    const styleOpt = styleW.querySelector('.template-customizer-styles-options');

    if (!this._hasControls('style')) {
      styleW.parentNode.removeChild(styleW);
    } else {
      this.settings.availableStyles.forEach(style => {
        const styleEl = createOptionElement(style.name, style.title, 'customRadioIcon', cl.contains('dark-style'));
        styleOpt.appendChild(styleEl);
      });
      styleOpt.querySelector(`input[value="${this.settings.stylesOpt}"]`).setAttribute('checked', 'checked');

      // styleCb
      const styleCb = e => {
        this._loadingState(true);
        this.setStyle(e.target.value, true, () => {
          this._loadingState(false);
        });
      };

      styleOpt.addEventListener('change', styleCb);
      this._listeners.push([styleOpt, 'change', styleCb]);
    }

    // Theme
    const themesW = this.container.querySelector('.template-customizer-themes');
    const themesWInner = themesW.querySelector('.template-customizer-themes-options');

    if (!this._hasControls('themes')) {
      themesW.parentNode.removeChild(themesW);
    } else {
      this.settings.availableThemes.forEach(theme => {
        let image = '';
        if (theme.name === 'theme-semi-dark') {
          image = `semi-dark`;
        } else if (theme.name === 'theme-bordered') {
          image = `border`;
        } else {
          image = `default`;
        }
        const themeEl = createOptionElement(theme.name, theme.title, 'themeRadios', cl.contains('dark-style'), image);
        themesWInner.appendChild(themeEl);
      });

      themesWInner.querySelector(`input[value="${this.settings.theme.name}"]`).setAttribute('checked', 'checked');

      const themeCb = e => {
        this._loading = true;
        this._loadingState(true, true);

        this.setTheme(e.target.value, true, () => {
          this._loading = false;
          this._loadingState(false, true);
        });
      };

      themesWInner.addEventListener('change', themeCb);
      this._listeners.push([themesWInner, 'change', themeCb]);
    }
    const themingW = this.container.querySelector('.template-customizer-theming');

    if (!this._hasControls('style') && !this._hasControls('themes')) {
      themingW.parentNode.removeChild(themingW);
    }

    // Layout wrapper
    const layoutW = this.container.querySelector('.template-customizer-layout');

    if (!this._hasControls('rtl headerType contentLayout layoutCollapsed layoutNavbarOptions', true)) {
      layoutW.parentNode.removeChild(layoutW);
    } else {
      // RTL
      //

      const directionW = this.container.querySelector('.template-customizer-directions');
      // ? Hide RTL control in following 2 case
      if (!this._hasControls('rtl') || !rtlSupport) {
        directionW.parentNode.removeChild(directionW);
      } else {
        const directionOpt = directionW.querySelector('.template-customizer-directions-options');
        this.settings.availableDirections.forEach(dir => {
          const dirEl = createOptionElement(dir.name, dir.title, 'directionRadioIcon', cl.contains('dark-style'));
          directionOpt.appendChild(dirEl);
        });
        directionOpt
          .querySelector(`input[value="${this.settings.rtl ? 'rtl' : 'ltr'}"]`)
          .setAttribute('checked', 'checked');

        const rtlCb = e => {
          this._loadingState(true);
          this.setRtl(e.target.value === 'rtl', true, () => {
            this._loadingState(false);
          });
          if (e.target.value === 'rtl') {
            window.location.href = baseUrl + 'lang/ar';
          } else {
            window.location.href = baseUrl + 'lang/en';
          }
        };

        directionOpt.addEventListener('change', rtlCb);
        this._listeners.push([directionOpt, 'change', rtlCb]);
      }

      // Header Layout Type
      const headerTypeW = this.container.querySelector('.template-customizer-headerOptions');
      const templateName = document.documentElement.getAttribute('data-template').split('-');
      if (!this._hasControls('headerType')) {
        headerTypeW.parentNode.removeChild(headerTypeW);
      } else {
        const headerOpt = headerTypeW.querySelector('.template-customizer-header-options');
        setTimeout(() => {
          if (templateName.includes('vertical')) {
            headerTypeW.parentNode.removeChild(headerTypeW);
          }
        }, 100);
        this.settings.availableHeaderTypes.forEach(header => {
          const headerEl = createOptionElement(
            header.name,
            header.title,
            'headerRadioIcon',
            cl.contains('dark-style'),
            `horizontal-${header.name}`
          );
          headerOpt.appendChild(headerEl);
        });
        headerOpt.querySelector(`input[value="${this.settings.headerType}"]`).setAttribute('checked', 'checked');

        const headerTypeCb = e => {
          this.setLayoutType(e.target.value);
        };

        headerOpt.addEventListener('change', headerTypeCb);
        this._listeners.push([headerOpt, 'change', headerTypeCb]);
      }

      // CONTENT
      //

      const contentWrapper = this.container.querySelector('.template-customizer-content');
      // ? Hide RTL control in following 2 case
      if (!this._hasControls('contentLayout')) {
        contentWrapper.parentNode.removeChild(contentWrapper);
      } else {
        const contentOpt = contentWrapper.querySelector('.template-customizer-content-options');
        this.settings.availableContentLayouts.forEach(content => {
          const contentEl = createOptionElement(
            content.name,
            content.title,
            'contentRadioIcon',
            cl.contains('dark-style')
          );
          contentOpt.appendChild(contentEl);
        });
        contentOpt.querySelector(`input[value="${this.settings.contentLayout}"]`).setAttribute('checked', 'checked');

        const contentCb = e => {
          this._loading = true;
          this._loadingState(true, true);
          this.setContentLayout(e.target.value, true, () => {
            this._loading = false;
            this._loadingState(false, true);
          });
        };

        contentOpt.addEventListener('change', contentCb);
        this._listeners.push([contentOpt, 'change', contentCb]);
      }

      // Layouts Collapsed: Expanded, Collapsed
      const layoutCollapsedW = this.container.querySelector('.template-customizer-layouts');

      if (!this._hasControls('layoutCollapsed')) {
        layoutCollapsedW.parentNode.removeChild(layoutCollapsedW);
      } else {
        setTimeout(() => {
          if (document.querySelector('.layout-menu-horizontal')) {
            layoutCollapsedW.parentNode.removeChild(layoutCollapsedW);
          }
        }, 100);
        const layoutCollapsedOpt = layoutCollapsedW.querySelector('.template-customizer-layouts-options');
        this.settings.availableLayouts.forEach(layoutOpt => {
          const layoutsEl = createOptionElement(
            layoutOpt.name,
            layoutOpt.title,
            'layoutsRadios',
            cl.contains('dark-style')
          );
          layoutCollapsedOpt.appendChild(layoutsEl);
        });
        layoutCollapsedOpt
          .querySelector(`input[value="${this.settings.layoutCollapsed ? 'collapsed' : 'expanded'}"]`)
          .setAttribute('checked', 'checked');

        const layoutCb = e => {
          window.Helpers.setCollapsed(e.target.value === 'collapsed', true);

          this._setSetting('LayoutCollapsed', e.target.value === 'collapsed');
        };

        layoutCollapsedOpt.addEventListener('change', layoutCb);
        this._listeners.push([layoutCollapsedOpt, 'change', layoutCb]);
      }

      // Layout Navbar Options
      const navbarOption = this.container.querySelector('.template-customizer-layoutNavbarOptions');

      if (!this._hasControls('layoutNavbarOptions')) {
        navbarOption.parentNode.removeChild(navbarOption);
      } else {
        setTimeout(() => {
          if (templateName.includes('horizontal')) {
            navbarOption.parentNode.removeChild(navbarOption);
          }
        }, 100);
        const navbarTypeOpt = navbarOption.querySelector('.template-customizer-navbar-options');
        this.settings.availableNavbarOptions.forEach(navbarOpt => {
          const navbarEl = createOptionElement(
            navbarOpt.name,
            navbarOpt.title,
            'navbarOptionRadios',
            cl.contains('dark-style')
          );
          navbarTypeOpt.appendChild(navbarEl);
        });
        // check navbar option from settings
        navbarTypeOpt
          .querySelector(`input[value="${this.settings.layoutNavbarOptions}"]`)
          .setAttribute('checked', 'checked');
        const navbarCb = e => {
          this._loading = true;
          this._loadingState(true, true);
          this.setLayoutNavbarOption(e.target.value, true, () => {
            this._loading = false;
            this._loadingState(false, true);
          });
        };

        navbarTypeOpt.addEventListener('change', navbarCb);
        this._listeners.push([navbarTypeOpt, 'change', navbarCb]);
      }
    }

    setTimeout(() => {
      const layoutCustom = this.container.querySelector('.template-customizer-layout');
      if (document.querySelector('.menu-vertical')) {
        if (!this._hasControls('rtl contentLayout layoutCollapsed layoutNavbarOptions', true)) {
          if (layoutCustom) {
            layoutCustom.parentNode.removeChild(layoutCustom);
          }
        }
      } else if (document.querySelector('.menu-horizontal')) {
        if (!this._hasControls('rtl contentLayout headerType', true)) {
          if (layoutCustom) {
            layoutCustom.parentNode.removeChild(layoutCustom);
          }
        }
      }
    }, 100);

    // Set language
    this.setLang(this.settings.lang, false, true);

    // Append container
    if (_container === document) {
      if (_container.body) {
        _container.body.appendChild(this.container);
      } else {
        window.addEventListener('DOMContentLoaded', () => _container.body.appendChild(this.container));
      }
    } else {
      _container.appendChild(this.container);
    }
  }

  _initDirection() {
    if (this._hasControls('rtl')) document.documentElement.setAttribute('dir', this.settings.rtl ? 'rtl' : 'ltr');
  }

  // Init template styles
  _initStyle() {
    if (!this._hasControls('style')) return;

    const { style } = this.settings;

    this._insertStylesheet(
      'template-customizer-core-css',
      this.pathResolver(
        this.settings.cssPath +
          this.settings.cssFilenamePattern.replace('%name%', `core${style !== 'light' ? `-${style}` : ''}`)
      )
    );
    // ? Uncomment if needed
    /*
    this._insertStylesheet(
      'template-customizer-bootstrap-css',
      this.pathResolver(
        this.settings.cssPath +
          this.settings.cssFilenamePattern.replace('%name%', `bootstrap${style !== 'light' ? `-${style}` : ''}`)
      )
    )
    this._insertStylesheet(
      'template-customizer-bsextended-css',
      this.pathResolver(
        this.settings.cssPath +
          this.settings.cssFilenamePattern.replace(
            '%name%',
            `bootstrap-extended${style !== 'light' ? `-${style}` : ''}`
          )
      )
    )
    this._insertStylesheet(
      'template-customizer-components-css',
      this.pathResolver(
        this.settings.cssPath +
          this.settings.cssFilenamePattern.replace('%name%', `components${style !== 'light' ? `-${style}` : ''}`)
      )
    )
    this._insertStylesheet(
      'template-customizer-colors-css',
      this.pathResolver(
        this.settings.cssPath +
          this.settings.cssFilenamePattern.replace('%name%', `colors${style !== 'light' ? `-${style}` : ''}`)
      )
    )
    */

    const classesToRemove = style === 'light' ? ['dark-style'] : ['light-style'];
    classesToRemove.forEach(cls => {
      document.documentElement.classList.remove(cls);
    });

    document.documentElement.classList.add(`${style}-style`);
  }

  // Init theme style
  _initTheme() {
    if (this._hasControls('themes')) {
      this._insertStylesheet(
        'template-customizer-theme-css',
        this.pathResolver(
          this.settings.themesPath +
            this.settings.cssFilenamePattern.replace(
              '%name%',
              this.settings.theme.name + (this.settings.style !== 'light' ? `-${this.settings.style}` : '')
            )
        )
      );
    } else {
      // If theme control is not enabled, get the current theme from localstorage else display default theme
      const theme = this._getSetting('Theme');
      this._insertStylesheet(
        'template-customizer-theme-css',
        this.pathResolver(
          this.settings.themesPath +
            this.settings.cssFilenamePattern.replace(
              '%name%',
              theme ? theme : 'theme-default' + (this.settings.style !== 'light' ? `-${this.settings.style}` : '')
            )
        )
      );
    }
  }

  _insertStylesheet(className, href) {
    const curLink = document.querySelector(`.${className}`);

    if (typeof document.documentMode === 'number' && document.documentMode < 11) {
      if (!curLink) return;
      if (href === curLink.getAttribute('href')) return;

      const link = document.createElement('link');

      link.setAttribute('rel', 'stylesheet');
      link.setAttribute('type', 'text/css');
      link.className = className;
      link.setAttribute('href', href);

      curLink.parentNode.insertBefore(link, curLink.nextSibling);
    } else {
      document.write(`<link rel="stylesheet" type="text/css" href="${href}" class="${className}">`);
    }

    curLink.parentNode.removeChild(curLink);
  }

  _loadStylesheets(stylesheets, cb) {
    const paths = Object.keys(stylesheets);
    const count = paths.length;
    let loaded = 0;

    function loadStylesheet(path, curLink, _cb) {
      const link = document.createElement('link');

      link.setAttribute('href', path);
      link.setAttribute('rel', 'stylesheet');
      link.setAttribute('type', 'text/css');
      link.className = curLink.className;

      const sheet = 'sheet' in link ? 'sheet' : 'styleSheet';
      const cssRules = 'sheet' in link ? 'cssRules' : 'rules';

      let intervalId;

      const timeoutId = setTimeout(() => {
        clearInterval(intervalId);
        clearTimeout(timeoutId);
        curLink.parentNode.removeChild(link);
        _cb(false, path);
      }, 15000);

      intervalId = setInterval(() => {
        try {
          if (link[sheet] && link[sheet][cssRules].length) {
            clearInterval(intervalId);
            clearTimeout(timeoutId);
            curLink.parentNode.removeChild(curLink);
            _cb(true);
          }
        } catch (e) {
          // Catch error
        }
      }, 10);

      curLink.parentNode.insertBefore(link, curLink.nextSibling);
    }

    function stylesheetCallBack() {
      if ((loaded += 1) >= count) {
        cb();
      }
    }
    for (let i = 0; i < paths.length; i++) {
      loadStylesheet(paths[i], stylesheets[paths[i]], stylesheetCallBack());
    }
  }

  _loadingState(enable, themes) {
    this.container.classList[enable ? 'add' : 'remove'](`template-customizer-loading${themes ? '-theme' : ''}`);
  }

  _getElementFromString(str) {
    const wrapper = document.createElement('div');
    wrapper.innerHTML = str;
    return wrapper.firstChild;
  }

  // Set settings in LocalStorage with layout & key
  _getSetting(key) {
    let result = null;
    const layoutName = this._getLayoutName();
    try {
      result = localStorage.getItem(`templateCustomizer-${layoutName}--${key}`);
    } catch (e) {
      // Catch error
    }
    return String(result || '');
  }

  _showResetBtnNotification(show = true) {
    setTimeout(() => {
      const resetBtnAttr = this.container.querySelector('.template-customizer-reset-btn .badge');
      if (show) {
        resetBtnAttr.classList.remove('d-none');
      } else {
        resetBtnAttr.classList.add('d-none');
      }
    }, 200);
  }

  // Set settings in LocalStorage with layout & key
  _setSetting(key, val) {
    const layoutName = this._getLayoutName();
    try {
      localStorage.setItem(`templateCustomizer-${layoutName}--${key}`, String(val));
      this._showResetBtnNotification();
    } catch (e) {
      // Catch Error
    }
  }

  // Get layout name to set unique
  _getLayoutName() {
    return document.getElementsByTagName('HTML')[0].getAttribute('data-template');
  }

  _removeListeners() {
    for (let i = 0, l = this._listeners.length; i < l; i++) {
      this._listeners[i][0].removeEventListener(this._listeners[i][1], this._listeners[i][2]);
    }
  }

  _cleanup() {
    this._removeListeners();
    this._listeners = [];
    this._controls = {};

    if (this._updateInterval) {
      clearInterval(this._updateInterval);
      this._updateInterval = null;
    }
  }

  get _ssr() {
    return typeof window === 'undefined';
  }

  // Check controls availability
  _hasControls(controls, oneOf = false) {
    return controls.split(' ').reduce((result, control) => {
      if (this.settings.controls.indexOf(control) !== -1) {
        if (oneOf || result !== false) result = true;
      } else if (!oneOf || result !== true) result = false;
      return result;
    }, null);
  }

  // Get the default theme
  _getDefaultTheme(themeId) {
    let theme;
    if (typeof themeId === 'string') {
      theme = this._getThemeByName(themeId, false);
    } else {
      theme = this.settings.availableThemes[themeId];
    }

    if (!theme) {
      throw new Error(`Theme ID "${themeId}" not found!`);
    }

    return theme;
  }

  // Get theme by themeId/themeName
  _getThemeByName(themeName, returnDefault = false) {
    const themes = this.settings.availableThemes;

    for (let i = 0, l = themes.length; i < l; i++) {
      if (themes[i].name === themeName) return themes[i];
    }

    return returnDefault ? this.settings.defaultTheme : null;
  }
}

// Styles
TemplateCustomizer.STYLES = [
  {
    name: 'light',
    title: 'Light'
  },
  {
    name: 'dark',
    title: 'Dark'
  },
  {
    name: 'system',
    title: 'System'
  }
];

// Themes
TemplateCustomizer.THEMES = [
  {
    name: 'theme-default',
    title: 'Default'
  },
  {
    name: 'theme-bordered',
    title: 'Bordered'
  },
  {
    name: 'theme-semi-dark',
    title: 'Semi Dark'
  }
];

// Layouts
TemplateCustomizer.LAYOUTS = [
  {
    name: 'expanded',
    title: 'Expanded'
  },
  {
    name: 'collapsed',
    title: 'Collapsed'
  }
];

// Navbar Options
TemplateCustomizer.NAVBAR_OPTIONS = [
  {
    name: 'sticky',
    title: 'Sticky'
  },
  {
    name: 'static',
    title: 'Static'
  },
  {
    name: 'hidden',
    title: 'Hidden'
  }
];

// Header Types
TemplateCustomizer.HEADER_TYPES = [
  {
    name: 'fixed',
    title: 'Fixed'
  },
  {
    name: 'static',
    title: 'Static'
  }
];

// Content Types
TemplateCustomizer.CONTENT = [
  {
    name: 'compact',
    title: 'Compact'
  },
  {
    name: 'wide',
    title: 'Wide'
  }
];

// Directions
TemplateCustomizer.DIRECTIONS = [
  {
    name: 'ltr',
    title: 'Left to Right (En)'
  },
  {
    name: 'rtl',
    title: 'Right to Left (Ar)'
  }
];

// Theme setting language
TemplateCustomizer.LANGUAGES = {
  en: {
    panel_header: 'Template Customizer',
    panel_sub_header: 'Customize and preview in real time',
    theming_header: 'Theming',
    style_label: 'Style (Mode)',
    theme_label: 'Themes',
    layout_header: 'Layout',
    layout_label: 'Menu (Navigation)',
    layout_header_label: 'Header Types',
    content_label: 'Content',
    layout_navbar_label: 'Navbar Type',
    direction_label: 'Direction'
  },
  fr: {
    panel_header: 'Modèle De Personnalisation',
    panel_sub_header: 'Personnalisez et prévisualisez en temps réel',
    theming_header: 'Thématisation',
    style_label: 'Style (Mode)',
    theme_label: 'Thèmes',
    layout_header: 'Disposition',
    layout_label: 'Menu (Navigation)',
    layout_header_label: "Types d'en-tête",
    content_label: 'Contenu',
    layout_navbar_label: 'Type de barre de navigation',
    direction_label: 'Direction'
  },
  ar: {
    panel_header: 'أداة تخصيص القالب',
    panel_sub_header: 'تخصيص ومعاينة في الوقت الحقيقي',
    theming_header: 'السمات',
    style_label: 'النمط (الوضع)',
    theme_label: 'المواضيع',
    layout_header: 'تَخطِيط',
    layout_label: 'القائمة (الملاحة)',
    layout_header_label: 'أنواع الرأس',
    content_label: 'محتوى',
    layout_navbar_label: 'نوع شريط التنقل',
    direction_label: 'اتجاه'
  },
  de: {
    panel_header: 'Vorlagen-Anpasser',
    panel_sub_header: 'Anpassen und Vorschau in Echtzeit',
    theming_header: 'Themen',
    style_label: 'Stil (Modus)',
    theme_label: 'Themen',
    layout_header: 'Layout',
    layout_label: 'Menü (Navigation)',
    layout_header_label: 'Header-Typen',
    content_label: 'Inhalt',
    layout_navbar_label: 'Art der Navigationsleiste',
    direction_label: 'Richtung'
  }
};

export { TemplateCustomizer };
