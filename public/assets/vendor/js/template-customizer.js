(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else {
		var a = factory();
		for(var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
	}
})(self, function() {
return /******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/css-loader/dist/cjs.js??ruleSet[1].rules[101].oneOf[1].use[1]!./node_modules/postcss-loader/dist/cjs.js??ruleSet[1].rules[101].oneOf[1].use[2]!./node_modules/sass-loader/dist/cjs.js??ruleSet[1].rules[101].oneOf[1].use[3]!./resources/assets/vendor/js/_template-customizer/_template-customizer.scss":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??ruleSet[1].rules[101].oneOf[1].use[1]!./node_modules/postcss-loader/dist/cjs.js??ruleSet[1].rules[101].oneOf[1].use[2]!./node_modules/sass-loader/dist/cjs.js??ruleSet[1].rules[101].oneOf[1].use[3]!./resources/assets/vendor/js/_template-customizer/_template-customizer.scss ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "/*\n* Template Customizer Style\n**/\n#template-customizer {\n  font-family: \"Public Sans\", BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\" !important;\n  font-size: inherit !important;\n  position: fixed;\n  top: 0;\n  right: 0;\n  height: 100%;\n  z-index: 99999999;\n  display: -ms-flexbox;\n  display: flex;\n  -ms-flex-direction: column;\n  flex-direction: column;\n  width: 400px;\n  background: #fff;\n  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);\n  transition: all 0.2s ease-in;\n  -webkit-transform: translateX(420px);\n  transform: translateX(420px);\n}\n#template-customizer h5 {\n  position: relative;\n  font-size: 11px;\n}\n#template-customizer > h5 {\n  -ms-flex: 0 0 auto;\n      flex: 0 0 auto;\n}\n#template-customizer .disabled {\n  color: #d1d2d3 !important;\n}\n#template-customizer .form-label {\n  font-size: 0.9375rem;\n}\n#template-customizer .form-check-label {\n  font-size: 0.8125rem;\n}\n#template-customizer .template-customizer-t-panel_header {\n  font-size: 1.125rem;\n}\n#template-customizer.template-customizer-open {\n  transition-delay: 0.1s;\n  -webkit-transform: none !important;\n  transform: none !important;\n}\n#template-customizer.template-customizer-open .custom-option.checked {\n  color: var(--bs-primary);\n  border-width: 2px;\n}\n#template-customizer.template-customizer-open .custom-option.checked .custom-option-content {\n  border: none;\n}\n#template-customizer.template-customizer-open .custom-option .custom-option-content {\n  border: 1px solid transparent;\n}\n#template-customizer .template-customizer-header a:hover {\n  color: inherit !important;\n}\n#template-customizer .template-customizer-open-btn {\n  position: absolute;\n  top: 180px;\n  left: 0;\n  z-index: -1;\n  display: block;\n  width: 42px;\n  height: 42px;\n  border-top-left-radius: 15%;\n  border-bottom-left-radius: 15%;\n  background: var(--bs-primary);\n  color: #fff !important;\n  text-align: center;\n  font-size: 18px !important;\n  line-height: 42px;\n  opacity: 1;\n  transition: all 0.1s linear 0.2s;\n  -webkit-transform: translateX(-62px);\n  transform: translateX(-62px);\n}\n@media (max-width: 991.98px) {\n  #template-customizer .template-customizer-open-btn {\n    top: 145px;\n  }\n}\n.dark-style #template-customizer .template-customizer-open-btn {\n  background: var(--bs-primary);\n}\n#template-customizer .template-customizer-open-btn::before {\n  content: \"\";\n  width: 22px;\n  height: 22px;\n  display: block;\n  background-size: 100% 100%;\n  position: absolute;\n  background-image: url(\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAABClJREFUaEPtmY1RFEEQhbsjUCIQIhAiUCNQIxAiECIQIxAiECIAIpAMhAiECIQI2vquZqnZvp6fhb3SK5mqq6Ju92b69bzXf6is+dI1t1+eAfztG5z1BsxsU0S+ici2iPB3vm5E5EpEDlSVv2dZswFIxv8UkZcNy+5EZGcuEHMCOBeR951uvVDVD53vVl+bE8DvDu8Pxtyo6ta/BsByg1R15Bwzqz5/LJgn34CZwfnPInI4BUB6/1hV0cSjVxcAM4PbcBZjL0XklIPN7Is3fLCkdQPpPYw/VNXj5IhPIvJWRIhSl6p60ULWBGBm30Vk123EwRxCuIzWkkjNrCZywith10ewE1Xdq4GoAjCz/RTXW44Ynt+LyBEfT43kYfbj86J3w5Q32DNcRQDpwF+dkQXDMey8xem0L3TEqB4g3PZWad8agBMRgZPeu96D1/C2Zbh3X0p80Op1xxloztN48bMQQNoc7+eLEuAoPSPiIDY4Ooo+E6ixeNXM+D3GERz2U3CIqMstLJUgJQDe+7eq6mub0NYEkLAKwEHkiBQDCZtddZCZ8d6r7JDwFkoARklHRPZUFVDVZWbwGuNrC4EfdOzFrRABh3Wnqhv+d70AEBLGFROPmeHlnM81G69UdSd6IUuM0GgUVn1uqWmg5EmMfBeEyB7Pe3txBkY+rGT8j0J+WXq/BgDkUCaqLgEAnwcRog0veMIqFAAwCy2wnw+bI2GaGboBgF9k5N0o0rUSGUb4eO0BeO9j/GYhkSHMHMTIqwGARX6p6a+nlPBl8kZuXMD9j6pKfF9aZuaFOdJCEL5D4eYb9wCYVCanrBmGyii/tIq+SLj/HQBCaM5bLzwfPqdQ6FpVHyra4IbuVbXaY7dETC2ESPNNWiIOi69CcdgSMXsh4tNSUiklMgwmC0aNd08Y5WAES6HHehM4gu97wyhBgWpgqXsrASglprDy7CwhehMZOSbK6JMSma+Fio1KltCmlBIj7gfZOGx8ppQSXrhzFnOhJ/31BDkjFHRvOd09x0mRBA9SFgxUgHpQg0q0t5ymPMlL+EnldFTfDA0NAmf+OTQ0X0sRouf7NNkYGhrOYNrxtIaGg83MNzVDSe3LXLhP7O/yrCsCz1zlWTpjWkuZAOBpX3yVnLqI1yLCOKU6qMrmP7SSrUEw54XF4WBIK5FxCMOr3lVsfGqNSmPzBXUnJTIX1jyVBq9wO6UObOpgC5GjO98vFKnTdQMZXxEsWZlDiCZMIxAbNxQOqlpVZtobejBaZNoBnRDzMFpkxvTQOD36BlrcySZuI6p1ACB6LU3wWuf5581+oHfD1vi89bz3nFUC8Nm7ZlP3nKkFbM4bWPt/MSFwklprYItwt6cmvpWJ2IVcQBCz6bLysSCv3SaANCiTsnaNRrNRqMXVVT1/BrAqz/buu/Y38Ad3KC5PARej0QAAAABJRU5ErkJggg==\");\n  margin: 10px;\n}\n.customizer-hide #template-customizer .template-customizer-open-btn {\n  display: none;\n}\n[dir=rtl] #template-customizer .template-customizer-open-btn {\n  border-radius: 0;\n  border-top-right-radius: 15%;\n  border-bottom-right-radius: 15%;\n}\n[dir=rtl] #template-customizer .template-customizer-open-btn::before {\n  margin-left: -2px;\n}\n#template-customizer.template-customizer-open .template-customizer-open-btn {\n  opacity: 0;\n  transition-delay: 0s;\n  -webkit-transform: none !important;\n  transform: none !important;\n}\n#template-customizer .template-customizer-inner {\n  position: relative;\n  overflow: auto;\n  -ms-flex: 0 1 auto;\n  flex: 0 1 auto;\n  opacity: 1;\n  transition: opacity 0.2s;\n}\n#template-customizer .template-customizer-inner > div:first-child > hr:first-of-type {\n  display: none !important;\n}\n#template-customizer .template-customizer-inner > div:first-child > h5:first-of-type {\n  padding-top: 0 !important;\n}\n#template-customizer .template-customizer-themes-inner {\n  position: relative;\n  opacity: 1;\n  transition: opacity 0.2s;\n}\n#template-customizer .template-customizer-theme-item {\n  display: -ms-flexbox;\n  display: flex;\n  align-items: center;\n  -ms-flex-align: center;\n  -ms-flex: 1 1 100%;\n  flex: 1 1 100%;\n  -ms-flex-pack: justify;\n  justify-content: space-between;\n  margin-bottom: 10px;\n  padding: 0 24px;\n  width: 100%;\n  cursor: pointer;\n}\n#template-customizer .template-customizer-theme-item input {\n  position: absolute;\n  z-index: -1;\n  opacity: 0;\n}\n#template-customizer .template-customizer-theme-item input ~ span {\n  opacity: 0.25;\n  transition: all 0.2s;\n}\n#template-customizer .template-customizer-theme-item .template-customizer-theme-checkmark {\n  display: inline-block;\n  width: 6px;\n  height: 12px;\n  border-right: 1px solid;\n  border-bottom: 1px solid;\n  opacity: 0;\n  transition: all 0.2s;\n  -webkit-transform: rotate(45deg);\n  transform: rotate(45deg);\n}\n[dir=rtl] #template-customizer .template-customizer-theme-item .template-customizer-theme-checkmark {\n  border-right: none;\n  border-left: 1px solid;\n  -webkit-transform: rotate(-45deg);\n  transform: rotate(-45deg);\n}\n#template-customizer .template-customizer-theme-item input:checked:not([disabled]) ~ span, #template-customizer .template-customizer-theme-item:hover input:not([disabled]) ~ span {\n  opacity: 1;\n}\n#template-customizer .template-customizer-theme-item input:checked:not([disabled]) ~ span .template-customizer-theme-checkmark {\n  opacity: 1;\n}\n#template-customizer .template-customizer-theme-colors span {\n  display: block;\n  margin: 0 1px;\n  width: 10px;\n  height: 10px;\n  border-radius: 50%;\n  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1) inset;\n}\n#template-customizer.template-customizer-loading .template-customizer-inner, #template-customizer.template-customizer-loading-theme .template-customizer-themes-inner {\n  opacity: 0.2;\n}\n#template-customizer.template-customizer-loading .template-customizer-inner::after, #template-customizer.template-customizer-loading-theme .template-customizer-themes-inner::after {\n  content: \"\";\n  position: absolute;\n  top: 0;\n  right: 0;\n  bottom: 0;\n  left: 0;\n  z-index: 999;\n  display: block;\n}\n\n@media (max-width: 1200px) {\n  #template-customizer {\n    display: none;\n    visibility: hidden !important;\n  }\n}\n@media (max-width: 575.98px) {\n  #template-customizer {\n    width: 300px;\n    -webkit-transform: translateX(320px);\n    transform: translateX(320px);\n  }\n}\n.layout-menu-100vh #template-customizer {\n  height: 100vh;\n}\n\n[dir=rtl] #template-customizer {\n  right: auto;\n  left: 0;\n  -webkit-transform: translateX(-420px);\n  transform: translateX(-420px);\n}\n[dir=rtl] #template-customizer .template-customizer-open-btn {\n  right: 0;\n  left: auto;\n  -webkit-transform: translateX(62px);\n  transform: translateX(62px);\n}\n[dir=rtl] #template-customizer .template-customizer-close-btn {\n  right: auto;\n  left: 0;\n}\n\n#template-customizer .template-customizer-layouts-options[disabled] {\n  opacity: 0.5;\n  pointer-events: none;\n}\n\n[dir=rtl] .template-customizer-t-style_switch_light {\n  padding-right: 0 !important;\n}", ""]);
// Exports
/* harmony default export */ __webpack_exports__["default"] = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/runtime/api.js":
/*!*****************************************************!*\
  !*** ./node_modules/css-loader/dist/runtime/api.js ***!
  \*****************************************************/
/***/ (function(module) {

"use strict";


/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
// eslint-disable-next-line func-names
module.exports = function (cssWithMappingToString) {
  var list = []; // return the list of modules as css string

  list.toString = function toString() {
    return this.map(function (item) {
      var content = cssWithMappingToString(item);

      if (item[2]) {
        return "@media ".concat(item[2], " {").concat(content, "}");
      }

      return content;
    }).join("");
  }; // import a list of modules into the list
  // eslint-disable-next-line func-names


  list.i = function (modules, mediaQuery, dedupe) {
    if (typeof modules === "string") {
      // eslint-disable-next-line no-param-reassign
      modules = [[null, modules, ""]];
    }

    var alreadyImportedModules = {};

    if (dedupe) {
      for (var i = 0; i < this.length; i++) {
        // eslint-disable-next-line prefer-destructuring
        var id = this[i][0];

        if (id != null) {
          alreadyImportedModules[id] = true;
        }
      }
    }

    for (var _i = 0; _i < modules.length; _i++) {
      var item = [].concat(modules[_i]);

      if (dedupe && alreadyImportedModules[item[0]]) {
        // eslint-disable-next-line no-continue
        continue;
      }

      if (mediaQuery) {
        if (!item[2]) {
          item[2] = mediaQuery;
        } else {
          item[2] = "".concat(mediaQuery, " and ").concat(item[2]);
        }
      }

      list.push(item);
    }
  };

  return list;
};

/***/ }),

/***/ "./resources/assets/vendor/js/_template-customizer/_template-customizer.html":
/*!***********************************************************************************!*\
  !*** ./resources/assets/vendor/js/_template-customizer/_template-customizer.html ***!
  \***********************************************************************************/
/***/ (function(module) {

// Module
var code = "<div id=\"template-customizer\" class=\"invert-bg-white\">\n  <a href=\"javascript:void(0)\" class=\"template-customizer-open-btn\" tabindex=\"-1\"></a>\n\n  <div class=\"p-4 m-0 lh-1 border-bottom template-customizer-header position-relative py-3\">\n    <h4 class=\"template-customizer-t-panel_header mb-2\"></h4>\n    <p class=\"template-customizer-t-panel_sub_header mb-0\"></p>\n    <div class=\"d-flex align-items-center gap-2 position-absolute end-0 top-0 mt-4 me-3\">\n      <a\n        href=\"javascript:void(0)\"\n        class=\"template-customizer-reset-btn text-body\"\n        data-bs-toggle=\"tooltip\"\n        data-bs-placement=\"bottom\"\n        title=\"Reset Customizer\"\n        ><i class=\"ti ti-refresh ti-sm\"></i\n        ><span class=\"badge rounded-pill bg-danger badge-dot badge-notifications d-none\"></span\n      ></a>\n      <a href=\"javascript:void(0)\" class=\"template-customizer-close-btn fw-light text-body\" tabindex=\"-1\"\n        ><i class=\"ti ti-x ti-sm\"></i\n      ></a>\n    </div>\n  </div>\n\n  <div class=\"template-customizer-inner pt-4\">\n    <!-- Theming -->\n    <div class=\"template-customizer-theming\">\n      <h5 class=\"m-0 px-4 py-4 lh-1 d-block\">\n        <span class=\"template-customizer-t-theming_header bg-label-primary rounded-1 py-1 px-2 fs-big\"></span>\n      </h5>\n\n      <!-- Style -->\n      <div class=\"m-0 px-4 pb-3 pt-1 template-customizer-style w-100\">\n        <label for=\"customizerStyle\" class=\"form-label d-block template-customizer-t-style_label\"></label>\n        <div class=\"row px-1 template-customizer-styles-options\"></div>\n      </div>\n\n      <!-- Themes -->\n      <div class=\"m-0 px-4 pt-3 template-customizer-themes w-100\">\n        <label for=\"customizerTheme\" class=\"form-label template-customizer-t-theme_label\"></label>\n        <div class=\"row px-1 template-customizer-themes-options\"></div>\n      </div>\n    </div>\n    <!--/ Theming -->\n\n    <!-- Layout -->\n    <div class=\"template-customizer-layout\">\n      <hr class=\"m-0 px-4 my-4\" />\n      <h5 class=\"m-0 px-4 pb-4 pt-2 d-block\">\n        <span class=\"template-customizer-t-layout_header bg-label-primary rounded-1 py-1 px-2 fs-big\"></span>\n      </h5>\n\n      <!-- Layout(Menu) -->\n      <div class=\"m-0 px-4 pb-3 d-block template-customizer-layouts\">\n        <label for=\"customizerStyle\" class=\"form-label d-block template-customizer-t-layout_label\"></label>\n        <div class=\"row px-1 template-customizer-layouts-options\">\n          <!--? Uncomment If using offcanvas layout -->\n          <!-- <div class=\"col-12\">\n            <div class=\"form-check\">\n              <input class=\"form-check-input\" type=\"radio\" name=\"layoutRadios\" id=\"layoutRadios-offcanvas\"\n                value=\"static-offcanvas\">\n              <label class=\"form-check-label template-customizer-t-layout_offcanvas\"\n                for=\"layoutRadios-offcanvas\"></label>\n            </div>\n          </div> -->\n          <!-- <div class=\"col-12\">\n            <div class=\"form-check\">\n              <input class=\"form-check-input\" type=\"radio\" name=\"layoutRadios\" id=\"layoutRadios-fixed_offcanvas\"\n                value=\"fixed-offcanvas\">\n              <label class=\"form-check-label template-customizer-t-layout_fixed_offcanvas\"\n                for=\"layoutRadios-fixed_offcanvas\"></label>\n            </div>\n          </div> -->\n        </div>\n      </div>\n\n      <!-- Header Options for Horizontal -->\n      <div class=\"m-0 px-4 pb-3 template-customizer-headerOptions w-100\">\n        <label for=\"customizerHeader\" class=\"form-label template-customizer-t-layout_header_label\"></label>\n        <div class=\"row px-1 template-customizer-header-options\"></div>\n      </div>\n\n      <!-- Fixed navbar -->\n      <div class=\"m-0 px-4 pb-3 template-customizer-layoutNavbarOptions w-100\">\n        <label for=\"customizerNavbar\" class=\"form-label template-customizer-t-layout_navbar_label\"></label>\n        <div class=\"row px-1 template-customizer-navbar-options\"></div>\n      </div>\n\n      <!-- Content -->\n      <div class=\"m-0 px-4 pb-3 template-customizer-content w-100\">\n        <label for=\"customizerContent\" class=\"form-label template-customizer-t-content_label\"></label>\n        <div class=\"row px-1 template-customizer-content-options\"></div>\n      </div>\n\n      <!-- Directions -->\n      <div class=\"m-0 px-4 pb-3 template-customizer-directions w-100\">\n        <label for=\"customizerDirection\" class=\"form-label template-customizer-t-direction_label\"></label>\n        <div class=\"row px-1 template-customizer-directions-options\"></div>\n      </div>\n    </div>\n    <!--/ Layout -->\n  </div>\n</div>\n";
// Exports
module.exports = code;

/***/ }),

/***/ "./resources/assets/vendor/js/_template-customizer/_template-customizer.scss":
/*!***********************************************************************************!*\
  !*** ./resources/assets/vendor/js/_template-customizer/_template-customizer.scss ***!
  \***********************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_ruleSet_1_rules_101_oneOf_1_use_1_node_modules_postcss_loader_dist_cjs_js_ruleSet_1_rules_101_oneOf_1_use_2_node_modules_sass_loader_dist_cjs_js_ruleSet_1_rules_101_oneOf_1_use_3_template_customizer_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../node_modules/css-loader/dist/cjs.js??ruleSet[1].rules[101].oneOf[1].use[1]!../../../../../node_modules/postcss-loader/dist/cjs.js??ruleSet[1].rules[101].oneOf[1].use[2]!../../../../../node_modules/sass-loader/dist/cjs.js??ruleSet[1].rules[101].oneOf[1].use[3]!./_template-customizer.scss */ "./node_modules/css-loader/dist/cjs.js??ruleSet[1].rules[101].oneOf[1].use[1]!./node_modules/postcss-loader/dist/cjs.js??ruleSet[1].rules[101].oneOf[1].use[2]!./node_modules/sass-loader/dist/cjs.js??ruleSet[1].rules[101].oneOf[1].use[3]!./resources/assets/vendor/js/_template-customizer/_template-customizer.scss");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_ruleSet_1_rules_101_oneOf_1_use_1_node_modules_postcss_loader_dist_cjs_js_ruleSet_1_rules_101_oneOf_1_use_2_node_modules_sass_loader_dist_cjs_js_ruleSet_1_rules_101_oneOf_1_use_3_template_customizer_scss__WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ __webpack_exports__["default"] = (_node_modules_css_loader_dist_cjs_js_ruleSet_1_rules_101_oneOf_1_use_1_node_modules_postcss_loader_dist_cjs_js_ruleSet_1_rules_101_oneOf_1_use_2_node_modules_sass_loader_dist_cjs_js_ruleSet_1_rules_101_oneOf_1_use_3_template_customizer_scss__WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":
/*!****************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js ***!
  \****************************************************************************/
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

"use strict";


var isOldIE = function isOldIE() {
  var memo;
  return function memorize() {
    if (typeof memo === 'undefined') {
      // Test for IE <= 9 as proposed by Browserhacks
      // @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
      // Tests for existence of standard globals is to allow style-loader
      // to operate correctly into non-standard environments
      // @see https://github.com/webpack-contrib/style-loader/issues/177
      memo = Boolean(window && document && document.all && !window.atob);
    }

    return memo;
  };
}();

var getTarget = function getTarget() {
  var memo = {};
  return function memorize(target) {
    if (typeof memo[target] === 'undefined') {
      var styleTarget = document.querySelector(target); // Special case to return head of iframe instead of iframe itself

      if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
        try {
          // This will throw an exception if access to iframe is blocked
          // due to cross-origin restrictions
          styleTarget = styleTarget.contentDocument.head;
        } catch (e) {
          // istanbul ignore next
          styleTarget = null;
        }
      }

      memo[target] = styleTarget;
    }

    return memo[target];
  };
}();

var stylesInDom = [];

function getIndexByIdentifier(identifier) {
  var result = -1;

  for (var i = 0; i < stylesInDom.length; i++) {
    if (stylesInDom[i].identifier === identifier) {
      result = i;
      break;
    }
  }

  return result;
}

function modulesToDom(list, options) {
  var idCountMap = {};
  var identifiers = [];

  for (var i = 0; i < list.length; i++) {
    var item = list[i];
    var id = options.base ? item[0] + options.base : item[0];
    var count = idCountMap[id] || 0;
    var identifier = "".concat(id, " ").concat(count);
    idCountMap[id] = count + 1;
    var index = getIndexByIdentifier(identifier);
    var obj = {
      css: item[1],
      media: item[2],
      sourceMap: item[3]
    };

    if (index !== -1) {
      stylesInDom[index].references++;
      stylesInDom[index].updater(obj);
    } else {
      stylesInDom.push({
        identifier: identifier,
        updater: addStyle(obj, options),
        references: 1
      });
    }

    identifiers.push(identifier);
  }

  return identifiers;
}

function insertStyleElement(options) {
  var style = document.createElement('style');
  var attributes = options.attributes || {};

  if (typeof attributes.nonce === 'undefined') {
    var nonce =  true ? __webpack_require__.nc : 0;

    if (nonce) {
      attributes.nonce = nonce;
    }
  }

  Object.keys(attributes).forEach(function (key) {
    style.setAttribute(key, attributes[key]);
  });

  if (typeof options.insert === 'function') {
    options.insert(style);
  } else {
    var target = getTarget(options.insert || 'head');

    if (!target) {
      throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");
    }

    target.appendChild(style);
  }

  return style;
}

function removeStyleElement(style) {
  // istanbul ignore if
  if (style.parentNode === null) {
    return false;
  }

  style.parentNode.removeChild(style);
}
/* istanbul ignore next  */


var replaceText = function replaceText() {
  var textStore = [];
  return function replace(index, replacement) {
    textStore[index] = replacement;
    return textStore.filter(Boolean).join('\n');
  };
}();

function applyToSingletonTag(style, index, remove, obj) {
  var css = remove ? '' : obj.media ? "@media ".concat(obj.media, " {").concat(obj.css, "}") : obj.css; // For old IE

  /* istanbul ignore if  */

  if (style.styleSheet) {
    style.styleSheet.cssText = replaceText(index, css);
  } else {
    var cssNode = document.createTextNode(css);
    var childNodes = style.childNodes;

    if (childNodes[index]) {
      style.removeChild(childNodes[index]);
    }

    if (childNodes.length) {
      style.insertBefore(cssNode, childNodes[index]);
    } else {
      style.appendChild(cssNode);
    }
  }
}

function applyToTag(style, options, obj) {
  var css = obj.css;
  var media = obj.media;
  var sourceMap = obj.sourceMap;

  if (media) {
    style.setAttribute('media', media);
  } else {
    style.removeAttribute('media');
  }

  if (sourceMap && typeof btoa !== 'undefined') {
    css += "\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))), " */");
  } // For old IE

  /* istanbul ignore if  */


  if (style.styleSheet) {
    style.styleSheet.cssText = css;
  } else {
    while (style.firstChild) {
      style.removeChild(style.firstChild);
    }

    style.appendChild(document.createTextNode(css));
  }
}

var singleton = null;
var singletonCounter = 0;

function addStyle(obj, options) {
  var style;
  var update;
  var remove;

  if (options.singleton) {
    var styleIndex = singletonCounter++;
    style = singleton || (singleton = insertStyleElement(options));
    update = applyToSingletonTag.bind(null, style, styleIndex, false);
    remove = applyToSingletonTag.bind(null, style, styleIndex, true);
  } else {
    style = insertStyleElement(options);
    update = applyToTag.bind(null, style, options);

    remove = function remove() {
      removeStyleElement(style);
    };
  }

  update(obj);
  return function updateStyle(newObj) {
    if (newObj) {
      if (newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap) {
        return;
      }

      update(obj = newObj);
    } else {
      remove();
    }
  };
}

module.exports = function (list, options) {
  options = options || {}; // Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
  // tags it will allow on a page

  if (!options.singleton && typeof options.singleton !== 'boolean') {
    options.singleton = isOldIE();
  }

  list = list || [];
  var lastIdentifiers = modulesToDom(list, options);
  return function update(newList) {
    newList = newList || [];

    if (Object.prototype.toString.call(newList) !== '[object Array]') {
      return;
    }

    for (var i = 0; i < lastIdentifiers.length; i++) {
      var identifier = lastIdentifiers[i];
      var index = getIndexByIdentifier(identifier);
      stylesInDom[index].references--;
    }

    var newLastIdentifiers = modulesToDom(newList, options);

    for (var _i = 0; _i < lastIdentifiers.length; _i++) {
      var _identifier = lastIdentifiers[_i];

      var _index = getIndexByIdentifier(_identifier);

      if (stylesInDom[_index].references === 0) {
        stylesInDom[_index].updater();

        stylesInDom.splice(_index, 1);
      }
    }

    lastIdentifiers = newLastIdentifiers;
  };
};

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			id: moduleId,
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/nonce */
/******/ 	!function() {
/******/ 		__webpack_require__.nc = undefined;
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!***********************************************************!*\
  !*** ./resources/assets/vendor/js/template-customizer.js ***!
  \***********************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   TemplateCustomizer: function() { return /* binding */ TemplateCustomizer; }
/* harmony export */ });
/* harmony import */ var _template_customizer_template_customizer_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_template-customizer/_template-customizer.scss */ "./resources/assets/vendor/js/_template-customizer/_template-customizer.scss");
/* harmony import */ var _template_customizer_template_customizer_html__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_template-customizer/_template-customizer.html */ "./resources/assets/vendor/js/_template-customizer/_template-customizer.html");
/* harmony import */ var _template_customizer_template_customizer_html__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_template_customizer_template_customizer_html__WEBPACK_IMPORTED_MODULE_1__);
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _defineProperty(e, r, t) { return (r = _toPropertyKey(r)) in e ? Object.defineProperty(e, r, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : e[r] = t, e; }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }


