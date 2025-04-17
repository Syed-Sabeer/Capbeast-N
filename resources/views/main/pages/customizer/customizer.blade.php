@extends('main.layouts.master')

{{-- @dd($customizerPrice) --}}
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
            margin-left: 0px !important;
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
            left: 25%;
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

        .preview-modal {
            display: flex;
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .preview-modal.show {
            display: flex;
            opacity: 1;
        }

        .preview-content {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation: modalFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
            from {
                transform: scale(0.9);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .view-option {
            cursor: pointer;
        }

        input[type="range"] {
            font-size: 1.5rem;
            width: 12.5em;
        }

        input[type="range"] {
            color: #ef233c;
            --thumb-height: 1.125em;
            --track-height: 0.125em;
            --track-color: rgba(0, 0, 0, 0.2);
            --brightness-hover: 180%;
            --brightness-down: 80%;
            --clip-edges: 0.125em;
        }

        input[type="range"].win10-thumb {
            color: #2b2d42;

            --thumb-height: 1.375em;
            --thumb-width: 0.5em;
            --clip-edges: 0.0125em;
        }

        @media (prefers-color-scheme: dark) {
            html {
                background-color: #000;
            }

            html::before {
                background: radial-gradient(circle at center, #101112, #000);
            }

            input[type="range"] {
                color: #f07167;
                --track-color: rgba(255, 255, 255, 0.1);
            }

            input[type="range"].win10-thumb {
                color: #3a86ff;
            }
        }

        /* === range commons === */
        input[type="range"] {
            position: relative;
            background: #fff0;
            overflow: hidden;
        }

        input[type="range"]:active {
            cursor: grabbing;
        }

        input[type="range"]:disabled {
            filter: grayscale(1);
            opacity: 0.3;
            cursor: not-allowed;
        }

        /* === WebKit specific styles === */
        input[type="range"],
        input[type="range"]::-webkit-slider-runnable-track,
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            transition: all ease 100ms;
            height: var(--thumb-height);
        }

        input[type="range"]::-webkit-slider-runnable-track,
        input[type="range"]::-webkit-slider-thumb {
            position: relative;
        }

        input[type="range"]::-webkit-slider-thumb {
            --thumb-radius: calc((var(--thumb-height) * 0.5) - 1px);
            --clip-top: calc((var(--thumb-height) - var(--track-height)) * 0.5 - 0.5px);
            --clip-bottom: calc(var(--thumb-height) - var(--clip-top));
            --clip-further: calc(100% + 1px);
            --box-fill: calc(-100vmax - var(--thumb-width, var(--thumb-height))) 0 0 100vmax currentColor;

            width: var(--thumb-width, var(--thumb-height));
            background: linear-gradient(currentColor 0 0) scroll no-repeat left center / 50% calc(var(--track-height) + 1px);
            background-color: currentColor;
            box-shadow: var(--box-fill);
            border-radius: var(--thumb-width, var(--thumb-height));

            filter: brightness(100%);
            clip-path: polygon(100% -1px,
                    var(--clip-edges) -1px,
                    0 var(--clip-top),
                    -100vmax var(--clip-top),
                    -100vmax var(--clip-bottom),
                    0 var(--clip-bottom),
                    var(--clip-edges) 100%,
                    var(--clip-further) var(--clip-further));
        }

        input[type="range"]:hover::-webkit-slider-thumb {
            filter: brightness(var(--brightness-hover));
            cursor: grab;
        }

        input[type="range"]:active::-webkit-slider-thumb {
            filter: brightness(var(--brightness-down));
            cursor: grabbing;
        }

        input[type="range"]::-webkit-slider-runnable-track {
            background: linear-gradient(var(--track-color) 0 0) scroll no-repeat center / 100% calc(var(--track-height) + 1px);
        }

        input[type="range"]:disabled::-webkit-slider-thumb {
            cursor: not-allowed;
        }

        /* === Firefox specific styles === */
        input[type="range"],
        input[type="range"]::-moz-range-track,
        input[type="range"]::-moz-range-thumb {
            appearance: none;
            transition: all ease 100ms;
            height: var(--thumb-height);
        }

        input[type="range"]::-moz-range-track,
        input[type="range"]::-moz-range-thumb,
        input[type="range"]::-moz-range-progress {
            background: #fff0;
        }

        input[type="range"]::-moz-range-thumb {
            background: currentColor;
            border: 0;
            width: var(--thumb-width, var(--thumb-height));
            border-radius: var(--thumb-width, var(--thumb-height));
            cursor: grab;
        }

        input[type="range"]:active::-moz-range-thumb {
            cursor: grabbing;
        }

        input[type="range"]::-moz-range-track {
            width: 100%;
            background: var(--track-color);
        }

        input[type="range"]::-moz-range-progress {
            appearance: none;
            background: currentColor;
            transition-delay: 30ms;
        }

        input[type="range"]::-moz-range-track,
        input[type="range"]::-moz-range-progress {
            height: calc(var(--track-height) + 1px);
            border-radius: var(--track-height);
        }

        input[type="range"]::-moz-range-thumb,
        input[type="range"]::-moz-range-progress {
            filter: brightness(100%);
        }

        input[type="range"]:hover::-moz-range-thumb,
        input[type="range"]:hover::-moz-range-progress {
            filter: brightness(var(--brightness-hover));
        }

        input[type="range"]:active::-moz-range-thumb,
        input[type="range"]:active::-moz-range-progress {
            filter: brightness(var(--brightness-down));
        }

        input[type="range"]:disabled::-moz-range-thumb {
            cursor: not-allowed;
        }

        .price-active {
            font-weight: bold;
            color: #3a86ff;
        }

        #total-price {
            color: #fff !important;
        }

        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: block;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader-spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
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
                    <div class="option-panel active" id="upload-panel" style="margin-bottom: 100px !important;">
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
                    <div class="option-panel" id="text-panel" style="margin-bottom: 100px !important;">
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
                                <option value="'Times New Roman', serif" style="font-family: 'Times New Roman', serif;">
                                    Times New Roman</option>
                                <option value="'Courier New', monospace" style="font-family: 'Courier New', monospace;">
                                    Courier New</option>
                                <option value="Georgia, serif" style="font-family: Georgia, serif;">Georgia</option>

                                <!-- Google Fonts -->
                                <option value="'Adamina', serif" style="font-family: 'Adamina', serif;">Adamina</option>
                                <option value="'Aladin', cursive" style="font-family: 'Aladin', cursive;">Aladin</option>
                                <option value="'Amatic SC', cursive" style="font-family: 'Amatic SC', cursive;">Amatic SC
                                </option>
                                <option value="'Amiri', serif" style="font-family: 'Amiri', serif;">Amiri</option>
                                <option value="'Arizonia', cursive" style="font-family: 'Arizonia', cursive;">Arizonia
                                </option>
                                <option value="'Berkshire Swash', cursive" style="font-family: 'Berkshire Swash', cursive;">
                                    Berkshire Swash</option>
                                <option value="'Black Ops One', cursive" style="font-family: 'Black Ops One', cursive;">
                                    Black Ops One</option>
                                <option value="'Cookie', cursive" style="font-family: 'Cookie', cursive;">Cookie</option>
                                <option value="'Damion', cursive" style="font-family: 'Damion', cursive;">Damion</option>
                                <option value="'Fondamento', cursive" style="font-family: 'Fondamento', cursive;">
                                    Fondamento
                                </option>
                                <option value="'IM Fell English', serif" style="font-family: 'IM Fell English', serif;">IM
                                    FELL English</option>
                                <option value="'Indie Flower', cursive" style="font-family: 'Indie Flower', cursive;">
                                    Indie
                                    Flower</option>
                                <option value="'Kaushan Script', cursive" style="font-family: 'Kaushan Script', cursive;">
                                    Kaushan Script</option>
                                <option value="'Merienda', cursive" style="font-family: 'Merienda', cursive;">Merienda
                                </option>
                                <option value="'Old Standard TT', serif" style="font-family: 'Old Standard TT', serif;">
                                    Old
                                    English</option>
                                <option value="'Pacifico', cursive" style="font-family: 'Pacifico', cursive;">Pacifico
                                </option>
                                <option value="'Patrick Hand', cursive" style="font-family: 'Patrick Hand', cursive;">
                                    Patrick Hand</option>
                                <option value="'Permanent Marker', cursive"
                                    style="font-family: 'Permanent Marker', cursive;">Permanent Marker</option>
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
                            <div class="slider-container">
                                <span class="font-size-value" id="fontSizeValue">25px</span>
                                <input type="range" class="win10-thumb" min="5" max="100" value="25"
                                    id="fontSizeRange" />
                                <!-- <input type="range" class="form-range" min="5" max="100" value="10" id="fontSizeRange"> -->
                            </div>

                            <label class="form-label">Thread Color</label>
                            <div class="color-options mb-3">
                                @if (isset($textColors) && count($textColors) > 0)
                                    @foreach ($textColors as $index => $color)
                                        <div title="{{ $color->color_name }}"
                                            class="color-option {{ $index === 0 ? 'active' : '' }}"
                                            style="background-image: url({{ asset($color->color_image) }});"></div>
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
                    <div class="option-panel" id="design-panel" style="margin-bottom: 100px !important;">
                        <h4 class="mb-4">Add Design Elements</h4>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="design-search"
                                placeholder="Search designs...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        <div id="designs-container">
                            @include('main.pages.customizer.designs', [
                                'customizerDesigns' => $customizerDesigns,
                            ])
                        </div>
                    </div>
                </div>

                <!-- Main Content - Hat Preview -->
                <div class="col-md-7 main-content p-4">
                    <div class="hat-preview mx-auto">
                        <div class="design-area" id="hat-view">
                            <!-- This will be updated with the selected view -->
                            <img src="{{ asset($userCustomization->front_image) }}" alt="Front View" class="img-fluid"
                                id="current-view">
                        </div>
                    </div>
                    <div class="mt-4 p-3 bg-light rounded">
                        <div class="d-flex justify-content-around text-center view-selector">
                            @if (isset($productColor))
                                @if ($productColor->is_front == '1')
                                    <div class="px-3 view-option" data-view="front">
                                        <img height="50px" src="{{ asset($userCustomization->front_image) }}"
                                            alt="Front View" class="active">
                                        <p class="small mb-0 active">Front-${{ $customizerPrice->front_price }}</p>
                                    </div>
                                @endif
                                @if ($productColor->is_left == '1')
                                    <div class="px-3 view-option" data-view="left">
                                        <img height="50px" src="{{ asset($userCustomization->left_image) }}"
                                            alt="Left View">
                                        <p class="small mb-0">Left-${{ $customizerPrice->back_price }}</p>
                                    </div>
                                @endif
                                @if ($productColor->is_right == '1')
                                    <div class="px-3 view-option" data-view="right">
                                        <img height="50px" src="{{ asset($userCustomization->right_image) }}"
                                            alt="Right View">
                                        <p class="small mb-0">Right-${{ $customizerPrice->right_price }}</p>
                                    </div>
                                @endif
                                @if ($productColor->is_back == '1')
                                    <div class="px-3 view-option" data-view="back">
                                        <img height="50px" src="{{ asset($userCustomization->back_image) }}"
                                            alt="Back View">
                                        <p class="small mb-0">Back-${{ $customizerPrice->left_price }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="option-bar mt-4 d-flex justify-content-between align-items-center p-3">
                        <div style="width: 50%">
                            <span>Product:
                                <strong>
                                    @if (isset($product))
                                        {{ $product->title }}
                                    @else
                                        No Product
                                    @endif
                                </strong>
                            </span>
                            <br>
                            {{-- <span class="mx-3">|</span> --}}
                            <span>Color:
                                <strong>
                                    @if (isset($productColor) && isset($productColor->color_name_1))
                                        {{ $productColor->color_name_1 }}
                                    @elseif(isset($productColor) && isset($productColor->color_name_2))
                                        {{ $productColor->color_name_2 }}
                                    @else
                                        No Color
                                    @endif
                                </strong>
                            </span>
                        </div>
                        <button class="btn btn-primary add-to-cart-btn" style="width: 50%">
                            <i class="fas fa-shopping-cart me-2"></i>ADD TO CART <br> $<span
                                id="total-price">{{ isset($product) ? $product->selling_price : '0.00' }}</span>
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
            </div>
        </div>
    </section>
    <div id="loader">
        <div class="loader-spinner"></div>
    </div>

    <!-- jQuery CDN (latest version) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        //design paginate
        $(document).on('click', '.paginate-btn', function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            $('#loader').show();
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#loader').hide();
                    $('#designs-container').html(data);
                },
                error: function() {
                    $('#loader').hide();
                    alert('Error loading designs. Please try again.');
                }
            });
        });

        //design search
        let searchTimeout = null;

        $('#design-search').on('input', function() {
            clearTimeout(searchTimeout);

            const searchQuery = $(this).val();

            searchTimeout = setTimeout(() => {
                $('#loader').show();
                $.ajax({
                    url: '{{ route('customizer.index', $userCustomization->id) }}', // Use your route
                    type: 'GET',
                    data: {
                        search: searchQuery
                    },
                    success: function(data) {
                        $('#loader').hide();
                        $('#designs-container').html(data);
                    },
                    error: function() {
                        $('#loader').hide();
                        alert('Error loading search results.');
                    }
                });
            }, 400); // Debounce delay
        });

        // Global state variables
        let designState = {
            currentView: 'front',
            views: {
                front: {
                    elements: [],
                    background: "{{ asset($userCustomization->front_image) }}",
                    zoom: 1,
                    pan: {
                        x: 0,
                        y: 0
                    }
                },
                left: {
                    elements: [],
                    background: "{{ asset($userCustomization->left_image) }}",
                    zoom: 1,
                    pan: {
                        x: 0,
                        y: 0
                    }
                },
                right: {
                    elements: [],
                    background: "{{ asset($userCustomization->right_image) }}",
                    zoom: 1,
                    pan: {
                        x: 0,
                        y: 0
                    }
                },
                back: {
                    elements: [],
                    background: "{{ asset($userCustomization->back_image) }}",
                    zoom: 1,
                    pan: {
                        x: 0,
                        y: 0
                    }
                }
            },
        };

        // Add this at the beginning of your script, with other global state variables
        let priceState = {
            basePrice: {{ isset($product) ? $product->selling_price : 0 }},
            views: {
                front: {
                    price: {{ $customizerPrice->front_price }},
                    hasDesign: false
                },
                left: {
                    price: {{ $customizerPrice->left_price }},
                    hasDesign: false
                },
                right: {
                    price: {{ $customizerPrice->right_price }},
                    hasDesign: false
                },
                back: {
                    price: {{ $customizerPrice->back_price }},
                    hasDesign: false
                }
            }
        };

        // Add this function to calculate and update the total price
        function updateTotalPrice() {
            let total = priceState.basePrice;

            // Add prices for views that have designs
            for (const view in priceState.views) {
                if (priceState.views[view].hasDesign) {
                    total += priceState.views[view].price;
                }
            }

            // Update the displayed price
            $('#total-price').text(total.toFixed(2));
        }

        let currentTextElement = null;
        let selectedElement = null;

        const rangeInput = document.getElementById("fontSizeRange");
        const valueDisplay = document.getElementById("fontSizeValue");

        rangeInput.addEventListener("input", function() {
            valueDisplay.textContent = `${this.value}px`;
            valueDisplay.style.left = `${(this.value - this.min) / (this.max - this.min) * 100}%`;
        });

        $(document).ready(function() {
            $('#loader').hide();
            updateTotalPrice();
            // Create download button in the UI
            const downloadBtn = $('<button>')
                .addClass('download-btn')
                .text('Download Design')
                .css({
                    'position': 'fixed',
                    'bottom': '20px',
                    'right': '20px',
                    'padding': '10px 20px',
                    'background': '#3a86ff',
                    'color': 'white',
                    'border': 'none',
                    'border-radius': '5px',
                    'cursor': 'pointer',
                    'z-index': '1000'
                })
                .on('click', downloadDesign);

            $('body').append(downloadBtn);

            // Download function with support for color images
            async function downloadDesign() {
                // Create a canvas that matches the hat image size
                const hatImg = document.getElementById('current-view');

                // Wait for the hat image to load
                if (!hatImg.complete) {
                    await new Promise(resolve => {
                        hatImg.onload = resolve;
                        hatImg.onerror = resolve;
                    });
                }

                const canvas = document.createElement('canvas');
                canvas.width = hatImg.naturalWidth || hatImg.width;
                canvas.height = hatImg.naturalHeight || hatImg.height;
                const ctx = canvas.getContext('2d');

                // Draw the base hat image
                ctx.drawImage(hatImg, 0, 0, canvas.width, canvas.height);

                // Get the design boundary position and size
                const boundary = $('.design-boundary')[0];
                const boundaryRect = boundary.getBoundingClientRect();
                const hatRect = hatImg.getBoundingClientRect();

                // Calculate scale factors
                const scaleX = canvas.width / hatRect.width;
                const scaleY = canvas.height / hatRect.height;

                // Calculate boundary in canvas coordinates
                const boundaryX = (boundaryRect.left - hatRect.left) * scaleX;
                const boundaryY = (boundaryRect.top - hatRect.top) * scaleY;
                const boundaryWidth = boundaryRect.width * scaleX;
                const boundaryHeight = boundaryRect.height * scaleY;

                // Apply clipping to the boundary area
                ctx.save();
                ctx.beginPath();
                ctx.rect(boundaryX, boundaryY, boundaryWidth, boundaryHeight);
                ctx.clip();

                // Function to load an image
                async function loadImage(url) {
                    return new Promise((resolve) => {
                        const img = new Image();
                        img.crossOrigin = 'Anonymous';
                        img.onload = () => resolve(img);
                        img.onerror = () => resolve(null);
                        img.src = url;
                    });
                }

                // Draw each design element
                const elements = $('.design-content').children();

                for (let i = 0; i < elements.length; i++) {
                    const element = elements[i];
                    const $element = $(element);
                    const elementRect = element.getBoundingClientRect();

                    // Calculate position relative to hat image
                    const x = (elementRect.left - hatRect.left) * scaleX;
                    const y = (elementRect.top - hatRect.top) * scaleY;
                    const width = elementRect.width * scaleX;
                    const height = elementRect.height * scaleY;

                    // Get rotation angle from transform
                    const transform = $element.css('transform');
                    let angle = 0;
                    if (transform && transform !== 'none') {
                        const values = transform.split('(')[1].split(')')[0].split(',');
                        angle = Math.round(Math.atan2(values[1], values[0]) * (180 / Math.PI));
                    }

                    if ($element.hasClass('editable-image')) {
                        // Handle image elements
                        const img = element.querySelector('img');
                        if (img) {
                            ctx.save();
                            ctx.translate(x + width / 2, y + height / 2);
                            ctx.rotate(angle * Math.PI / 180);
                            ctx.drawImage(img, -width / 2, -height / 2, width, height);
                            ctx.restore();
                        }
                    } else if ($element.hasClass('text-design')) {
                        // Handle text elements
                        const text = element.textContent;
                        const styles = window.getComputedStyle(element);

                        // Extract text styles
                        const fontSize = parseFloat(styles.fontSize) * scaleY;
                        const fontFamily = styles.fontFamily;
                        const fontWeight = styles.fontWeight;
                        const fontStyle = styles.fontStyle;
                        const textDecoration = styles.textDecoration;

                        // Create the font string
                        let fontString = '';
                        if (fontStyle === 'italic') fontString += 'italic ';
                        if (fontWeight === 'bold' || parseInt(fontWeight) > 400) fontString += 'bold ';
                        fontString += `${fontSize}px ${fontFamily}`;
                        ctx.font = fontString;

                        // Handle text color - check for background image first
                        const bgImage = styles.backgroundImage;

                        if (bgImage && bgImage !== 'none') {
                            // Extract the image URL
                            const imageUrl = bgImage.replace('url("', '').replace('")', '');

                            // Load the color image
                            const colorImg = await loadImage(imageUrl);

                            if (colorImg) {
                                // Create pattern from the color image
                                const pattern = ctx.createPattern(colorImg, 'repeat');
                                ctx.fillStyle = pattern;
                            } else {
                                // Fallback to black if image fails to load
                                ctx.fillStyle = '#000000';
                            }
                        } else {
                            // Fallback to black if no background
                            ctx.fillStyle = '#000000';
                        }

                        // Draw text with rotation
                        ctx.save();
                        ctx.translate(x, y + fontSize); // Adjust for baseline
                        ctx.rotate(angle * Math.PI / 180);

                        // Handle text decoration
                        if (textDecoration.includes('underline')) {
                            const metrics = ctx.measureText(text);
                            ctx.strokeStyle = ctx.fillStyle;
                            ctx.lineWidth = fontSize * 0.1;
                            ctx.beginPath();
                            ctx.moveTo(0, fontSize * 0.1);
                            ctx.lineTo(metrics.width, fontSize * 0.1);
                            ctx.stroke();
                        }

                        ctx.fillText(text, 0, 0);
                        ctx.restore();
                    }
                }

                ctx.restore();
                // Convert canvas to image and trigger download
                const link = document.createElement('a');
                link.download = 'custom-cap-design.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            }
            // Create preview button
            // Create preview button
            const previewBtn = $('<button>')
                .addClass('preview-btn')
                .text('Preview Design')
                .css({
                    'position': 'fixed',
                    'bottom': '70px', // Positioned above the download button
                    'right': '20px',
                    'padding': '10px 20px',
                    'background': '#2ec4b6',
                    'color': 'white',
                    'border': 'none',
                    'border-radius': '5px',
                    'cursor': 'pointer',
                    'z-index': '1000'
                })
                .on('click', previewDesign);

            $('body').append(previewBtn);

            // Create preview modal (hidden by default)
            const previewModal = $('<div>')
                .addClass('preview-modal')
                .css({
                    'position': 'fixed',
                    'top': '0',
                    'left': '0',
                    'width': '100%',
                    'height': '100%',
                    'background': 'rgba(0,0,0,0.8)',
                    'display': 'none',
                    'z-index': '2000',
                    'justify-content': 'center',
                    'align-items': 'center'
                });

            const previewContent = $('<div>')
                .addClass('preview-content')
                .css({
                    'background': 'white',
                    'padding': '20px',
                    'border-radius': '10px',
                    'max-width': '90%',
                    'max-height': '90%',
                    'overflow': 'auto',
                    'text-align': 'center',
                    'position': 'relative' // Needed for absolute positioning of close button
                });

            // Add close button (X) in top-right corner
            const modalCloseBtn = $('<button>')
                .html('&times;')
                .attr('title', 'Close')
                .css({
                    'position': 'absolute',
                    'top': '10px',
                    'right': '10px',
                    'background': 'transparent',
                    'border': 'none',
                    'font-size': '24px',
                    'cursor': 'pointer',
                    'color': '#888',
                    'width': '30px',
                    'height': '30px',
                    'padding': '0',
                    'line-height': '30px'
                })
                .on('click', function() {
                    previewModal.hide();
                });

            const previewImage = $('<img>')
                .addClass('preview-image')
                .css({
                    'max-width': '100%',
                    'max-height': '80vh'
                });

            const closeBtn = $('<button>')
                .text('Close')
                .css({
                    'margin-top': '15px',
                    'padding': '8px 20px',
                    'background': '#ff5a5f',
                    'color': 'white',
                    'border': 'none',
                    'border-radius': '5px',
                    'cursor': 'pointer'
                })
                .on('click', function() {
                    previewModal.hide();
                });

            const downloadFromPreviewBtn = $('<button>')
                .text('Download This Design')
                .css({
                    'margin-top': '15px',
                    'margin-left': '10px',
                    'padding': '8px 20px',
                    'background': '#3a86ff',
                    'color': 'white',
                    'border': 'none',
                    'border-radius': '5px',
                    'cursor': 'pointer'
                })
                .on('click', function() {
                    downloadDesign();
                    previewModal.hide();
                });

            previewContent.append(
                modalCloseBtn, // Add the X close button
                previewImage,
                $('<div>').append(closeBtn, downloadFromPreviewBtn)
            );
            previewModal.append(previewContent);
            $('body').append(previewModal);

            // Preview function (very similar to download function)
            async function previewDesign() {
                // Show loading state
                previewModal.show();
                previewImage.attr('src', '').css('display', 'none');
                previewContent.append($('<div>').text('Generating preview...').css('color', 'black'));

                try {
                    // Create a canvas that matches the hat image size
                    const hatImg = document.getElementById('current-view');

                    // Wait for the hat image to load
                    if (!hatImg.complete) {
                        await new Promise(resolve => {
                            hatImg.onload = resolve;
                            hatImg.onerror = resolve;
                        });
                    }

                    const canvas = document.createElement('canvas');
                    canvas.width = hatImg.naturalWidth || hatImg.width;
                    canvas.height = hatImg.naturalHeight || hatImg.height;
                    const ctx = canvas.getContext('2d');

                    // Draw the base hat image
                    ctx.drawImage(hatImg, 0, 0, canvas.width, canvas.height);



                    // Get the design boundary position and size
                    const boundary = $('.design-boundary')[0];
                    const boundaryRect = boundary.getBoundingClientRect();
                    const hatRect = hatImg.getBoundingClientRect();

                    // Calculate scale factors
                    const scaleX = canvas.width / hatRect.width;
                    const scaleY = canvas.height / hatRect.height;

                    // Calculate boundary in canvas coordinates
                    const boundaryX = (boundaryRect.left - hatRect.left) * scaleX;
                    const boundaryY = (boundaryRect.top - hatRect.top) * scaleY;
                    const boundaryWidth = boundaryRect.width * scaleX;
                    const boundaryHeight = boundaryRect.height * scaleY;

                    // Apply clipping to the boundary area
                    ctx.save();
                    ctx.beginPath();
                    ctx.rect(boundaryX, boundaryY, boundaryWidth, boundaryHeight);
                    ctx.clip();
                    // Function to load an image
                    async function loadImage(url) {
                        return new Promise((resolve) => {
                            const img = new Image();
                            img.crossOrigin = 'Anonymous';
                            img.onload = () => resolve(img);
                            img.onerror = () => resolve(null);
                            img.src = url;
                        });
                    }

                    // Draw each design element
                    const elements = $('.design-content').children();

                    for (let i = 0; i < elements.length; i++) {
                        const element = elements[i];
                        const $element = $(element);
                        const elementRect = element.getBoundingClientRect();

                        // Calculate position relative to hat image
                        const x = (elementRect.left - hatRect.left) * scaleX;
                        const y = (elementRect.top - hatRect.top) * scaleY;
                        const width = elementRect.width * scaleX;
                        const height = elementRect.height * scaleY;

                        // Get rotation angle from transform
                        const transform = $element.css('transform');
                        let angle = 0;
                        if (transform && transform !== 'none') {
                            const values = transform.split('(')[1].split(')')[0].split(',');
                            angle = Math.round(Math.atan2(values[1], values[0]) * (180 / Math.PI));
                        }

                        if ($element.hasClass('editable-image')) {
                            // Handle image elements
                            const img = element.querySelector('img');
                            if (img) {
                                ctx.save();
                                ctx.translate(x + width / 2, y + height / 2);
                                ctx.rotate(angle * Math.PI / 180);
                                ctx.drawImage(img, -width / 2, -height / 2, width, height);
                                ctx.restore();
                            }
                        } else if ($element.hasClass('text-design')) {
                            // Handle text elements
                            const text = element.textContent;
                            const styles = window.getComputedStyle(element);

                            // Extract text styles
                            const fontSize = parseFloat(styles.fontSize) * scaleY;
                            const fontFamily = styles.fontFamily;
                            const fontWeight = styles.fontWeight;
                            const fontStyle = styles.fontStyle;
                            const textDecoration = styles.textDecoration;

                            // Create the font string
                            let fontString = '';
                            if (fontStyle === 'italic') fontString += 'italic ';
                            if (fontWeight === 'bold' || parseInt(fontWeight) > 400) fontString += 'bold ';
                            fontString += `${fontSize}px ${fontFamily}`;
                            ctx.font = fontString;

                            // Handle text color - check for background image first
                            const bgImage = styles.backgroundImage;

                            if (bgImage && bgImage !== 'none') {
                                // Extract the image URL
                                const imageUrl = bgImage.replace('url("', '').replace('")', '');

                                // Load the color image
                                const colorImg = await loadImage(imageUrl);

                                if (colorImg) {
                                    // Create pattern from the color image
                                    const pattern = ctx.createPattern(colorImg, 'repeat');
                                    ctx.fillStyle = pattern;
                                } else {
                                    // Fallback to black if image fails to load
                                    ctx.fillStyle = '#000000';
                                }
                            } else {
                                // Fallback to black if no background
                                ctx.fillStyle = '#000000';
                            }

                            // Draw text with rotation
                            ctx.save();
                            ctx.translate(x, y + fontSize); // Adjust for baseline
                            ctx.rotate(angle * Math.PI / 180);

                            // Handle text decoration
                            if (textDecoration.includes('underline')) {
                                const metrics = ctx.measureText(text);
                                ctx.strokeStyle = ctx.fillStyle;
                                ctx.lineWidth = fontSize * 0.1;
                                ctx.beginPath();
                                ctx.moveTo(0, fontSize * 0.1);
                                ctx.lineTo(metrics.width, fontSize * 0.1);
                                ctx.stroke();
                            }

                            ctx.fillText(text, 0, 0);
                            ctx.restore();
                        }
                    }


                    ctx.restore();
                    // Show the preview image
                    previewContent.find('div').remove(); // Remove loading message
                    previewImage.attr('src', canvas.toDataURL('image/png')).css('display', 'block');

                } catch (error) {
                    console.error('Error generating preview:', error);
                    previewContent.find('div').text('Error generating preview. Please try again.');
                }
            }

            // Add to Cart button click handler
            $('.add-to-cart-btn').on('click', async function(e) {
                e.preventDefault();
                $('#loader').show();
                const originalView = designState.currentView;
                const previews = {};

                // Collect views that have designs
                const viewsToCapture = Object.keys(priceState.views).filter(view => priceState.views[
                    view].hasDesign);

                for (const view of viewsToCapture) {
                    // Switch to the view
                    $(`.view-option[data-view="${view}"]`).trigger('click');

                    // Wait for the current-view image to load
                    await new Promise(resolve => {
                        const img = $('#current-view')[0];
                        if (img.complete) resolve();
                        else {
                            img.onload = resolve;
                            img.onerror = resolve;
                        }
                    });

                    // Generate preview image
                    const dataUrl = await generatePreview();
                    previews[view] = dataUrl;
                }

                // Switch back to original view
                $(`.view-option[data-view="${originalView}"]`).trigger('click');
                console.log('Views', previews);
                // Send data to server
                $.ajax({
                    url: '{{ route('customizer.update', $userCustomization->id) }}', // Replace with your route
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: {{ $product->id ?? 0 }},
                        total_price: $('#total-price').text(),
                        previews: previews
                    },
                    success: function(response) {
                        if (response.redirect_url) {
                            // Redirect to the customizer index page
                            window.location.href = response.redirect_url;
                            $('#loader').hide();
                        } else {
                            alert("Failed to add item to cart.");
                        }
                    },
                    error: function(xhr) {
                        $('#loader').hide();
                        alert('Error adding item to cart. Please try again.');
                    }
                });
            });
            // Helper function to generate preview image for current view
            async function generatePreview() {
                const hatImg = document.getElementById('current-view');
                await new Promise(resolve => {
                    if (hatImg.complete) resolve();
                    else {
                        hatImg.onload = resolve;
                        hatImg.onerror = resolve;
                    }
                });

                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                canvas.width = hatImg.naturalWidth || hatImg.width;
                canvas.height = hatImg.naturalHeight || hatImg.height;
                ctx.drawImage(hatImg, 0, 0);

                const boundary = $('.design-boundary')[0];
                const boundaryRect = boundary.getBoundingClientRect();
                const hatRect = hatImg.getBoundingClientRect();

                const scaleX = canvas.width / hatRect.width;
                const scaleY = canvas.height / hatRect.height;

                // Calculate boundary in canvas coordinates
                const boundaryX = (boundaryRect.left - hatRect.left) * scaleX;
                const boundaryY = (boundaryRect.top - hatRect.top) * scaleY;
                const boundaryWidth = boundaryRect.width * scaleX;
                const boundaryHeight = boundaryRect.height * scaleY;

                // Apply clipping to the boundary area
                ctx.save();
                ctx.beginPath();
                ctx.rect(boundaryX, boundaryY, boundaryWidth, boundaryHeight);
                ctx.clip();

                async function loadImage(url) {
                    return new Promise((resolve) => {
                        const img = new Image();
                        img.crossOrigin = 'Anonymous';
                        img.onload = () => resolve(img);
                        img.onerror = () => resolve(null);
                        img.src = url;
                    });
                }

                const elements = $('.design-content').children();

                for (let i = 0; i < elements.length; i++) {
                    const element = elements[i];
                    const $element = $(element);
                    const elementRect = element.getBoundingClientRect();

                    const x = (elementRect.left - hatRect.left) * scaleX;
                    const y = (elementRect.top - hatRect.top) * scaleY;
                    const width = elementRect.width * scaleX;
                    const height = elementRect.height * scaleY;

                    const transform = $element.css('transform');
                    let angle = 0;
                    if (transform && transform !== 'none') {
                        const values = transform.split('(')[1].split(')')[0].split(',');
                        angle = Math.round(Math.atan2(values[1], values[0]) * (180 / Math.PI));
                    }

                    if ($element.hasClass('editable-image')) {
                        const imgElement = element.querySelector('img');
                        if (imgElement) {
                            const img = await loadImage(imgElement.src);
                            if (img) {
                                ctx.save();
                                ctx.translate(x + width / 2, y + height / 2);
                                ctx.rotate(angle * Math.PI / 180);
                                ctx.drawImage(img, -width / 2, -height / 2, width, height);
                                ctx.restore();
                            }
                        }
                    } else if ($element.hasClass('text-design')) {
                        const text = element.textContent;
                        const styles = window.getComputedStyle(element);

                        const fontSize = parseFloat(styles.fontSize) * scaleY;
                        const fontFamily = styles.fontFamily;
                        const fontWeight = styles.fontWeight;
                        const fontStyle = styles.fontStyle;
                        const textDecoration = styles.textDecoration;

                        let fontString = '';
                        if (fontStyle === 'italic') fontString += 'italic ';
                        if (fontWeight === 'bold' || parseInt(fontWeight) > 400) fontString += 'bold ';
                        fontString += `${fontSize}px ${fontFamily}`;
                        ctx.font = fontString;

                        const bgImage = styles.backgroundImage;
                        if (bgImage && bgImage !== 'none') {
                            const imageUrl = bgImage.replace('url("', '').replace('")', '');
                            const colorImg = await loadImage(imageUrl);
                            ctx.fillStyle = colorImg ? ctx.createPattern(colorImg, 'repeat') : '#000000';
                        } else {
                            ctx.fillStyle = '#000000';
                        }

                        ctx.save();
                        ctx.translate(x, y + fontSize);
                        ctx.rotate(angle * Math.PI / 180);

                        if (textDecoration.includes('underline')) {
                            const metrics = ctx.measureText(text);
                            ctx.strokeStyle = ctx.fillStyle;
                            ctx.lineWidth = fontSize * 0.1;
                            ctx.beginPath();
                            ctx.moveTo(0, fontSize * 0.1);
                            ctx.lineTo(metrics.width, fontSize * 0.1);
                            ctx.stroke();
                        }

                        ctx.fillText(text, 0, 0);
                        ctx.restore();
                    }
                }

                ctx.restore(); // Remove clipping after drawing elements
                return canvas.toDataURL('image/png');
            }
            // DOM elements
            const designArea = $('#hat-view');
            const currentView = $('#current-view');
            const designContent = $('<div>').addClass('design-content').appendTo(designArea);
            const boundary = $('<div>').addClass('design-boundary').appendTo(designArea);

            // Boundary configurations
            const boundaryConfigs = {
                'front': {
                    top: '30%',
                    left: '50%',
                    width: '60%',
                    height: '30%'
                },
                'back': {
                    top: '30%',
                    left: '50%',
                    width: '60%',
                    height: '30%'
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

            // Panel switching functionality
            $('.sidebar button').on('click', function() {
                const panelId = $(this).data('panel');
                $('.sidebar button').removeClass('active');
                $(this).addClass('active');
                $('.option-panel').removeClass('active');
                $('#' + panelId).addClass('active');
            });

            // Color selection
            $('.color-option').on('click', function() {
                const parent = $(this).closest('.color-options');
                if (parent.length) parent.find('.color-option').removeClass('active');
                $(this).addClass('active');

                if ($(this).closest('.sidebar .tool-section').length) {
                    const colorName = $(this).attr('title') || $(this).text();
                    $('.option-bar span strong').text(colorName);
                }

                if (currentTextElement) {
                    currentTextElement.css('backgroundImage', $(this).css('backgroundImage'));
                    saveState();
                }
            });

            // Text style selection
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

            // View switching functionality - modified
            $('.view-option').on('click', function() {
                const view = $(this).data('view');

                // Only proceed if switching to a different view
                if (view === designState.currentView) return;
                // Save current state before switching
                saveCurrentViewState();

                // Update current view
                designState.currentView = view;

                // Update UI
                $('.view-option img, .view-option p').removeClass('active');
                $(this).find('img, p').addClass('active');
                $('#current-view').attr('src', designState.views[view].background);

                // Update design area boundaries
                updateDesignArea(view);

                // Load the new view's state
                loadViewState(view);

                // Disable text editing if no text in this view
                const hasText = designState.views[view].elements.some(el => el.type === 'text');
                if (!hasText) {
                    currentTextElement = null;
                    $('#text-panel input[type="text"]').val('');
                }

                // Update price display (no need to recalculate, just show the view price)
                // This is optional - you can remove if you prefer to only show the total
                $('.view-option p').removeClass('price-active');
                $(this).find('p').addClass('price-active');
            });

            // Save current view state
            function saveCurrentViewState() {
                const view = designState.currentView;
                designState.views[view].elements = [];

                // Capture both image and text elements
                $('.editable-image, .text-design').each(function() {
                    const $el = $(this);
                    const elementData = {
                        type: $el.hasClass('text-design') ? 'text' : 'image',
                        content: $el.hasClass('text-design') ? $el.text() : $el.find('img').attr('src'),
                        position: {
                            left: parseFloat($el.css('left')) || 0,
                            top: parseFloat($el.css('top')) || 0
                        },
                        size: {
                            width: parseFloat($el.css('width')) || $el.width(),
                            height: parseFloat($el.css('height')) || $el.height()
                        },
                        rotation: parseFloat($el.css('transform').replace(/[^0-9\-.,]/g, '')) || 0,
                        styles: {}
                    };

                    if (elementData.type === 'text') {
                        elementData.styles = {
                            fontFamily: $el.css('fontFamily'),
                            fontSize: $el.css('fontSize'),
                            color: $el.css('backgroundImage'),
                            fontWeight: $el.css('fontWeight'),
                            fontStyle: $el.css('fontStyle'),
                            textDecoration: $el.css('textDecoration')
                        };
                    }

                    designState.views[view].elements.push(elementData);
                });
            }


            function loadViewState(view) {
                console.log('Loading view:', view);
                console.log('Elements to load:', designState.views[view].elements);

                // Clear current content
                designContent.empty();
                currentTextElement = null;
                selectedElement = null;

                // Recreate all elements for the view
                designState.views[view].elements.forEach(element => {
                    console.log('Creating element:', element);
                    if (element.type === 'text') {
                        const textElement = createTextElement(element);
                        // Set this as current text if it's for this view
                        currentTextElement = textElement;
                        $('#text-panel input[type="text"]').val(element.content);
                    } else {
                        createImageElement(element);
                    }
                });
            }

            // Create text element
            function createTextElement(elementData) {
                const textDiv = $('<div>').addClass('text-design')
                    .text(elementData.content)
                    .prop('contentEditable', true)
                    .css({
                        position: 'absolute',
                        left: `${elementData.position.left}px`,
                        top: `${elementData.position.top}px`,
                        // width: `${elementData.size.width}px`,
                        // height: `${elementData.size.height}px`,
                        transform: `rotate(${elementData.rotation}deg)`,
                        backgroundImage: elementData.styles.color,
                        backgroundClip: 'text',
                        color: 'transparent',
                        fontFamily: elementData.styles.fontFamily,
                        fontSize: elementData.styles.fontSize,
                        fontWeight: elementData.styles.fontWeight,
                        fontStyle: elementData.styles.fontStyle,
                        textDecoration: elementData.styles.textDecoration
                    });

                designContent.append(textDiv);
                setupTextEditing(textDiv[0]);
                return textDiv;
            }

            // Create image element
            function createImageElement(elementData) {
                const imgDiv = $('<div>').addClass('editable-image')
                    .css({
                        position: 'absolute',
                        left: `${elementData.position.left}px`,
                        top: `${elementData.position.top}px`,
                        width: `${elementData.size.width}px`,
                        height: `${elementData.size.height}px`,
                        transform: `rotate(${elementData.rotation}deg)`
                    });

                const imgContent = $('<img>').attr('src', elementData.content)
                    .css({
                        width: '100%',
                        height: '100%',
                        objectFit: 'contain'
                    });

                const resizeHandles = createResizeHandles();
                resizeHandles.forEach(handle => imgDiv.append(handle));
                imgDiv.append(createDeleteButton());
                imgDiv.append(createRotateHandle());
                imgDiv.append(imgContent);

                designContent.append(imgDiv);
                setupImageEditing(imgDiv[0]);
                return imgDiv;
            }

            // Update design area based on view
            function updateDesignArea(view) {
                const config = boundaryConfigs[view] || boundaryConfigs.front;
                boundary.css({
                    top: config.top,
                    left: config.left,
                    width: config.width,
                    height: config.height,
                    transform: 'translateX(-50%)'
                });

                designContent.css({
                    top: config.top,
                    left: config.left,
                    width: config.width,
                    height: config.height,
                    transform: 'translateX(-50%)'
                });

                designContent.empty();
                selectedElement = null;
            }

            // Image upload handling
            // $('.upload-area button').on('click', function() {
            //     const input = $('<input>').attr({
            //         type: 'file',
            //         accept: 'image/*'
            //     }).on('change', function(e) {
            //         const file = e.target.files[0];
            //         const reader = new FileReader();
            //         reader.onload = function(event) {
            //             const img = $('<div>').addClass('editable-image');
            //             const imgContent = $('<img>').attr({
            //                 src: event.target.result,
            //                 draggable: false
            //             });

            //             createResizeHandles().forEach(handle => img.append(handle));
            //             img.append(createDeleteButton());
            //             img.append(createRotateHandle());
            //             img.append(imgContent);
            //             designContent.append(img);

            //             img.css({
            //                 left: '50%',
            //                 top: '50%'
            //             });
            //             setupImageEditing(img[0]);
            //             selectElement(img[0]);
            //             saveState();
            //         };
            //         reader.readAsDataURL(file);
            //     });
            //     input.click();
            // });

            $('.upload-area button').on('click', function() {
                const input = $('<input>').attr({
                    type: 'file',
                    accept: 'image/*'
                }).on('change', function(e) {
                    $('#loader').show();
                    const file = e.target.files[0];
                    const formData = new FormData();
                    formData.append('image', file);
                    formData.append('user_customization_id', '{{ $userCustomization->id }}');
                    formData.append('_token', '{{ csrf_token() }}');

                    $.ajax({
                        url: '{{ route('customizer.upload-image') }}',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $('#loader').hide();
                            // Create image element using the server's image URL
                            const imgDiv = $('<div>').addClass('editable-image')
                                .attr('data-image-id', response.image_id).css({
                                    position: 'absolute',
                                    left: '50%',
                                    top: '50%',
                                    // transform: 'translate(-50%, -50%)'
                                });

                            const imgContent = $('<img>').attr('src', response
                                .image_url).css({
                                width: '100%',
                                height: '100%',
                                objectFit: 'contain'
                            });

                            // Add resize handles and controls
                            createResizeHandles().forEach(handle => imgDiv.append(
                                handle));
                            imgDiv.append(createDeleteButton());
                            imgDiv.append(createRotateHandle());
                            imgDiv.append(imgContent);

                            designContent.append(imgDiv);
                            setupImageEditing(imgDiv[0]);
                            selectElement(imgDiv[0]);
                            saveState();
                        },
                        error: function(xhr) {
                            $('#loader').hide();
                            alert('Error uploading image. Please try again.');
                        }
                    });
                });
                input.click();
            });

            // Design thumbnail selection
            // Fix for design thumbnail boundary constraints
            $('#designs-container').on('click', '.design-thumbnail', function() {
                const bgImage = $(this).css('background-image');
                const imageUrl = bgImage.match(/url\(["']?(.*?)["']?\)/)[1];

                // Create image element with proper boundary-relative positioning
                const imgDiv = $('<div>').addClass('editable-image').css({
                    position: 'absolute',
                    width: '100px', // Initial size
                    height: '100px',
                    left: '50%', // Center within boundary
                    top: '50%',
                    // transform: 'translate(-50%, -50%)'
                });

                // Create image content
                const imgContent = $('<img>').attr('src', imageUrl).css({
                    width: '100%',
                    height: '100%',
                    objectFit: 'contain'
                });

                // Add controls and append to content area
                createResizeHandles().forEach(handle => imgDiv.append(handle));
                imgDiv.append(createDeleteButton());
                imgDiv.append(createRotateHandle());
                imgDiv.append(imgContent);

                // Add to design content area with boundary constraints
                designContent.append(imgDiv);

                // Immediately calculate correct boundaries
                const contentRect = designContent[0].getBoundingClientRect();
                const initialX = contentRect.width / 2;
                const initialY = contentRect.height / 2;

                // Set pixel-based positioning
                imgDiv.css({
                    left: initialX + 'px',
                    top: initialY + 'px'
                });

                setupImageEditing(imgDiv[0]);
                selectElement(imgDiv[0]);
                saveState();
            });

            // Add these CSS fixes
            $('<style>').text(`
              .design-content {
                  overflow: hidden !important;
                  transform: translateX(-50%);
              }
              .editable-image {
                  transform-origin: center center;
              }
            `).appendTo('head');

            // Helper functions for element creation
            function createResizeHandles() {
                return ['nw', 'ne', 'sw', 'se'].map(pos =>
                    $('<div>').addClass(`resize-handle resize-${pos}`)
                );
            }

            function createDeleteButton() {
                return $('<div>').addClass('delete-btn').html('&times;');
            }

            function createRotateHandle() {
                return $('<div>').addClass('rotate-handle').html('↻');
            }

            // Element editing setup
            // function setupImageEditing(element) {
            //     const $element = $(element);
            //     const imgContent = $element.find('img')[0];
            //     let startX, startY, startWidth, startHeight, startAngle;
            //     let isDragging = false,
            //         isResizing = false,
            //         isRotating = false;
            //     let resizeDirection = '';

            //     $element.on('mousedown', function(e) {
            //         if (e.target === element || e.target === imgContent) {
            //             isDragging = true;
            //             startX = e.clientX - element.getBoundingClientRect().left;
            //             startY = e.clientY - element.getBoundingClientRect().top;
            //             selectElement(element);
            //             e.preventDefault();
            //         }
            //     });

            //     $element.find('.resize-handle').on('mousedown', function(e) {
            //         isResizing = true;
            //         resizeDirection = $(this).attr('class').split(' ')[1].split('-')[1];
            //         const style = $element[0].style;
            //         startWidth = parseFloat(style.width) || imgContent.offsetWidth;
            //         startHeight = parseFloat(style.height) || imgContent.offsetHeight;
            //         startLeft = parseFloat(style.left) || 0;
            //         startTop = parseFloat(style.top) || 0;
            //         startX = e.clientX;
            //         startY = e.clientY;
            //         selectElement(element);
            //         e.stopPropagation();
            //         e.preventDefault();
            //     });

            //     $element.find('.rotate-handle').on('mousedown', function(e) {
            //         isRotating = true;
            //         const rect = element.getBoundingClientRect();
            //         const centerX = rect.left + rect.width / 2;
            //         const centerY = rect.top + rect.height / 2;
            //         startAngle = Math.atan2(e.clientY - centerY, e.clientX - centerX) * 180 / Math.PI;
            //         const currentAngle = parseFloat($element.css('transform')?.replace(/[^0-9\-.,]/g, '') ||
            //             0);
            //         startAngle -= currentAngle;
            //         selectElement(element);
            //         e.stopPropagation();
            //         e.preventDefault();
            //     });

            //     // Modify the delete button click handler
            //     $element.find('.delete-btn').on('click', function(e) {
            //         const imageId = $element.data('image-id');

            //         if (imageId) {
            //             if (confirm('Are you sure you want to delete this image permanently?')) {
            //                 $('#loader').show();
            //                 $.ajax({
            //                     url: "{{ route('customizer.delete-image', '') }}/" + imageId,
            //                     method: 'GET',
            //                     headers: {
            //                         'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //                     },
            //                     success: () => {
            //                         $('#loader').hide();
            //                         $element.remove();
            //                         saveState();
            //                     },
            //                     error: () => {
            //                         $('#loader').hide();
            //                         alert('Failed to delete image from server');
            //                     }
            //                 });
            //             }
            //         } else {
            //             $element.remove();
            //             saveState();
            //         }

            //         e.stopPropagation();
            //     });

            //     $(document).on('mousemove', function(e) {
            //         if (!selectedElement || selectedElement !== element) return;

            //         const boundaryRect = designContent[0].getBoundingClientRect();
            //         const elemRect = element.getBoundingClientRect();

            //         if (isDragging) {
            //             let newLeft = e.clientX - boundaryRect.left - startX;
            //             let newTop = e.clientY - boundaryRect.top - startY;
            //             newLeft = Math.max(0, Math.min(newLeft, boundaryRect.width - elemRect.width));
            //             newTop = Math.max(0, Math.min(newTop, boundaryRect.height - elemRect.height));
            //             $element.css({
            //                 left: `${newLeft}px`,
            //                 top: `${newTop}px`
            //             });
            //         } else if (isResizing) {
            //             const deltaX = e.clientX - startX;
            //             const deltaY = e.clientY - startY;
            //             let newWidth = startWidth;
            //             let newHeight = startHeight;

            //             // Calculate new dimensions based on resize direction
            //             if (resizeDirection.includes('e')) newWidth += deltaX;
            //             if (resizeDirection.includes('w')) newWidth -= deltaX;
            //             if (resizeDirection.includes('s')) newHeight += deltaY;
            //             if (resizeDirection.includes('n')) newHeight -= deltaY;

            //             // Maintain aspect ratio if shift key is pressed
            //             if (e.shiftKey) {
            //                 const aspect = startWidth / startHeight;
            //                 if (Math.abs(deltaX) > Math.abs(deltaY)) {
            //                     newHeight = newWidth / aspect;
            //                 } else {
            //                     newWidth = newHeight * aspect;
            //                 }
            //             }

            //             // Apply minimum size constraints
            //             newWidth = Math.max(newWidth, 30);
            //             newHeight = Math.max(newHeight, 30);

            //             // Calculate new position based on initial values and size changes
            //             let newLeft = startLeft;
            //             let newTop = startTop;

            //             if (resizeDirection.includes('w')) {
            //                 newLeft = startLeft + (startWidth - newWidth);
            //             }
            //             if (resizeDirection.includes('n')) {
            //                 newTop = startTop + (startHeight - newHeight);
            //             }

            //             // Boundary constraints
            //             const boundaryRect = designContent[0].getBoundingClientRect();
            //             newLeft = Math.max(0, Math.min(newLeft, boundaryRect.width - newWidth));
            //             newTop = Math.max(0, Math.min(newTop, boundaryRect.height - newHeight));

            //             // Apply new dimensions and position
            //             $element.css({
            //                 width: `${newWidth}px`,
            //                 height: `${newHeight}px`,
            //                 left: `${newLeft}px`,
            //                 top: `${newTop}px`
            //             });

            //             $(imgContent).css({
            //                 width: '100%',
            //                 height: '100%'
            //             });
            //         } else if (isRotating) {
            //             const rect = element.getBoundingClientRect();
            //             const centerX = rect.left + rect.width / 2;
            //             const centerY = rect.top + rect.height / 2;
            //             const angle = Math.atan2(e.clientY - centerY, e.clientX - centerX) * 180 / Math.PI;
            //             $element.css('transform', `rotate(${angle - startAngle}deg)`);
            //         }
            //     });

            //     $(document).on('mouseup', function() {
            //         if (isDragging || isResizing || isRotating) saveState();
            //         isDragging = isResizing = isRotating = false;
            //     });
            // }
            // In the setupImageEditing function, update the event listeners:
            function setupImageEditing(element) {
                const $element = $(element);
                const imgContent = $element.find('img')[0];
                let startX, startY, startWidth, startHeight, startAngle;
                let isDragging = false,
                    isResizing = false,
                    isRotating = false;
                let resizeDirection = '';

                // Helper function to get coordinates from either mouse or touch event
                function getCoordinates(e) {
                    if (e.type.startsWith('touch')) {
                        return {
                            clientX: e.touches[0].clientX,
                            clientY: e.touches[0].clientY
                        };
                    }
                    return {
                        clientX: e.clientX,
                        clientY: e.clientY
                    };
                }

                // Mouse and touch start handlers
                function handleStart(e) {
                    const coords = getCoordinates(e);
                    if (e.target === element || e.target === imgContent) {
                        isDragging = true;
                        const rect = element.getBoundingClientRect();
                        startX = coords.clientX - rect.left;
                        startY = coords.clientY - rect.top;
                        selectElement(element);
                        e.preventDefault();
                    }
                }

                $element.on('mousedown touchstart', handleStart);

                // Resize handles
                $element.find('.resize-handle').on('mousedown touchstart', function(e) {
                    const coords = getCoordinates(e);
                    isResizing = true;
                    resizeDirection = $(this).attr('class').split(' ')[1].split('-')[1];
                    const style = $element[0].style;
                    startWidth = parseFloat(style.width) || imgContent.offsetWidth;
                    startHeight = parseFloat(style.height) || imgContent.offsetHeight;
                    startLeft = parseFloat(style.left) || 0;
                    startTop = parseFloat(style.top) || 0;
                    startX = coords.clientX;
                    startY = coords.clientY;
                    selectElement(element);
                    e.stopPropagation();
                    e.preventDefault();
                });

                // Rotate handle
                $element.find('.rotate-handle').on('mousedown touchstart', function(e) {
                    const coords = getCoordinates(e);
                    isRotating = true;
                    const rect = element.getBoundingClientRect();
                    const centerX = rect.left + rect.width / 2;
                    const centerY = rect.top + rect.height / 2;
                    startAngle = Math.atan2(coords.clientY - centerY, coords.clientX - centerX) * 180 / Math
                        .PI;
                    const currentAngle = parseFloat($element.css('transform')?.replace(/[^0-9\-.,]/g, '') ||
                        0);
                    startAngle -= currentAngle;
                    selectElement(element);
                    e.stopPropagation();
                    e.preventDefault();
                });

                // Move handlers
                function handleMove(e) {
                    if (!selectedElement || selectedElement !== element) return;
                    const coords = getCoordinates(e);

                    const boundaryRect = designContent[0].getBoundingClientRect();
                    const elemRect = element.getBoundingClientRect();

                    if (isDragging) {
                        let newLeft = coords.clientX - boundaryRect.left - startX;
                        let newTop = coords.clientY - boundaryRect.top - startY;
                        newLeft = Math.max(0, Math.min(newLeft, boundaryRect.width - elemRect.width));
                        newTop = Math.max(0, Math.min(newTop, boundaryRect.height - elemRect.height));
                        $element.css({
                            left: `${newLeft}px`,
                            top: `${newTop}px`
                        });
                    } else if (isResizing) {
                        const deltaX = coords.clientX - startX;
                        const deltaY = coords.clientY - startY;
                        let newWidth = startWidth;
                        let newHeight = startHeight;

                        if (resizeDirection.includes('e')) newWidth += deltaX;
                        if (resizeDirection.includes('w')) newWidth -= deltaX;
                        if (resizeDirection.includes('s')) newHeight += deltaY;
                        if (resizeDirection.includes('n')) newHeight -= deltaY;

                        if (e.shiftKey) {
                            const aspect = startWidth / startHeight;
                            if (Math.abs(deltaX) > Math.abs(deltaY)) {
                                newHeight = newWidth / aspect;
                            } else {
                                newWidth = newHeight * aspect;
                            }
                        }

                        newWidth = Math.max(newWidth, 30);
                        newHeight = Math.max(newHeight, 30);

                        let newLeft = startLeft;
                        let newTop = startTop;

                        if (resizeDirection.includes('w')) {
                            newLeft = startLeft + (startWidth - newWidth);
                        }
                        if (resizeDirection.includes('n')) {
                            newTop = startTop + (startHeight - newHeight);
                        }

                        const boundaryRect = designContent[0].getBoundingClientRect();
                        newLeft = Math.max(0, Math.min(newLeft, boundaryRect.width - newWidth));
                        newTop = Math.max(0, Math.min(newTop, boundaryRect.height - newHeight));

                        $element.css({
                            width: `${newWidth}px`,
                            height: `${newHeight}px`,
                            left: `${newLeft}px`,
                            top: `${newTop}px`
                        });

                        $(imgContent).css({
                            width: '100%',
                            height: '100%'
                        });
                    } else if (isRotating) {
                        const rect = element.getBoundingClientRect();
                        const centerX = rect.left + rect.width / 2;
                        const centerY = rect.top + rect.height / 2;
                        const angle = Math.atan2(coords.clientY - centerY, coords.clientX - centerX) * 180 / Math
                            .PI;
                        $element.css('transform', `rotate(${angle - startAngle}deg)`);
                    }
                }

                $(document).on('mousemove touchmove', function(e) {
                    handleMove(e);
                });

                // Modify the delete button click handler
                $element.find('.delete-btn').on('click', function(e) {
                    const imageId = $element.data('image-id');

                    if (imageId) {
                        if (confirm('Are you sure you want to delete this image permanently?')) {
                            $('#loader').show();
                            $.ajax({
                                url: "{{ route('customizer.delete-image', '') }}/" + imageId,
                                method: 'GET',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                success: () => {
                                    $('#loader').hide();
                                    $element.remove();
                                    saveState();
                                },
                                error: () => {
                                    $('#loader').hide();
                                    alert('Failed to delete image from server');
                                }
                            });
                        }
                    } else {
                        $element.remove();
                        saveState();
                    }

                    e.stopPropagation();
                });

                // End handlers
                function handleEnd() {
                    if (isDragging || isResizing || isRotating) saveState();
                    isDragging = isResizing = isRotating = false;
                }

                $(document).on('mouseup touchend', handleEnd);
            }

            // Update CSS to prevent unwanted touch behaviors
            $('<style>').text(`
                .resize-handle, .rotate-handle, .delete-btn {
                    touch-action: none;
                }
                .editable-image, .text-design {
                    touch-action: none;
                }
                .editable-image, .text-design {
                    touch-action: none;
                }
            `).appendTo('head');

            // Text editing setup
            // function setupTextEditing(element) {
            //     const $element = $(element);
            //     let isDragging = false;
            //     let offset = {
            //         x: 0,
            //         y: 0
            //     };

            //     $element.on('mousedown', function(e) {
            //         // Only allow editing if this is the current view's text
            //         const textView = designState.views[designState.currentView].elements.find(el =>
            //             el.type === 'text' && el.content === $(this).text()
            //         );

            //         if (textView) {
            //             isDragging = true;
            //             offset = {
            //                 x: e.clientX - element.getBoundingClientRect().left,
            //                 y: e.clientY - element.getBoundingClientRect().top
            //             };
            //             $element.css('cursor', 'grabbing');
            //             selectElement(element);
            //             currentTextElement = $element;
            //             $('#text-panel input[type="text"]').val($element.text());
            //             e.preventDefault();
            //         }
            //     });

            //     $(document).on('mousemove', function(e) {
            //         if (!isDragging) return;
            //         const boundaryRect = designContent[0].getBoundingClientRect();
            //         const newLeft = e.clientX - boundaryRect.left - offset.x;
            //         const newTop = e.clientY - boundaryRect.top - offset.y;
            //         const maxX = boundaryRect.width - element.offsetWidth;
            //         const maxY = boundaryRect.height - element.offsetHeight;
            //         $element.css({
            //             left: `${Math.min(Math.max(newLeft, 0), maxX)}px`,
            //             top: `${Math.min(Math.max(newTop, 0), maxY)}px`
            //         });
            //     });

            //     $(document).on('mouseup', function() {
            //         isDragging = false;
            //         $element.css('cursor', 'grab');
            //         saveState();
            //     });

            //     // Make text non-editable when not selected
            //     $element.prop('contentEditable', false);

            //     $element.on('dblclick', function() {
            //         if (currentTextElement === $element) {
            //             $element.prop('contentEditable', true).focus();
            //         }
            //     });

            //     $element.on('blur', function() {
            //         $element.prop('contentEditable', false);
            //         saveState();
            //     });
            // }
            function setupTextEditing(element) {
                const $element = $(element);
                let isDragging = false;
                let offset = {
                    x: 0,
                    y: 0
                };

                function getCoordinates(e) {
                    if (e.type.startsWith('touch')) {
                        return {
                            clientX: e.touches[0].clientX,
                            clientY: e.touches[0].clientY
                        };
                    }
                    return {
                        clientX: e.clientX,
                        clientY: e.clientY
                    };
                }

                function handleStart(e) {
                    const coords = getCoordinates(e);

                    const textView = designState.views[designState.currentView].elements.find(el =>
                        el.type === 'text' && el.content === $element.text()
                    );

                    if (textView) {
                        isDragging = true;
                        offset = {
                            x: coords.clientX - element.getBoundingClientRect().left,
                            y: coords.clientY - element.getBoundingClientRect().top
                        };
                        $element.css('cursor', 'grabbing');
                        selectElement(element);
                        currentTextElement = $element;
                        $('#text-panel input[type="text"]').val($element.text());
                        e.preventDefault();
                    }
                }

                function handleMove(e) {
                    if (!isDragging) return;
                    const coords = getCoordinates(e);

                    const boundaryRect = designContent[0].getBoundingClientRect();
                    const newLeft = coords.clientX - boundaryRect.left - offset.x;
                    const newTop = coords.clientY - boundaryRect.top - offset.y;
                    const maxX = boundaryRect.width - element.offsetWidth;
                    const maxY = boundaryRect.height - element.offsetHeight;

                    $element.css({
                        left: `${Math.min(Math.max(newLeft, 0), maxX)}px`,
                        top: `${Math.min(Math.max(newTop, 0), maxY)}px`
                    });
                }

                function handleEnd() {
                    if (isDragging) {
                        isDragging = false;
                        $element.css('cursor', 'grab');
                        saveState();
                    }
                }

                $element.on('mousedown touchstart', handleStart);
                $(document).on('mousemove touchmove', handleMove);
                $(document).on('mouseup touchend', handleEnd);

                // Make text non-editable when not selected
                $element.prop('contentEditable', false);

                $element.on('dblclick', function() {
                    if (currentTextElement === $element) {
                        $element.prop('contentEditable', true).focus();
                    }
                });

                $element.on('blur', function() {
                    $element.prop('contentEditable', false);
                    saveState();
                });
            }


            // Text input handling - modified to be view-specific
            $('#text-panel input[type="text"]').on('input', function() {
                const text = $(this).val();
                const currentView = designState.currentView;

                // Check if there's already text in this view
                const existingText = designState.views[currentView].elements.find(el => el.type === 'text');

                if (existingText) {
                    // Update existing text
                    const textElement = $('.text-design').filter(function() {
                        return $(this).parent().is(designContent);
                    });
                    if (textElement.length) {
                        textElement.text(text || 'Your Text');
                        existingText.content = text || 'Your Text';
                    }
                } else {
                    // Create new text only if there isn't one in this view
                    if (!currentTextElement) {
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
                        setupTextEditing(currentTextElement[0]);
                    } else {
                        currentTextElement.text(text || 'Your Text');
                    }
                }
                saveState();
            });

            // Text styling updates
            $('#text-panel select, #text-panel input[type="range"]').on('change', function() {
                if (!currentTextElement) return;
                currentTextElement.css({
                    fontFamily: $('#text-panel select').val(),
                    fontSize: $('#text-panel input[type="range"]').val() + 'px'
                });
                saveState();
            });

            // Element selection
            function selectElement(element) {
                if (selectedElement) $(selectedElement).removeClass('selected');
                selectedElement = element;
                if (element) $(element).addClass('selected');
            }

            // Save state function
            function saveState() {
                saveCurrentViewState();

                // Check which views have designs
                for (const view in designState.views) {
                    priceState.views[view].hasDesign = designState.views[view].elements.length > 0;
                }

                updateTotalPrice();
            }

            // Initialize the design area
            updateDesignArea('front');
            $('.view-option[data-view="front"]').trigger('click');

            // Add CSS styles
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
            .editable-image, .text-design {
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
            .editable-image.selected, .text-design.selected {
                outline: 2px dashed #3a86ff;
            }
            .text-design {
                background-clip: text;
                color: transparent;
            }
            .resize-handle {
                position: absolute;
                width: 10px;
                height: 10px;
                background: #3a86ff;
                border-radius: 50%;
                z-index: 10;
            }
            .resize-nw { top: -5px; left: -5px; cursor: nwse-resize; }
            .resize-ne { top: -5px; right: -5px; cursor: nesw-resize; }
            .resize-sw { bottom: -5px; left: -5px; cursor: nesw-resize; }
            .resize-se { bottom: -5px; right: -5px; cursor: nwse-resize; }
            .delete-btn {
                position: absolute;
                top: -15px;
                right: -15px;
                width: 15px;
                height: 15px;
                background: #ff5a5f;
                color: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 10px;
                cursor: pointer;
                z-index: 10;
            }
            .rotate-handle {
                position: absolute;
                top: -20px;
                left: 50%;
                transform: translateX(-50%);
                width: 15px;
                height: 15px;
                background: #2ec4b6;
                color: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 10px;
                cursor: grab;
                z-index: 10;
            }
            .rotate-handle:active {
                cursor: grabbing;
            }
        `).appendTo('head');
        });
    </script>
@endsection
