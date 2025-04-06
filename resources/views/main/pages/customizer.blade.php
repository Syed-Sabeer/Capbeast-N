@extends('main.layouts.master')


@section('main-container')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Adamina&family=Aladin&family=Amatic+SC:wght@400;700&family=Amiri&family=Arizonia&family=Berkshire+Swash&family=Black+Ops+One&family=Cookie&family=Damion&family=Fondamento&family=IM+Fell+English&family=Indie+Flower&family=Kaushan+Script&family=Merienda&family=Old+Standard+TT&family=Pacifico&family=Patrick+Hand&family=Permanent+Marker&family=Rock+Salt&family=Satisfy&family=Shadows+Into+Light&family=Special+Elite&family=Tangerine&family=Yesteryear&display=swap">

    <style>
        :root {
            --primary-color: #3a86ff;
            --dark-color: #2b2d42;
            --light-color: #f8f9fa;
            --accent-color: #ff5a5f;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark-color);
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            background-color: var(--dark-color);
            height: 100vh;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-option {
            background-color: #f8f9fa;
            height: 100vh;
            box-shadow: 1px 0 5px rgba(0, 0, 0, 0.05);
            border-right: 1px solid #e9ecef;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        .right-sidebar {
            background-color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            color: white;
            font-weight: 600;
            padding: 15px 0;
            border-bottom: 2px solid var(--primary-color);
            width: 100%;
            text-align: center;
        }

        .sidebar button {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 14px;
        }

        .sidebar button:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .sidebar button.active {
            background-color: var(--primary-color);
        }

        .sidebar button i {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .main-content {
            background-color: white;
            height: 100vh;
            overflow-y: auto;
            margin-left: 0 ;
            /* margin-bottom: 100px; */
        }

        .main-content h2 {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 30px;
            padding-top: 20px;
        }

        .hat-preview {
            width: 400px;
            height: 400px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            border: 1px solid #e9ecef;
        }

        .design-area {
            width: 100%;
            height: 100%;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .option-bar {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid #e9ecef;
            max-width: 400px;
            margin: 20px auto;
        }

        .option-bar span {
            font-weight: 500;
            color: var(--dark-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 10px 25px;
            font-weight: 500;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #2a75e6;
        }

        .right-sidebar .btn {
            margin: 10px 0;
            padding: 10px;
            border-radius: 8px;
            font-weight: 500;
            background-color: var(--dark-color);
            color: white;
            transition: all 0.3s ease;
        }

        .right-sidebar .btn:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .color-options {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .color-option {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s ease;
        }

        .color-option:hover {
            transform: scale(1.1);
        }

        .color-option.active {
            border-color: var(--primary-color);
            transform: scale(1.1);
        }

        .tool-section {
            margin-top: 30px;
            width: 100%;
        }

        .tool-section h4 {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 8px;
        }

        .option-panel {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .option-panel.active {
            display: block;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #e9ecef;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
        }

        .design-thumbnail {
            width: 100%;
            height: 80px;
            background-color: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            border: 1px solid #e9ecef;
        }

        .design-thumbnail:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .design-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 15px;
        }

        .text-style-option {
            padding: 10px;
            border-radius: 8px;
            background-color: #f8f9fa;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }

        .text-style-option:hover {
            background-color: #e9ecef;
        }

        .text-style-option.active {
            border-color: var(--primary-color);
            background-color: rgba(58, 134, 255, 0.1);
        }

        .active-btn {
            background-color: var(--primary-color) !important;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @media (max-width: 992px) {

            .sidebar,
            .sidebar-option,
            .right-sidebar {
                height: auto;
            }

            body {
                overflow: auto;
            }
        }

        .color-option {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-block;
            cursor: pointer;
            background-size: cover;
            background-position: center;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .raised-text {
            text-shadow: 1px 1px 0 #000,
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000;
        }

        .slider-container {
            position: relative;
            width: 100%;
            text-align: center;
            margin-top: 10px;
        }

        .slider-label {
            font-size: 16px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .font-size-value {
            position: absolute;
            top: -25px;
            left: 10%;
            transform: translateX(-50%);
            background: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-range {
            width: 100%;
            -webkit-appearance: none;
            height: 6px;
            background: #ddd;
            border-radius: 5px;
            outline: none;
            transition: background 0.3s;
        }

        .form-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            background: #007bff;
            border-radius: 50%;
            cursor: pointer;
        }

        .form-range::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: #007bff;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
<section class="section">
  <div class="container-fluid">
      <div class="row">
          <!-- Left Sidebar - Design Tools -->
          <div class="col-md-2 sidebar p-4">

              <div class="tool-section">
                  <button class="w-100 active" data-panel="upload-panel">
                      <i class="fa-solid fa-file-arrow-up"></i>
                      <span>Upload Image</span>
                  </button>
                  <button class="w-100" data-panel="design-panel">
                      <i class="fa-solid fa-palette"></i>
                      <span>Add Design</span>
                  </button>
                  <button class="w-100" data-panel="text-panel">
                      <i class="fa-solid fa-text-height"></i>
                      <span>Add Text</span>
                  </button>
              </div>
          </div>

          <!-- Dynamic Options Sidebar -->
          <div class="col-md-3 sidebar-option p-4">
              <!-- Upload Panel -->
              <div class="option-panel active" id="upload-panel">
                  <h4 class="mb-4">Upload Your Design</h4>
                  <div class="upload-area border rounded p-4 text-center mb-4"
                      style="background-color: #f8f9fa; border-style: dashed !important;">
                      <i class="fas fa-cloud-upload-alt fa-3x mb-3 text-muted"></i>
                      <p>Drag & drop your image here</p>
                      <p class="small text-muted">or</p>
                      <button class="btn btn-primary">Browse Files</button>
                      <p class="small text-muted mt-2">Supports: JPG, PNG, SVG (Max 5MB)</p>
                  </div>
              </div>

              <!-- Text Panel -->
              <div class="option-panel" id="text-panel">
                  <h4 class="mb-4">Add Text</h4>
                  <div class="mb-3">
                      <label class="form-label">Your Text</label>
                      <input type="text" class="form-control mb-3" placeholder="Enter your text here">

                      <label class="form-label">Font Family</label>
                      <!-- Updated dropdown -->
                      <select class="form-select mb-3">
                          <!-- Standard fonts -->
                          <option value="Arial, sans-serif" style="font-family: Arial, sans-serif;">Arial</option>
                          <option value="Helvetica, sans-serif" style="font-family: Helvetica, sans-serif;">Helvetica
                          </option>
                          <option value="'Times New Roman', serif" style="font-family: 'Times New Roman', serif;">Times
                              New Roman</option>
                          <option value="'Courier New', monospace" style="font-family: 'Courier New', monospace;">Courier
                              New</option>
                          <option value="Georgia, serif" style="font-family: Georgia, serif;">Georgia</option>

                          <!-- Google Fonts -->
                          <option value="'Adamina', serif" style="font-family: 'Adamina', serif;">Adamina</option>
                          <option value="'Aladin', cursive" style="font-family: 'Aladin', cursive;">Aladin</option>
                          <option value="'Amatic SC', cursive" style="font-family: 'Amatic SC', cursive;">Amatic SC
                          </option>
                          <option value="'Amiri', serif" style="font-family: 'Amiri', serif;">Amiri</option>
                          <option value="'Arizonia', cursive" style="font-family: 'Arizonia', cursive;">Arizonia</option>
                          <option value="'Berkshire Swash', cursive" style="font-family: 'Berkshire Swash', cursive;">
                              Berkshire Swash</option>
                          <option value="'Black Ops One', cursive" style="font-family: 'Black Ops One', cursive;">Black
                              Ops One</option>
                          <option value="'Cookie', cursive" style="font-family: 'Cookie', cursive;">Cookie</option>
                          <option value="'Damion', cursive" style="font-family: 'Damion', cursive;">Damion</option>
                          <option value="'Fondamento', cursive" style="font-family: 'Fondamento', cursive;">Fondamento
                          </option>
                          <option value="'IM Fell English', serif" style="font-family: 'IM Fell English', serif;">IM FELL
                              English</option>
                          <option value="'Indie Flower', cursive" style="font-family: 'Indie Flower', cursive;">Indie
                              Flower</option>
                          <option value="'Kaushan Script', cursive" style="font-family: 'Kaushan Script', cursive;">
                              Kaushan Script</option>
                          <option value="'Merienda', cursive" style="font-family: 'Merienda', cursive;">Merienda</option>
                          <option value="'Old Standard TT', serif" style="font-family: 'Old Standard TT', serif;">Old
                              English</option>
                          <option value="'Pacifico', cursive" style="font-family: 'Pacifico', cursive;">Pacifico</option>
                          <option value="'Patrick Hand', cursive" style="font-family: 'Patrick Hand', cursive;">Patrick
                              Hand</option>
                          <option value="'Permanent Marker', cursive" style="font-family: 'Permanent Marker', cursive;">
                              Permanent Marker</option>
                          <option value="'Rock Salt', cursive" style="font-family: 'Rock Salt', cursive;">Rock Salt
                          </option>
                          <option value="'Satisfy', cursive" style="font-family: 'Satisfy', cursive;">Script Tails
                          </option>
                          <option value="'Shadows Into Light', cursive"
                              style="font-family: 'Shadows Into Light', cursive;">Shout Out</option>
                          <option value="'Special Elite', cursive" style="font-family: 'Special Elite', cursive;">
                              Distillery</option>
                          <option value="'Tangerine', cursive" style="font-family: 'Tangerine', cursive;">Expression
                          </option>
                          <option value="'Yesteryear', cursive" style="font-family: 'Yesteryear', cursive;">Varsity
                          </option>
                      </select>


                      <label class="form-label">Font Size</label>
                      <!-- <input type="range" class="form-range mb-3" min="8" max="72" value="24"> -->
                      <div class="slider-container">
                          <!-- <label class="slider-label">Font Size</label> -->
                          <span class="font-size-value" id="fontSizeValue">10px</span>
                          <input type="range" class="form-range" min="5" max="100" value="10"
                              id="fontSizeRange">
                      </div>
                      <label class="form-label">Thread Color</label>
                      <div class="color-options mb-3">
                        @if (isset($textColors) && count($textColors) > 0)
                          @foreach ($textColors as $index => $color)
                            <div title="{{$color->color_name}}" class="color-option"
                              style="background-image: url({{asset($color->color_image)}});"></div>
                          @endforeach
                        @endif
                      </div>


                      <label class="form-label">Text Style</label>
                      <div class="text-style-option active">
                          <div style="font-weight: normal;">Normal</div>
                      </div>
                      <div class="text-style-option">
                          <div style="font-weight: bold;">Bold</div>
                      </div>
                      <div class="text-style-option">
                          <div style="font-style: italic;">Italic</div>
                      </div>
                      <div class="text-style-option">
                          <div style="text-decoration: underline;">Underline</div>
                      </div>
                  </div>
              </div>

              <!-- Design Panel -->
              <div class="option-panel" id="design-panel">
                  <h4 class="mb-4">Add Design Elements</h4>
                  <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search designs...">
                      <button class="btn btn-outline-secondary" type="button">
                          <i class="fas fa-search"></i>
                      </button>
                  </div>

                  <div class="design-grid">
                      <div class="design-thumbnail" style="background-image: url('images/navbar.PNG')">
                      </div>
                      <div class="design-thumbnail"
                          style="background-image: url('https://via.placeholder.com/150/ff5a5f/ffffff?text=Logo2')">
                      </div>
                      <div class="design-thumbnail"
                          style="background-image: url('https://via.placeholder.com/150/2ec4b6/ffffff?text=Logo3')">
                      </div>
                      <div class="design-thumbnail"
                          style="background-image: url('https://via.placeholder.com/150/8338ec/ffffff?text=Logo4')">
                      </div>
                      <div class="design-thumbnail"
                          style="background-image: url('https://via.placeholder.com/150/ffbe0b/000000?text=Logo5')">
                      </div>
                      <div class="design-thumbnail"
                          style="background-image: url('https://via.placeholder.com/150/fb5607/ffffff?text=Logo6')">
                      </div>
                  </div>

                  <div class="d-flex justify-content-between mt-3">
                      <button class="btn btn-outline-secondary">
                          <i class="fas fa-chevron-left"></i> Previous
                      </button>
                      <button class="btn btn-outline-secondary">
                          Next <i class="fas fa-chevron-right"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Main Content - Hat Preview -->
          <div class="col-md-5 main-content p-4">
              <div class="hat-preview mx-auto">
                  <div class="design-area" id="hat-view">
                      <!-- This will be updated with the selected view -->
                      <img src="{{asset($userCustomization->front_image)}}" alt="Front View" class="img-fluid" id="current-view">
                  </div>
              </div>
              <div class="mt-4 p-3 bg-light rounded">
                  <div class="d-flex justify-content-around text-center view-selector">
                      <div class="px-3 view-option" data-view="front">
                          <img height="50px" src="{{asset($userCustomization->front_image)}}" alt="Front View" class="active">
                          <p class="small mb-0 active">Front-$12.00</p>
                      </div>
                      <div class="px-3 view-option" data-view="left">
                          <img height="50px" src="{{asset($userCustomization->left_image)}}" alt="Left View">
                          <p class="small mb-0">Left-$12.00</p>
                      </div>
                      <div class="px-3 view-option" data-view="right">
                          <img height="50px" src="{{asset($userCustomization->right_image)}}" alt="Right View">
                          <p class="small mb-0">Right-$12.00</p>
                      </div>
                      <div class="px-3 view-option" data-view="back">
                          <img height="50px" src="{{asset($userCustomization->back_image)}}" alt="Back View">
                          <p class="small mb-0">Back-$12.00</p>
                      </div>
                  </div>
              </div>
              <div class="option-bar mt-4 d-flex justify-content-between align-items-center p-3">
                  <div>
                      <span>Color: <strong>Black</strong></span>
                      <span class="mx-3">|</span>
                      <span>Size: <strong>One Size</strong></span>
                  </div>
                  <button class="btn btn-primary">
                      <i class="fas fa-shopping-cart me-2"></i>ADD TO CART - $29.99
                  </button>
              </div>

              <div class="mt-4 p-3 bg-light rounded" style="margin-bottom: 100px !important;">
                  <h5 class="mb-3">Design Tips</h5>
                  <div class="d-flex justify-content-around text-center">
                      <div class="px-3">
                          <i class="fas fa-ruler-combined text-primary mb-2"></i>
                          <p class="small mb-0">Optimal design area is within the center 300px</p>
                      </div>
                      <div class="px-3">
                          <i class="fas fa-image text-primary mb-2"></i>
                          <p class="small mb-0">Use high-resolution images for best quality</p>
                      </div>
                      <div class="px-3">
                          <i class="fas fa-paint-brush text-primary mb-2"></i>
                          <p class="small mb-0">Contrasting colors work best for visibility</p>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Right Sidebar - Editing Tools -->
          <div class="col-md-2 right-sidebar p-4">
              <button class="btn" id="pan-btn">
                  <i class="fas fa-hand me-2"></i>PAN
              </button>
              <button class="btn" id="undo-btn">
                  <i class="fas fa-undo me-2"></i>Undo
              </button>
              <button class="btn" id="redo-btn">
                  <i class="fas fa-redo me-2"></i>Redo
              </button>
              <button class="btn" id="zoomIn-btn">
                  <i class="fas fa-search-plus me-2"></i>Zoom In
              </button>
              <button class="btn" id="zoomOut-btn">
                  <i class="fas fa-search-minus me-2"></i>Zoom Out
              </button>
              <button class="btn" id="lock-btn">
                  <i class="fas fa-lock me-2"></i>Lock
              </button>
          </div>
      </div>
  </div>
</section>

    <!-- jQuery CDN (latest version) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        const rangeInput = document.getElementById("fontSizeRange");
        const valueDisplay = document.getElementById("fontSizeValue");

        rangeInput.addEventListener("input", function() {
            valueDisplay.textContent = `${this.value}px`;
            valueDisplay.style.left = `${(this.value - this.min) / (this.max - this.min) * 100}%`;
        });
        $(document).ready(function() {
            // Panel switching functionality
            $('.sidebar button').on('click', function() {
                const panelId = $(this).data('panel');

                // Update active state in sidebar
                $('.sidebar button').removeClass('active');
                $(this).addClass('active');

                // Show the corresponding panel
                $('.option-panel').removeClass('active');
                $('#' + panelId).addClass('active');
            });

            // Color selection functionality
            $('.color-option').on('click', function() {
                const parent = $(this).closest('.color-options');
                if (parent.length) {
                    parent.find('.color-option').removeClass('active');
                }
                $(this).addClass('active');

                // Update the color display in the option bar if it's the main color selector
                if ($(this).closest('.sidebar .tool-section').length) {
                    const colorName = $(this).attr('title') || $(this).text();
                    $('.option-bar span strong').text(colorName);
                }
            });

            // Text style selection
            $('.text-style-option').on('click', function() {
                $('.text-style-option').removeClass('active');
                $(this).addClass('active');
            });

            // Layer visibility toggle
            $('.layer-list .fa-eye, .layer-list .fa-eye-slash').on('click', function(e) {
                e.stopPropagation();
                if ($(this).hasClass('fa-eye')) {
                    $(this).removeClass('fa-eye text-primary').addClass('fa-eye-slash text-muted');
                } else {
                    $(this).removeClass('fa-eye-slash text-muted').addClass('fa-eye text-primary');
                }
            });

            // Design thumbnail selection
            $('.design-thumbnail').on('click', function() {
                $('.design-area').css('backgroundImage', $(this).css('backgroundImage'));
            });

            // Hat view selection functionality
            $('.view-option').on('click', function() {
                const view = $(this).data('view');
                const imgSrc = $(this).find('img').attr('src');

                // Update active state
                $('.view-option img, .view-option p').removeClass('active');
                $(this).find('img, p').addClass('active');

                // Update the main view
                $('#current-view').attr('src', imgSrc);
            });

            // Initialize with front view
            $('.view-option[data-view="front"]').trigger('click');

            // Right sidebar tools functionality
            let zoomLevel = 1;
            let isLocked = false;
            let isPanning = false;
            let panStart = {
                x: 0,
                y: 0
            };
            let panOffset = {
                x: 0,
                y: 0
            };
            const designArea = $('#hat-view');
            const currentView = $('#current-view');
            const undoStack = [];
            const redoStack = [];

            // Save current state to undo stack
            function saveState() {
                undoStack.push({
                    src: currentView.attr('src'),
                    transform: currentView.css('transform'),
                    zoom: zoomLevel,
                    offset: {
                        ...panOffset
                    }
                });
                redoStack.length = 0; // Clear redo stack when new action is performed
            }

            $('#pan-btn').on('click', function() {
                isPanning = !isPanning;
                $(this).toggleClass('active-btn', isPanning);
                designArea.css('cursor', isPanning ? 'grab' : 'default');
            });

            designArea.on('mousedown', function(e) {
                if (isPanning) {
                    panStart = {
                        x: e.clientX,
                        y: e.clientY
                    };
                    designArea.css('cursor', 'grabbing');
                }
            });

            designArea.on('mousemove', function(e) {
                if (isPanning && panStart.x) {
                    panOffset.x += e.clientX - panStart.x;
                    panOffset.y += e.clientY - panStart.y;
                    panStart = {
                        x: e.clientX,
                        y: e.clientY
                    };
                    updateTransform();
                }
            });

            designArea.on('mouseup', function() {
                if (isPanning) {
                    designArea.css('cursor', 'grab');
                    saveState();
                }
            });

            // Undo
            $('#undo-btn').on('click', function() {
                if (undoStack.length > 0) {
                    const state = undoStack.pop();
                    redoStack.push({
                        src: currentView.attr('src'),
                        transform: currentView.css('transform'),
                        zoom: zoomLevel,
                        offset: {
                            ...panOffset
                        }
                    });
                    applyState(state);
                }
            });

            // Redo
            $('#redo-btn').on('click', function() {
                if (redoStack.length > 0) {
                    const state = redoStack.pop();
                    undoStack.push({
                        src: currentView.attr('src'),
                        transform: currentView.css('transform'),
                        zoom: zoomLevel,
                        offset: {
                            ...panOffset
                        }
                    });
                    applyState(state);
                }
            });

            // Zoom In
            $('#zoomIn-btn').on('click', function() {
                zoomLevel = Math.min(zoomLevel + 0.1, 3); // Max zoom 3x
                updateTransform();
                saveState();
            });

            // Zoom Out
            $('#zoomOut-btn').on('click', function() {
                zoomLevel = Math.max(zoomLevel - 0.1, 0.5); // Min zoom 0.5x
                updateTransform();
                saveState();
            });

            function updateTransform() {
                currentView.css('transform', `scale(${zoomLevel}) translate(${panOffset.x}px, ${panOffset.y}px)`);
            }

            // Lock
            $('#lock-btn').on('click', function() {
                isLocked = !isLocked;
                $(this).toggleClass('active-btn', isLocked);
                currentView.css('pointer-events', isLocked ? 'none' : 'auto');
            });

            // Apply transform to image
            function updateTransform() {
                currentView.css('transform', `translate(${panOffset.x}px, ${panOffset.y}px) scale(${zoomLevel})`);
            }

            // Apply saved state
            function applyState(state) {
                currentView.attr('src', state.src);
                currentView.css('transform', state.transform);
                zoomLevel = state.zoom;
                panOffset = {
                    ...state.offset
                };
            }

            // Add CSS to your styles
            $('<style>').text(`
              .design-boundary {
                  position: absolute;
                  border: 2px dashed #3a86ff;
                  pointer-events: none;
                  z-index: 10;
              }

              .design-content {
                  position: absolute;
                  overflow: hidden;
                  z-index: 5;
              }

              #current-view {
                  position: relative;
                  width: 100%;
                  height: auto;
              }

              .uploaded-design, .text-design {
                  max-width: 100%;
                  max-height: 100%;
                  position: absolute;
                  object-fit: contain;
              }
          `).appendTo('head');

            // Boundary configurations for each view
            const boundaryConfigs = {
                'front': {
                    top: '20%',
                    left: '50%',
                    width: '60%',
                    height: '40%'
                },
                'back': {
                    top: '20%',
                    left: '50%',
                    width: '60%',
                    height: '40%'
                },
                'left': {
                    top: '46%',
                    left: '65%',
                    width: '30%',
                    height: '15%'
                },
                'right': {
                    top: '46%',
                    left: '35%',
                    width: '30%',
                    height: '15%'
                }
            };

            // Add boundary box to the design area
            const boundary = $('<div>').addClass('design-boundary').appendTo(designArea);

            // Create container for design content
            const designContent = $('<div>').addClass('design-content').appendTo(designArea);

            // Function to update boundary and content positions based on view
            function updateDesignArea(view) {
                const config = boundaryConfigs[view] || boundaryConfigs.front;

                // Update boundary
                boundary.css({
                    top: config.top,
                    left: config.left,
                    width: config.width,
                    height: config.height,
                    transform: 'translateX(-50%)'
                });

                // Update content area
                designContent.css({
                    top: config.top,
                    left: config.left,
                    width: config.width,
                    height: config.height,
                    transform: 'translateX(-50%)'
                });

                // Clear any existing designs when view changes
                designContent.empty();
                selectedElement = null;
            }

            // Initialize with front view
            updateDesignArea('front');

            // Update design area when view changes
            $('.view-option').on('click', function() {
                const view = $(this).data('view');
                updateDesignArea(view);
            });

            // Enhanced Image Editor Functionality
            let resizeHandleSize = 10;

            // Handle image uploads with editing capabilities
            $('.upload-area button').on('click', function() {
                const input = $('<input>').attr({
                    type: 'file',
                    accept: 'image/*'
                }).on('change', function(e) {
                    const file = e.target.files[0];
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const img = $('<div>').addClass('editable-image');
                        const imgContent = $('<img>').attr({
                            src: event.target.result,
                            draggable: false
                        });

                        // Create resize handles
                        const resizeHandles = createResizeHandles();
                        resizeHandles.forEach(handle => img.append(handle));

                        // Create delete button
                        const deleteBtn = createDeleteButton();
                        img.append(deleteBtn);

                        // Create rotate handle
                        const rotateHandle = createRotateHandle();
                        img.append(rotateHandle);

                        img.append(imgContent);
                        designContent.append(img);

                        // Position in center of boundary
                        img.css({
                            left: '50%',
                            top: '50%',
                            // transform: 'translate(-50%, -50%)'
                        });

                        setupImageEditing(img[0]);
                        selectElement(img[0]);
                        saveState();
                    };
                    reader.readAsDataURL(file);
                });
                input.click();
            });

            // Handle design selection with editing capabilities
            $('.design-thumbnail').on('click', function() {
                const img = $('<div>').addClass('editable-image');
                const imgContent = $('<img>').attr({
                    src: $(this).css('backgroundImage').replace('url("', '').replace('")', ''),
                    draggable: false
                });

                // Create resize handles
                const resizeHandles = createResizeHandles();
                resizeHandles.forEach(handle => img.append(handle));

                // Create delete button
                const deleteBtn = createDeleteButton();
                img.append(deleteBtn);

                // Create rotate handle
                const rotateHandle = createRotateHandle();
                img.append(rotateHandle);

                img.append(imgContent);
                designContent.append(img);

                // Position in center of boundary
                img.css({
                    left: '50%',
                    top: '50%',
                    transform: 'translate(-50%, -50%)'
                });

                setupImageEditing(img[0]);
                selectElement(img[0]);
                saveState();
            });

            // Create resize handles
            function createResizeHandles() {
                const positions = ['nw', 'ne', 'sw', 'se'];
                return positions.map(pos => {
                    return $('<div>').addClass(`resize-handle resize-${pos}`);
                });
            }

            // Create delete button
            function createDeleteButton() {
                return $('<div>').addClass('delete-btn').html('&times;');
            }

            // Create rotate handle
            function createRotateHandle() {
                return $('<div>').addClass('rotate-handle').html('↻');
            }

            // Setup all editing functionality for an image
            function setupImageEditing(element) {
                const $element = $(element);
                const imgContent = $element.find('img')[0];
                let startX, startY, startWidth, startHeight, startAngle;
                let isDragging = false;
                let isResizing = false;
                let isRotating = false;
                let resizeDirection = '';

                // Make draggable
                $element.on('mousedown', function(e) {
                    if (e.target === element || e.target === imgContent) {
                        isDragging = true;
                        startX = e.clientX - element.getBoundingClientRect().left;
                        startY = e.clientY - element.getBoundingClientRect().top;
                        selectElement(element);
                        e.preventDefault();
                    }
                });

                // Handle resize handles
                $element.find('.resize-handle').on('mousedown', function(e) {
                    isResizing = true;
                    resizeDirection = $(this).attr('class').split(' ')[1].split('-')[1];
                    startWidth = parseInt($element.css('width')) || imgContent.offsetWidth;
                    startHeight = parseInt($element.css('height')) || imgContent.offsetHeight;
                    startX = e.clientX;
                    startY = e.clientY;
                    selectElement(element);
                    e.stopPropagation();
                    e.preventDefault();
                });

                // Handle rotate
                $element.find('.rotate-handle').on('mousedown', function(e) {
                    isRotating = true;
                    const rect = element.getBoundingClientRect();
                    const centerX = rect.left + rect.width / 2;
                    const centerY = rect.top + rect.height / 2;
                    startAngle = Math.atan2(e.clientY - centerY, e.clientX - centerX) * 180 / Math.PI;
                    const currentAngle = parseFloat($element.css('transform')?.replace(/[^0-9\-.,]/g, '') ||
                        0);
                    startAngle -= currentAngle;
                    selectElement(element);
                    e.stopPropagation();
                    e.preventDefault();
                });

                // Handle delete
                $element.find('.delete-btn').on('click', function(e) {
                    $element.remove();
                    saveState();
                    e.stopPropagation();
                });

                // Document mouse move for all operations
                $(document).on('mousemove', function(e) {
                    if (!selectedElement || selectedElement !== element) return;

                    const boundaryRect = designContent[0].getBoundingClientRect();
                    const elemRect = element.getBoundingClientRect();

                    if (isDragging) {
                        // Calculate new position
                        let newLeft = e.clientX - boundaryRect.left - startX;
                        let newTop = e.clientY - boundaryRect.top - startY;

                        // Constrain to boundary
                        newLeft = Math.max(0, Math.min(newLeft, boundaryRect.width - elemRect.width));
                        newTop = Math.max(0, Math.min(newTop, boundaryRect.height - elemRect.height));

                        $element.css({
                            left: `${newLeft}px`,
                            top: `${newTop}px`
                        });
                    } else if (isResizing) {
                        // Calculate size change
                        const widthChange = e.clientX - startX;
                        const heightChange = e.clientY - startY;

                        let newWidth = startWidth;
                        let newHeight = startHeight;

                        // Adjust based on resize direction
                        if (resizeDirection.includes('e')) newWidth += widthChange;
                        if (resizeDirection.includes('w')) newWidth -= widthChange;
                        if (resizeDirection.includes('s')) newHeight += heightChange;
                        if (resizeDirection.includes('n')) newHeight -= heightChange;

                        // Maintain aspect ratio if shift key is pressed
                        if (e.shiftKey) {
                            const aspectRatio = startWidth / startHeight;
                            if (Math.abs(widthChange) > Math.abs(heightChange)) {
                                newHeight = newWidth / aspectRatio;
                            } else {
                                newWidth = newHeight * aspectRatio;
                            }
                        }

                        // Apply minimum size
                        newWidth = Math.max(newWidth, 30);
                        newHeight = Math.max(newHeight, 30);

                        // Get current position
                        const currentLeft = parseFloat($element.css('left')) || 0;
                        const currentTop = parseFloat($element.css('top')) || 0;

                        // Constrain to boundary
                        const maxWidth = boundaryRect.width - currentLeft;
                        const maxHeight = boundaryRect.height - currentTop;
                        newWidth = Math.min(newWidth, maxWidth);
                        newHeight = Math.min(newHeight, maxHeight);

                        $element.css({
                            width: `${newWidth}px`,
                            height: `${newHeight}px`
                        });
                        $(imgContent).css({
                            width: '100%',
                            height: '100%'
                        });

                        // Adjust position for NW and SW resizing
                        if (resizeDirection.includes('w')) {
                            const leftChange = startWidth - newWidth;
                            const newLeft = currentLeft + leftChange;
                            $element.css('left', `${Math.max(newLeft, 0)}px`);
                        }
                        if (resizeDirection.includes('n')) {
                            const topChange = startHeight - newHeight;
                            const newTop = currentTop + topChange;
                            $element.css('top', `${Math.max(newTop, 0)}px`);
                        }
                    } else if (isRotating) {
                        const rect = element.getBoundingClientRect();
                        const centerX = rect.left + rect.width / 2;
                        const centerY = rect.top + rect.height / 2;
                        const angle = Math.atan2(e.clientY - centerY, e.clientX - centerX) * 180 / Math.PI;
                        const rotation = angle - startAngle;

                        // $element.css('transform', `translate(-50%, -50%) rotate(${rotation}deg)`);
                        $element.css('transform', `rotate(${rotation}deg)`);
                    }
                });

                // Document mouse up to end operations
                $(document).on('mouseup', function() {
                    if (isDragging || isResizing || isRotating) {
                        saveState();
                    }
                    isDragging = false;
                    isResizing = false;
                    isRotating = false;
                });
            }

            // Make elements draggable within boundary
            function makeDraggable(element) {
                const $element = $(element);
                let isDragging = false;
                let offset = {
                    x: 0,
                    y: 0
                };

                $element.on('mousedown', function(e) {
                    if ($('#lock-btn').hasClass('active-btn')) return;

                    isDragging = true;
                    offset = {
                        x: e.clientX - element.getBoundingClientRect().left,
                        y: e.clientY - element.getBoundingClientRect().top
                    };
                    $element.css('cursor', 'grabbing');
                    e.preventDefault();
                });

                $(document).on('mousemove', function(e) {
                    if (!isDragging) return;

                    const boundaryRect = designContent[0].getBoundingClientRect();
                    const newLeft = e.clientX - boundaryRect.left - offset.x;
                    const newTop = e.clientY - boundaryRect.top - offset.y;

                    // Constrain to boundary
                    const maxX = boundaryRect.width - element.offsetWidth;
                    const maxY = boundaryRect.height - element.offsetHeight;

                    $element.css({
                        left: `${Math.min(Math.max(newLeft, 0), maxX)}px`,
                        top: `${Math.min(Math.max(newTop, 0), maxY)}px`,
                        // transform: 'none'
                    });
                });

                $(document).on('mouseup', function() {
                    isDragging = false;
                    $element.css('cursor', 'grab');
                    saveState();
                });
            }
            // Select an element for editing
            function selectElement(element) {
                // Deselect current element
                if (selectedElement) {
                    $(selectedElement).removeClass('selected');
                }

                // Select new element
                selectedElement = element;
                if (element) {
                    $(element).addClass('selected');
                }
            }

            // Add CSS for the editing controls
            $('<style>').text(`
              .editable-image {
                  position: absolute;
                  cursor: move;
                  transform-origin: center center;
              }

              .editable-image img {
                  width: 100%;
                  height: 100%;
                  object-fit: contain;
                  pointer-events: none;
              }

              .editable-image.selected {
                  outline: 2px dashed #3a86ff;
              }

              .resize-handle {
                  position: absolute;
                  width: ${resizeHandleSize}px;
                  height: ${resizeHandleSize}px;
                  background: #3a86ff;
                  border-radius: 50%;
                  z-index: 10;
              }

              .resize-nw {
                  top: -${resizeHandleSize / 2}px;
                  left: -${resizeHandleSize / 2}px;
                  cursor: nwse-resize;
              }

              .resize-ne {
                  top: -${resizeHandleSize / 2}px;
                  right: -${resizeHandleSize / 2}px;
                  cursor: nesw-resize;
              }

              .resize-sw {
                  bottom: -${resizeHandleSize / 2}px;
                  left: -${resizeHandleSize / 2}px;
                  cursor: nesw-resize;
              }

              .resize-se {
                  bottom: -${resizeHandleSize / 2}px;
                  right: -${resizeHandleSize / 2}px;
                  cursor: nwse-resize;
              }

              .delete-btn {
                  position: absolute;
                  top: -${resizeHandleSize}px;
                  right: -${resizeHandleSize}px;
                  width: ${resizeHandleSize * 1.5}px;
                  height: ${resizeHandleSize * 1.5}px;
                  background: #ff5a5f;
                  color: white;
                  border-radius: 50%;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  font-size: ${resizeHandleSize}px;
                  cursor: pointer;
                  z-index: 10;
              }

              .rotate-handle {
                  position: absolute;
                  top: -${resizeHandleSize * 2}px;
                  left: 50%;
                  transform: translateX(-50%);
                  width: ${resizeHandleSize * 1.5}px;
                  height: ${resizeHandleSize * 1.5}px;
                  background: #2ec4b6;
                  color: white;
                  border-radius: 50%;
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  font-size: ${resizeHandleSize}px;
                  cursor: grab;
                  z-index: 10;
              }

              .rotate-handle:active {
                  cursor: grabbing;
              }
          `).appendTo('head');

            // Handle text addition
            // $('#text-panel input[type="text"]').on('change', function () {
            //     const text = $(this).val();
            //     if (!text) return;

            //     // const textDiv = $('<div>').addClass('text-design').text(text).prop('contentEditable', true).css({
            //     //     position: 'absolute',
            //     //     left: '50%',
            //     //     top: '50%',
            //     //     // transform: 'translate(-50%, -50%)',
            //     //     color: $('.color-option.active').css('backgroundColor')
            //     // });
            //     const activeColorOption = $('.color-option.active').css('backgroundImage');

            //     const textDiv = $('<div>').addClass('text-design').text(text).prop('contentEditable', true).css({
            //         position: 'absolute',
            //         left: '50%',
            //         top: '50%',
            //         backgroundImage: activeColorOption, // Apply the selected thread texture
            //         backgroundClip: 'text', // Make it look embroidered
            //         color: 'transparent', // Hide the text color to show the background
            //         fontFamily: $('#text-panel select').val(),
            //         fontSize: $('#text-panel input[type="range"]').val() + 'px'
            //     });

            //     // Apply selected font style
            //     const fontFamily = $('#text-panel select').val();
            //     const textStyle = $('.text-style-option.active div').css(['fontWeight', 'fontStyle', 'textDecoration']);
            //     Object.assign(textDiv[0].style, {
            //         fontFamily: fontFamily,
            //         fontWeight: textStyle.fontWeight,
            //         fontStyle: textStyle.fontStyle,
            //         textDecoration: textStyle.textDecoration,
            //         fontSize: $('#text-panel input[type="range"]').val() + 'px'
            //     });

            //     designContent.append(textDiv);
            //     makeDraggable(textDiv[0]);
            //     saveState();
            // });

            // Handle text addition and updates
            let currentTextElement = null;

            $('#text-panel input[type="text"]').on('input', function() {
                const text = $(this).val();

                if (!currentTextElement) {
                    // Create new text element if it doesn't exist
                    const activeColorOption = $('.color-option.active').css('backgroundImage');

                    currentTextElement = $('<div>').addClass('text-design').text(text || 'Your Text')
                        .prop('contentEditable', true)
                        .css({
                            position: 'absolute',
                            left: '50%',
                            top: '50%',
                            backgroundImage: activeColorOption,
                            backgroundClip: 'text',
                            color: 'transparent',
                            fontFamily: $('#text-panel select').val(),
                            fontSize: $('#text-panel input[type="range"]').val() + 'px'
                        });

                    designContent.append(currentTextElement);
                    makeDraggable(currentTextElement[0]);
                } else {
                    // Update existing text
                    currentTextElement.text(text || 'Your Text');
                }

                saveState();
            });

            // Update text styling when other controls change
            $('#text-panel select, #text-panel input[type="range"], .color-options, .text-style-option').on(
                'change',
                function() {
                    if (!currentTextElement) return;

                    const fontFamily = $('#text-panel select').val();
                    const fontSize = $('#text-panel input[type="range"]').val() + 'px';
                    const activeColorOption = $('.color-option.active').css('backgroundImage');
                    const textStyle = $('.text-style-option.active div').css(['fontWeight', 'fontStyle',
                        'textDecoration'
                    ]);

                    currentTextElement.css({
                        fontFamily: fontFamily,
                        fontSize: fontSize,
                        backgroundImage: activeColorOption,
                        fontWeight: textStyle.fontWeight,
                        fontStyle: textStyle.fontStyle,
                        textDecoration: textStyle.textDecoration
                    });

                    saveState();
                });

            // Initialize text-style-option click handlers
            $('.text-style-option').on('click', function() {
                $('.text-style-option').removeClass('active');
                $(this).addClass('active');

                if (currentTextElement) {
                    const textStyle = $('.text-style-option.active div').css(['fontWeight', 'fontStyle',
                        'textDecoration'
                    ]);
                    currentTextElement.css({
                        fontWeight: textStyle.fontWeight,
                        fontStyle: textStyle.fontStyle,
                        textDecoration: textStyle.textDecoration
                    });
                    saveState();
                }
            });

            // Initialize color-option click handlers
            $('.color-option').on('click', function() {
                $('.color-option').removeClass('active');
                $(this).addClass('active');

                if (currentTextElement) {
                    currentTextElement.css({
                        backgroundImage: $(this).css('backgroundImage')
                    });
                    saveState();
                }
            });

            // Save/restore state functions
            function restoreState(state) {
                designContent.html(state.content);
                // Reattach event listeners to all draggable elements
                $('.uploaded-design, .text-design').each(function() {
                    makeDraggable(this);
                });
            }

            // Initialize
            saveState();
        });
    </script>
@endsection