var CSS_FILENAME_PATTERN = '%name%.css';
var CONTROLS = ['rtl', 'style', 'headerType', 'contentLayout', 'layoutCollapsed', 'showDropdownOnHover', 'layoutNavbarOptions', 'layoutFooterFixed', 'themes'];
var STYLES = ['light', 'dark', 'system'];
var NAVBAR_OPTIONS = ['sticky', 'static', 'hidden'];
var layoutNavbarVar;
var cl = document.documentElement.classList;
if (cl.contains('layout-navbar-fixed')) layoutNavbarVar = 'sticky';else if (cl.contains('layout-navbar-hidden')) layoutNavbarVar = 'hidden';else layoutNavbarVar = 'static';
var DISPLAY_CUSTOMIZER = true;
var DEFAULT_THEME = document.getElementsByTagName('HTML')[0].getAttribute('data-theme') || 0;
var DEFAULT_STYLE = cl.contains('dark-style') ? 'dark' : 'light';
var DEFAULT_TEXT_DIR = document.documentElement.getAttribute('dir') === 'rtl';
var DEFAULT_MENU_COLLAPSED = !!cl.contains('layout-menu-collapsed');
var DEFAULT_SHOW_DROPDOWN_ON_HOVER = true;
var DEFAULT_NAVBAR_FIXED = layoutNavbarVar;
var DEFAULT_CONTENT_LAYOUT = cl.contains('layout-wide') ? 'wide' : 'compact';
var DEFAULT_FOOTER_FIXED = !!cl.contains('layout-footer-fixed');
var headerType;
if (cl.contains('layout-menu-offcanvas')) {
  headerType = 'static-offcanvas';
} else if (cl.contains('layout-menu-fixed')) {
  headerType = 'fixed';
} else if (cl.contains('layout-menu-fixed-offcanvas')) {
  headerType = 'fixed-offcanvas';
} else {
  headerType = 'static';
}
var DEFAULT_LAYOUT_TYPE = headerType;
var TemplateCustomizer = /*#__PURE__*/function () {
  function TemplateCustomizer(_ref) {
    var cssPath = _ref.cssPath,
      themesPath = _ref.themesPath,
      cssFilenamePattern = _ref.cssFilenamePattern,
      displayCustomizer = _ref.displayCustomizer,
      controls = _ref.controls,
      defaultTextDir = _ref.defaultTextDir,
      defaultHeaderType = _ref.defaultHeaderType,
      defaultContentLayout = _ref.defaultContentLayout,
      defaultMenuCollapsed = _ref.defaultMenuCollapsed,
      defaultShowDropdownOnHover = _ref.defaultShowDropdownOnHover,
      defaultNavbarType = _ref.defaultNavbarType,
      defaultFooterFixed = _ref.defaultFooterFixed,
      styles = _ref.styles,
      navbarOptions = _ref.navbarOptions,
      defaultStyle = _ref.defaultStyle,
      availableContentLayouts = _ref.availableContentLayouts,
      availableDirections = _ref.availableDirections,
      availableStyles = _ref.availableStyles,
      availableThemes = _ref.availableThemes,
      availableLayouts = _ref.availableLayouts,
      availableHeaderTypes = _ref.availableHeaderTypes,
      availableNavbarOptions = _ref.availableNavbarOptions,
      defaultTheme = _ref.defaultTheme,
      pathResolver = _ref.pathResolver,
      onSettingsChange = _ref.onSettingsChange,
      lang = _ref.lang;
    _classCallCheck(this, TemplateCustomizer);
    if (this._ssr) return;
    if (!window.Helpers) throw new Error('window.Helpers required.');
    this.settings = {};
    this.settings.cssPath = cssPath;
    this.settings.themesPath = themesPath;
    this.settings.cssFilenamePattern = cssFilenamePattern || CSS_FILENAME_PATTERN;
    this.settings.displayCustomizer = typeof displayCustomizer !== 'undefined' ? displayCustomizer : DISPLAY_CUSTOMIZER;
    this.settings.controls = controls || CONTROLS;
    this.settings.defaultTextDir = defaultTextDir === 'rtl' ? true :  false || DEFAULT_TEXT_DIR;
    this.settings.defaultHeaderType = defaultHeaderType || DEFAULT_LAYOUT_TYPE;
    this.settings.defaultMenuCollapsed = typeof defaultMenuCollapsed !== 'undefined' ? defaultMenuCollapsed : DEFAULT_MENU_COLLAPSED;
    this.settings.defaultContentLayout = typeof defaultContentLayout !== 'undefined' ? defaultContentLayout : DEFAULT_CONTENT_LAYOUT;
    this.settings.defaultShowDropdownOnHover = typeof defaultShowDropdownOnHover !== 'undefined' ? defaultShowDropdownOnHover : DEFAULT_SHOW_DROPDOWN_ON_HOVER;
    this.settings.defaultNavbarType = typeof defaultNavbarType !== 'undefined' ? defaultNavbarType : DEFAULT_NAVBAR_FIXED;
    this.settings.defaultFooterFixed = typeof defaultFooterFixed !== 'undefined' ? defaultFooterFixed : DEFAULT_FOOTER_FIXED;
    this.settings.availableDirections = availableDirections || TemplateCustomizer.DIRECTIONS;
    this.settings.availableStyles = availableStyles || TemplateCustomizer.STYLES;
    this.settings.availableThemes = availableThemes || TemplateCustomizer.THEMES;
    this.settings.availableHeaderTypes = availableHeaderTypes || TemplateCustomizer.HEADER_TYPES;
    this.settings.availableContentLayouts = availableContentLayouts || TemplateCustomizer.CONTENT;
    this.settings.availableLayouts = availableLayouts || TemplateCustomizer.LAYOUTS;
    this.settings.availableNavbarOptions = availableNavbarOptions || TemplateCustomizer.NAVBAR_OPTIONS;
    this.settings.defaultTheme = this._getDefaultTheme(typeof defaultTheme !== 'undefined' ? defaultTheme : DEFAULT_THEME);
    this.settings.styles = styles || STYLES;
    this.settings.navbarOptions = navbarOptions || NAVBAR_OPTIONS;
    this.settings.defaultStyle = defaultStyle || DEFAULT_STYLE;
    this.settings.lang = lang || 'en';
    this.pathResolver = pathResolver || function (p) {
      return p;
    };
    if (this.settings.styles.length < 2) {
      var i = this.settings.controls.indexOf('style');
      if (i !== -1) {
        this.settings.controls = this.settings.controls.slice(0, i).concat(this.settings.controls.slice(i + 1));
      }
    }
    this.settings.onSettingsChange = typeof onSettingsChange === 'function' ? onSettingsChange : function () {};
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
  return _createClass(TemplateCustomizer, [{
    key: "setRtl",
    value: function setRtl(rtl) {
      if (!this._hasControls('rtl')) return;
      this._setSetting('Rtl', String(rtl));
      window.location.reload();
    }
  }, {
    key: "setContentLayout",
    value: function setContentLayout(contentLayout) {
      var updateStorage = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
      if (!this._hasControls('contentLayout')) return;
      this.settings.contentLayout = contentLayout;
      if (updateStorage) this._setSetting('contentLayout', contentLayout);
      window.Helpers.setContentLayout(contentLayout);
      if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);
    }
  }, {
    key: "setStyle",
    value: function setStyle(style) {
      this._setSetting('Style', style);
      window.location.reload();
    }
  }, {
    key: "setTheme",
    value: function setTheme(themeName) {
      var updateStorage = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
      var cb = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
      if (!this._hasControls('themes')) return;
      var theme = this._getThemeByName(themeName);
      if (!theme) return;
      this.settings.theme = theme;
      if (updateStorage) this._setSetting('Theme', themeName);
      var themeUrl = this.pathResolver(this.settings.themesPath + this.settings.cssFilenamePattern.replace('%name%', themeName + (this.settings.style !== 'light' ? "-".concat(this.settings.style) : '')));
      this._loadStylesheets(_defineProperty({}, themeUrl, document.querySelector('.template-customizer-theme-css')), cb || function () {});
      if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);
    }
  }, {
    key: "setLayoutType",
    value: function setLayoutType(pos) {
      var updateStorage = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
      if (!this._hasControls('headerType')) return;
      if (pos !== 'static' && pos !== 'static-offcanvas' && pos !== 'fixed' && pos !== 'fixed-offcanvas') return;
      this.settings.headerType = pos;
      if (updateStorage) this._setSetting('LayoutType', pos);
      window.Helpers.setPosition(pos === 'fixed' || pos === 'fixed-offcanvas', pos === 'static-offcanvas' || pos === 'fixed-offcanvas');
      if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);

      // Perfectscrollbar change on Layout change
      var menuScroll = window.Helpers.menuPsScroll;
      var PerfectScrollbarLib = window.PerfectScrollbar;
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
  }, {
    key: "setDropdownOnHover",
    value: function setDropdownOnHover(open) {
      var updateStorage = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
      if (!this._hasControls('showDropdownOnHover')) return;
      this.settings.showDropdownOnHover = open;
      if (updateStorage) this._setSetting('ShowDropdownOnHover', open);
      if (window.Helpers.mainMenu) {
        window.Helpers.mainMenu.destroy();
        config.showDropdownOnHover = open;
        var _window = window,
          Menu = _window.Menu;
        window.Helpers.mainMenu = new Menu(document.getElementById('layout-menu'), {
          orientation: 'horizontal',
          closeChildren: true,
          showDropdownOnHover: config.showDropdownOnHover
        });
      }
      if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);
    }
  }, {
    key: "setLayoutNavbarOption",
    value: function setLayoutNavbarOption(navbarType) {
      var updateStorage = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
      if (!this._hasControls('layoutNavbarOptions')) return;
      this.settings.layoutNavbarOptions = navbarType;
      if (updateStorage) this._setSetting('FixedNavbarOption', navbarType);
      window.Helpers.setNavbar(navbarType);
      if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);
    }
  }, {
    key: "setLayoutFooterFixed",
    value: function setLayoutFooterFixed(fixed) {
      var updateStorage = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
      // if (!this._hasControls('layoutFooterFixed')) return
      this.settings.layoutFooterFixed = fixed;
      if (updateStorage) this._setSetting('FixedFooter', fixed);
      window.Helpers.setFooterFixed(fixed);
      if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);
    }
  }, {
    key: "setLang",
    value: function setLang(lang) {
      var _this = this;
      var updateStorage = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
      var force = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;
      if (lang === this.settings.lang && !force) return;
      if (!TemplateCustomizer.LANGUAGES[lang]) throw new Error("Language \"".concat(lang, "\" not found!"));
      var t = TemplateCustomizer.LANGUAGES[lang];
      ['panel_header', 'panel_sub_header', 'theming_header', 'style_label', 'style_switch_light', 'style_switch_dark', 'layout_header', 'layout_label', 'layout_header_label', 'content_label', 'layout_static', 'layout_offcanvas', 'layout_fixed', 'layout_fixed_offcanvas', 'layout_dd_open_label', 'layout_navbar_label', 'layout_footer_label', 'misc_header', 'theme_label', 'direction_label'].forEach(function (key) {
        var el = _this.container.querySelector(".template-customizer-t-".concat(key));
        // eslint-disable-next-line no-unused-expressions
        el && (el.textContent = t[key]);
      });
      var tt = t.themes || {};
      var themes = this.container.querySelectorAll('.template-customizer-theme-item') || [];
      for (var i = 0, l = themes.length; i < l; i++) {
        var themeName = themes[i].querySelector('input[type="radio"]').value;
        themes[i].querySelector('.template-customizer-theme-name').textContent = tt[themeName] || this._getThemeByName(themeName).title;
      }
      this.settings.lang = lang;
      if (updateStorage) this._setSetting('Lang', lang);
      if (updateStorage) this.settings.onSettingsChange.call(this, this.settings);
    }

    // Update theme settings control
  }, {
    key: "update",
    value: function update() {
      if (this._ssr) return;
      var hasNavbar = !!document.querySelector('.layout-navbar');
      var hasMenu = !!document.querySelector('.layout-menu');
      var hasHorizontalMenu = !!document.querySelector('.layout-menu-horizontal.menu, .layout-menu-horizontal .menu');
      var isLayout1 = !!document.querySelector('.layout-wrapper.layout-navbar-full');
      var hasFooter = !!document.querySelector('.content-footer');
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
  }, {
    key: "clearLocalStorage",
    value: function clearLocalStorage() {
      if (this._ssr) return;
      var layoutName = this._getLayoutName();
      var keysToRemove = ['Theme', 'Style', 'LayoutCollapsed', 'FixedNavbarOption', 'LayoutType', 'contentLayout', 'Rtl', 'Lang'];
      keysToRemove.forEach(function (key) {
        var localStorageKey = "templateCustomizer-".concat(layoutName, "--").concat(key);
        localStorage.removeItem(localStorageKey);
      });
      this._showResetBtnNotification(false);
    }

    // Clear local storage
  }, {
    key: "destroy",
    value: function destroy() {
      if (this._ssr) return;
      this._cleanup();
      this.settings = null;
      this.container.parentNode.removeChild(this.container);
      this.container = null;
    }
  }, {
    key: "_loadSettings",
    value: function _loadSettings() {
      // Get settings

      // const cl = document.documentElement.classList;
      var rtl = this._getSetting('Rtl');
      var style = this._getSetting('Style');
      var theme = this._getSetting('Theme');
      var contentLayout = this._getSetting('contentLayout');
      var collapsedMenu = this._getSetting('LayoutCollapsed'); // Value will be set from main.js
      var dropdownOnHover = this._getSetting('ShowDropdownOnHover'); // Value will be set from main.js
      var navbarOption = this._getSetting('FixedNavbarOption');
      var fixedFooter = this._getSetting('FixedFooter');
      var lType = this._getSetting('LayoutType');
      if (rtl !== '' || style !== '' || theme !== '' || contentLayout !== '' || collapsedMenu !== '' || navbarOption !== '' || lType !== '') {
        this._showResetBtnNotification(true);
      } else {
        this._showResetBtnNotification(false);
      }
      var type;
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
          document.cookie = "style=dark"; // to fix laravel system mode issue
        } else {
          this.settings.style = 'light';
          document.cookie = "style=light"; // to fix laravel system mode issue
        }
      } else {
        document.cookie = "style=; expires=Thu, 01 Jan 2000 00:00:00 UTC; path=/;"; // to fix laravel system mode issue
        this.settings.style = this.settings.styles.indexOf(style) !== -1 ? style : this.settings.defaultStyle;
      }
      if (this.settings.styles.indexOf(this.settings.style) === -1) {
        // eslint-disable-next-line prefer-destructuring
        this.settings.style = this.settings.styles[0];
      }
      this.settings.contentLayout = contentLayout !== '' ? contentLayout : this.settings.defaultContentLayout;
      this.settings.layoutCollapsed = collapsedMenu !== '' ? collapsedMenu === 'true' : this.settings.defaultMenuCollapsed;
      this.settings.showDropdownOnHover = dropdownOnHover !== '' ? dropdownOnHover === 'true' : this.settings.defaultShowDropdownOnHover;
      var navType;
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
  }, {
    key: "_setup",
    value: function _setup() {
      var _this2 = this;
      var _container = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : document;
      // Function to create customizer elements
      var createOptionElement = function createOptionElement(nameVal, title, inputName, isDarkStyle, image) {
        image = image || nameVal;
        return _this2._getElementFromString("<div class=\"col-4 px-2\">\n      <div class=\"form-check custom-option custom-option-icon mb-0\">\n        <label class=\"form-check-label custom-option-content p-0\" for=\"".concat(inputName).concat(nameVal, "\">\n          <span class=\"custom-option-body mb-0\">\n            <img src=\"").concat(assetsPath, "img/customizer/").concat(image).concat(isDarkStyle ? '-dark' : '', ".svg\" alt=\"").concat(title, "\" class=\"img-fluid scaleX-n1-rtl\" />\n          </span>\n          <input\n            name=\"").concat(inputName, "\"\n            class=\"form-check-input d-none\"\n            type=\"radio\"\n            value=\"").concat(nameVal, "\"\n            id=\"").concat(inputName).concat(nameVal, "\" />\n        </label>\n      </div>\n      <label class=\"form-check-label small text-nowrap\" for=\"").concat(inputName).concat(nameVal, "\">").concat(title, "</label>\n    </div>"));
      };
      this._cleanup();
      this.container = this._getElementFromString((_template_customizer_template_customizer_html__WEBPACK_IMPORTED_MODULE_1___default()));

      // Customizer visibility condition
      //
      var customizerW = this.container;
      if (this.settings.displayCustomizer) customizerW.setAttribute('style', 'visibility: visible');else customizerW.setAttribute('style', 'visibility: hidden');

      // Open btn
      //
      var openBtn = this.container.querySelector('.template-customizer-open-btn');
      var openBtnCb = function openBtnCb() {
        _this2.container.classList.add('template-customizer-open');
        _this2.update();
        if (_this2._updateInterval) clearInterval(_this2._updateInterval);
        _this2._updateInterval = setInterval(function () {
          _this2.update();
        }, 500);
      };
      openBtn.addEventListener('click', openBtnCb);
      this._listeners.push([openBtn, 'click', openBtnCb]);

      // Reset btn
      //

      var resetBtn = this.container.querySelector('.template-customizer-reset-btn');
      var resetBtnCb = function resetBtnCb() {
        _this2.clearLocalStorage();
        window.location.reload();
      };
      resetBtn.addEventListener('click', resetBtnCb);
      this._listeners.push([resetBtn, 'click', resetBtnCb]);

      // Close btn
      //

      var closeBtn = this.container.querySelector('.template-customizer-close-btn');
      var closeBtnCb = function closeBtnCb() {
        _this2.container.classList.remove('template-customizer-open');
        if (_this2._updateInterval) {
          clearInterval(_this2._updateInterval);
          _this2._updateInterval = null;
        }
      };
      closeBtn.addEventListener('click', closeBtnCb);
      this._listeners.push([closeBtn, 'click', closeBtnCb]);

      // Style
      var styleW = this.container.querySelector('.template-customizer-style');
      var styleOpt = styleW.querySelector('.template-customizer-styles-options');
      if (!this._hasControls('style')) {
        styleW.parentNode.removeChild(styleW);
      } else {
        this.settings.availableStyles.forEach(function (style) {
          var styleEl = createOptionElement(style.name, style.title, 'customRadioIcon', cl.contains('dark-style'));
          styleOpt.appendChild(styleEl);
        });
        styleOpt.querySelector("input[value=\"".concat(this.settings.stylesOpt, "\"]")).setAttribute('checked', 'checked');

        // styleCb
        var styleCb = function styleCb(e) {
          _this2._loadingState(true);
          _this2.setStyle(e.target.value, true, function () {
            _this2._loadingState(false);
          });
        };
        styleOpt.addEventListener('change', styleCb);
        this._listeners.push([styleOpt, 'change', styleCb]);
      }

      // Theme
      var themesW = this.container.querySelector('.template-customizer-themes');
      var themesWInner = themesW.querySelector('.template-customizer-themes-options');
      if (!this._hasControls('themes')) {
        themesW.parentNode.removeChild(themesW);
      } else {
        this.settings.availableThemes.forEach(function (theme) {
          var image = '';
          if (theme.name === 'theme-semi-dark') {
            image = "semi-dark";
          } else if (theme.name === 'theme-bordered') {
            image = "border";
          } else {
            image = "default";
          }
          var themeEl = createOptionElement(theme.name, theme.title, 'themeRadios', cl.contains('dark-style'), image);
          themesWInner.appendChild(themeEl);
        });
        themesWInner.querySelector("input[value=\"".concat(this.settings.theme.name, "\"]")).setAttribute('checked', 'checked');
        var themeCb = function themeCb(e) {
          _this2._loading = true;
          _this2._loadingState(true, true);
          _this2.setTheme(e.target.value, true, function () {
            _this2._loading = false;
            _this2._loadingState(false, true);
          });
        };
        themesWInner.addEventListener('change', themeCb);
        this._listeners.push([themesWInner, 'change', themeCb]);
      }
      var themingW = this.container.querySelector('.template-customizer-theming');
      if (!this._hasControls('style') && !this._hasControls('themes')) {
        themingW.parentNode.removeChild(themingW);
      }

      // Layout wrapper
      var layoutW = this.container.querySelector('.template-customizer-layout');
      if (!this._hasControls('rtl headerType contentLayout layoutCollapsed layoutNavbarOptions', true)) {
        layoutW.parentNode.removeChild(layoutW);
      } else {
        // RTL
        //

        var directionW = this.container.querySelector('.template-customizer-directions');
        // ? Hide RTL control in following 2 case
        if (!this._hasControls('rtl') || !rtlSupport) {
          directionW.parentNode.removeChild(directionW);
        } else {
          var directionOpt = directionW.querySelector('.template-customizer-directions-options');
          this.settings.availableDirections.forEach(function (dir) {
            var dirEl = createOptionElement(dir.name, dir.title, 'directionRadioIcon', cl.contains('dark-style'));
            directionOpt.appendChild(dirEl);
          });
          directionOpt.querySelector("input[value=\"".concat(this.settings.rtl ? 'rtl' : 'ltr', "\"]")).setAttribute('checked', 'checked');
          var rtlCb = function rtlCb(e) {
            _this2._loadingState(true);
            _this2.setRtl(e.target.value === 'rtl', true, function () {
              _this2._loadingState(false);
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
        var headerTypeW = this.container.querySelector('.template-customizer-headerOptions');
        var templateName = document.documentElement.getAttribute('data-template').split('-');
        if (!this._hasControls('headerType')) {
          headerTypeW.parentNode.removeChild(headerTypeW);
        } else {
          var headerOpt = headerTypeW.querySelector('.template-customizer-header-options');
          setTimeout(function () {
            if (templateName.includes('vertical')) {
              headerTypeW.parentNode.removeChild(headerTypeW);
            }
          }, 100);
          this.settings.availableHeaderTypes.forEach(function (header) {
            var headerEl = createOptionElement(header.name, header.title, 'headerRadioIcon', cl.contains('dark-style'), "horizontal-".concat(header.name));
            headerOpt.appendChild(headerEl);
          });
          headerOpt.querySelector("input[value=\"".concat(this.settings.headerType, "\"]")).setAttribute('checked', 'checked');
          var headerTypeCb = function headerTypeCb(e) {
            _this2.setLayoutType(e.target.value);
          };
          headerOpt.addEventListener('change', headerTypeCb);
          this._listeners.push([headerOpt, 'change', headerTypeCb]);
        }

        // CONTENT
        //

        var contentWrapper = this.container.querySelector('.template-customizer-content');
        // ? Hide RTL control in following 2 case
        if (!this._hasControls('contentLayout')) {
          contentWrapper.parentNode.removeChild(contentWrapper);
        } else {
          var contentOpt = contentWrapper.querySelector('.template-customizer-content-options');
          this.settings.availableContentLayouts.forEach(function (content) {
            var contentEl = createOptionElement(content.name, content.title, 'contentRadioIcon', cl.contains('dark-style'));
            contentOpt.appendChild(contentEl);
          });
          contentOpt.querySelector("input[value=\"".concat(this.settings.contentLayout, "\"]")).setAttribute('checked', 'checked');
          var contentCb = function contentCb(e) {
            _this2._loading = true;
            _this2._loadingState(true, true);
            _this2.setContentLayout(e.target.value, true, function () {
              _this2._loading = false;
              _this2._loadingState(false, true);
            });
          };
          contentOpt.addEventListener('change', contentCb);
          this._listeners.push([contentOpt, 'change', contentCb]);
        }

        // Layouts Collapsed: Expanded, Collapsed
        var layoutCollapsedW = this.container.querySelector('.template-customizer-layouts');
        if (!this._hasControls('layoutCollapsed')) {
          layoutCollapsedW.parentNode.removeChild(layoutCollapsedW);
        } else {
          setTimeout(function () {
            if (document.querySelector('.layout-menu-horizontal')) {
              layoutCollapsedW.parentNode.removeChild(layoutCollapsedW);
            }
          }, 100);
          var layoutCollapsedOpt = layoutCollapsedW.querySelector('.template-customizer-layouts-options');
          this.settings.availableLayouts.forEach(function (layoutOpt) {
            var layoutsEl = createOptionElement(layoutOpt.name, layoutOpt.title, 'layoutsRadios', cl.contains('dark-style'));
            layoutCollapsedOpt.appendChild(layoutsEl);
          });
          layoutCollapsedOpt.querySelector("input[value=\"".concat(this.settings.layoutCollapsed ? 'collapsed' : 'expanded', "\"]")).setAttribute('checked', 'checked');
          var layoutCb = function layoutCb(e) {
            window.Helpers.setCollapsed(e.target.value === 'collapsed', true);
            _this2._setSetting('LayoutCollapsed', e.target.value === 'collapsed');
          };
          layoutCollapsedOpt.addEventListener('change', layoutCb);
          this._listeners.push([layoutCollapsedOpt, 'change', layoutCb]);
        }

        // Layout Navbar Options
        var navbarOption = this.container.querySelector('.template-customizer-layoutNavbarOptions');
        if (!this._hasControls('layoutNavbarOptions')) {
          navbarOption.parentNode.removeChild(navbarOption);
        } else {
          setTimeout(function () {
            if (templateName.includes('horizontal')) {
              navbarOption.parentNode.removeChild(navbarOption);
            }
          }, 100);
          var navbarTypeOpt = navbarOption.querySelector('.template-customizer-navbar-options');
          this.settings.availableNavbarOptions.forEach(function (navbarOpt) {
            var navbarEl = createOptionElement(navbarOpt.name, navbarOpt.title, 'navbarOptionRadios', cl.contains('dark-style'));
            navbarTypeOpt.appendChild(navbarEl);
          });
          // check navbar option from settings
          navbarTypeOpt.querySelector("input[value=\"".concat(this.settings.layoutNavbarOptions, "\"]")).setAttribute('checked', 'checked');
          var navbarCb = function navbarCb(e) {
            _this2._loading = true;
            _this2._loadingState(true, true);
            _this2.setLayoutNavbarOption(e.target.value, true, function () {
              _this2._loading = false;
              _this2._loadingState(false, true);
            });
          };
          navbarTypeOpt.addEventListener('change', navbarCb);
          this._listeners.push([navbarTypeOpt, 'change', navbarCb]);
        }
      }
      setTimeout(function () {
        var layoutCustom = _this2.container.querySelector('.template-customizer-layout');
        if (document.querySelector('.menu-vertical')) {
          if (!_this2._hasControls('rtl contentLayout layoutCollapsed layoutNavbarOptions', true)) {
            if (layoutCustom) {
              layoutCustom.parentNode.removeChild(layoutCustom);
            }
          }
        } else if (document.querySelector('.menu-horizontal')) {
          if (!_this2._hasControls('rtl contentLayout headerType', true)) {
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
          window.addEventListener('DOMContentLoaded', function () {
            return _container.body.appendChild(_this2.container);
          });
        }
      } else {
        _container.appendChild(this.container);
      }
    }
  }, {
    key: "_initDirection",
    value: function _initDirection() {
      if (this._hasControls('rtl')) document.documentElement.setAttribute('dir', this.settings.rtl ? 'rtl' : 'ltr');
    }

    // Init template styles
  }, {
    key: "_initStyle",
    value: function _initStyle() {
      if (!this._hasControls('style')) return;
      var style = this.settings.style;
      this._insertStylesheet('template-customizer-core-css', this.pathResolver(this.settings.cssPath + this.settings.cssFilenamePattern.replace('%name%', "core".concat(style !== 'light' ? "-".concat(style) : ''))));
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

      var classesToRemove = style === 'light' ? ['dark-style'] : ['light-style'];
      classesToRemove.forEach(function (cls) {
        document.documentElement.classList.remove(cls);
      });
      document.documentElement.classList.add("".concat(style, "-style"));
    }

    // Init theme style
  }, {
    key: "_initTheme",
    value: function _initTheme() {
      if (this._hasControls('themes')) {
        this._insertStylesheet('template-customizer-theme-css', this.pathResolver(this.settings.themesPath + this.settings.cssFilenamePattern.replace('%name%', this.settings.theme.name + (this.settings.style !== 'light' ? "-".concat(this.settings.style) : ''))));
      } else {
        // If theme control is not enabled, get the current theme from localstorage else display default theme
        var theme = this._getSetting('Theme');
        this._insertStylesheet('template-customizer-theme-css', this.pathResolver(this.settings.themesPath + this.settings.cssFilenamePattern.replace('%name%', theme ? theme : 'theme-default' + (this.settings.style !== 'light' ? "-".concat(this.settings.style) : ''))));
      }
    }
  }, {
    key: "_insertStylesheet",
    value: function _insertStylesheet(className, href) {
      var curLink = document.querySelector(".".concat(className));
      if (typeof document.documentMode === 'number' && document.documentMode < 11) {
        if (!curLink) return;
        if (href === curLink.getAttribute('href')) return;
        var link = document.createElement('link');
        link.setAttribute('rel', 'stylesheet');
        link.setAttribute('type', 'text/css');
        link.className = className;
        link.setAttribute('href', href);
        curLink.parentNode.insertBefore(link, curLink.nextSibling);
      } else {
        document.write("<link rel=\"stylesheet\" type=\"text/css\" href=\"".concat(href, "\" class=\"").concat(className, "\">"));
      }
      curLink.parentNode.removeChild(curLink);
    }
  }, {
    key: "_loadStylesheets",
    value: function _loadStylesheets(stylesheets, cb) {
      var paths = Object.keys(stylesheets);
      var count = paths.length;
      var loaded = 0;
      function loadStylesheet(path, curLink, _cb) {
        var link = document.createElement('link');
        link.setAttribute('href', path);
        link.setAttribute('rel', 'stylesheet');
        link.setAttribute('type', 'text/css');
        link.className = curLink.className;
        var sheet = 'sheet' in link ? 'sheet' : 'styleSheet';
        var cssRules = 'sheet' in link ? 'cssRules' : 'rules';
        var intervalId;
        var timeoutId = setTimeout(function () {
          clearInterval(intervalId);
          clearTimeout(timeoutId);
          curLink.parentNode.removeChild(link);
          _cb(false, path);
        }, 15000);
        intervalId = setInterval(function () {
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
      for (var i = 0; i < paths.length; i++) {
        loadStylesheet(paths[i], stylesheets[paths[i]], stylesheetCallBack());
      }
    }
  }, {
    key: "_loadingState",
    value: function _loadingState(enable, themes) {
      this.container.classList[enable ? 'add' : 'remove']("template-customizer-loading".concat(themes ? '-theme' : ''));
    }
  }, {
    key: "_getElementFromString",
    value: function _getElementFromString(str) {
      var wrapper = document.createElement('div');
      wrapper.innerHTML = str;
      return wrapper.firstChild;
    }

    // Set settings in LocalStorage with layout & key
  }, {
    key: "_getSetting",
    value: function _getSetting(key) {
      var result = null;
      var layoutName = this._getLayoutName();
      try {
        result = localStorage.getItem("templateCustomizer-".concat(layoutName, "--").concat(key));
      } catch (e) {
        // Catch error
      }
      return String(result || '');
    }
  }, {
    key: "_showResetBtnNotification",
    value: function _showResetBtnNotification() {
      var _this3 = this;
      var show = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;
      setTimeout(function () {
        var resetBtnAttr = _this3.container.querySelector('.template-customizer-reset-btn .badge');
        if (show) {
          resetBtnAttr.classList.remove('d-none');
        } else {
          resetBtnAttr.classList.add('d-none');
        }
      }, 200);
    }

    // Set settings in LocalStorage with layout & key
  }, {
    key: "_setSetting",
    value: function _setSetting(key, val) {
      var layoutName = this._getLayoutName();
      try {
        localStorage.setItem("templateCustomizer-".concat(layoutName, "--").concat(key), String(val));
        this._showResetBtnNotification();
      } catch (e) {
        // Catch Error
      }
    }

    // Get layout name to set unique
  }, {
    key: "_getLayoutName",
    value: function _getLayoutName() {
      return document.getElementsByTagName('HTML')[0].getAttribute('data-template');
    }
  }, {
    key: "_removeListeners",
    value: function _removeListeners() {
      for (var i = 0, l = this._listeners.length; i < l; i++) {
        this._listeners[i][0].removeEventListener(this._listeners[i][1], this._listeners[i][2]);
      }
    }
  }, {
    key: "_cleanup",
    value: function _cleanup() {
      this._removeListeners();
      this._listeners = [];
      this._controls = {};
      if (this._updateInterval) {
        clearInterval(this._updateInterval);
        this._updateInterval = null;
      }
    }
  }, {
    key: "_ssr",
    get: function get() {
      return typeof window === 'undefined';
    }

    // Check controls availability
  }, {
    key: "_hasControls",
    value: function _hasControls(controls) {
      var _this4 = this;
      var oneOf = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      return controls.split(' ').reduce(function (result, control) {
        if (_this4.settings.controls.indexOf(control) !== -1) {
          if (oneOf || result !== false) result = true;
        } else if (!oneOf || result !== true) result = false;
        return result;
      }, null);
    }

    // Get the default theme
  }, {
    key: "_getDefaultTheme",
    value: function _getDefaultTheme(themeId) {
      var theme;
      if (typeof themeId === 'string') {
        theme = this._getThemeByName(themeId, false);
      } else {
        theme = this.settings.availableThemes[themeId];
      }
      if (!theme) {
        throw new Error("Theme ID \"".concat(themeId, "\" not found!"));
      }
      return theme;
    }

    // Get theme by themeId/themeName
  }, {
    key: "_getThemeByName",
    value: function _getThemeByName(themeName) {
      var returnDefault = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      var themes = this.settings.availableThemes;
      for (var i = 0, l = themes.length; i < l; i++) {
        if (themes[i].name === themeName) return themes[i];
      }
      return returnDefault ? this.settings.defaultTheme : null;
    }
  }]);
}(); // Styles
TemplateCustomizer.STYLES = [{
  name: 'light',
  title: 'Light'
}, {
  name: 'dark',
  title: 'Dark'
}, {
  name: 'system',
  title: 'System'
}];

// Themes
TemplateCustomizer.THEMES = [{
  name: 'theme-default',
  title: 'Default'
}, {
  name: 'theme-bordered',
  title: 'Bordered'
}, {
  name: 'theme-semi-dark',
  title: 'Semi Dark'
}];

// Layouts
TemplateCustomizer.LAYOUTS = [{
  name: 'expanded',
  title: 'Expanded'
}, {
  name: 'collapsed',
  title: 'Collapsed'
}];

// Navbar Options
TemplateCustomizer.NAVBAR_OPTIONS = [{
  name: 'sticky',
  title: 'Sticky'
}, {
  name: 'static',
  title: 'Static'
}, {
  name: 'hidden',
  title: 'Hidden'
}];

// Header Types
TemplateCustomizer.HEADER_TYPES = [{
  name: 'fixed',
  title: 'Fixed'
}, {
  name: 'static',
  title: 'Static'
}];

// Content Types
TemplateCustomizer.CONTENT = [{
  name: 'compact',
  title: 'Compact'
}, {
  name: 'wide',
  title: 'Wide'
}];

// Directions
TemplateCustomizer.DIRECTIONS = [{
  name: 'ltr',
  title: 'Left to Right (En)'
}, {
  name: 'rtl',
  title: 'Right to Left (Ar)'
}];

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

}();
/******/ 	return __webpack_exports__;
/******/ })()
;
});