<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Veterinaria App</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{asset('/assets/img/favicon/favicon.ico')}}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{asset('/assets/vendor/fonts/boxicons.css')}}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{asset('/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{asset('/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{asset('/assets/css/demo.css')}}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

  <link rel="stylesheet" href="{{asset('/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

  <!-- Page CSS -->
  <link rel="stylesheet" href="{{asset('/assets/vendor/css/pages/page-auth.css')}}" />

  <!-- Helpers -->
  <script src="{{asset('/assets/vendor/js/helpers.js')}}"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{asset('/assets/js/config.js')}}"></script>
  <style>
    /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    html {
      line-height: 1.15;
      -webkit-text-size-adjust: 100%
    }

    body {
      margin: 0
    }

    a {
      background-color: transparent
    }

    [hidden] {
      display: none
    }

    html {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
      line-height: 1.5
    }

    *,
    :after,
    :before {
      box-sizing: border-box;
      border: 0 solid #e2e8f0
    }

    a {
      color: inherit;
      text-decoration: inherit
    }

    svg,
    video {
      display: block;
      vertical-align: middle
    }

    video {
      max-width: 100%;
      height: auto
    }

    .bg-white {
      --bg-opacity: 1;
      background-color: #fff;
      background-color: rgba(255, 255, 255, var(--bg-opacity))
    }

    .bg-gray-100 {
      --bg-opacity: 1;
      background-color: #f7fafc;
      background-color: rgba(247, 250, 252, var(--bg-opacity))
    }

    .border-gray-200 {
      --border-opacity: 1;
      border-color: #edf2f7;
      border-color: rgba(237, 242, 247, var(--border-opacity))
    }

    .border-t {
      border-top-width: 1px
    }

    .flex {
      display: flex
    }

    .grid {
      display: grid
    }

    .hidden {
      display: none
    }

    .items-center {
      align-items: center
    }

    .justify-center {
      justify-content: center
    }

    .font-semibold {
      font-weight: 600
    }

    .h-5 {
      height: 1.25rem
    }

    .h-8 {
      height: 2rem
    }

    .h-16 {
      height: 4rem
    }

    .text-sm {
      font-size: .875rem
    }

    .text-lg {
      font-size: 1.125rem
    }

    .leading-7 {
      line-height: 1.75rem
    }

    .mx-auto {
      margin-left: auto;
      margin-right: auto
    }

    .ml-1 {
      margin-left: .25rem
    }

    .mt-2 {
      margin-top: .5rem
    }

    .mr-2 {
      margin-right: .5rem
    }

    .ml-2 {
      margin-left: .5rem
    }

    .mt-4 {
      margin-top: 1rem
    }

    .ml-4 {
      margin-left: 1rem
    }

    .mt-8 {
      margin-top: 2rem
    }

    .ml-12 {
      margin-left: 3rem
    }

    .-mt-px {
      margin-top: -1px
    }

    .max-w-6xl {
      max-width: 72rem
    }

    .min-h-screen {
      min-height: 100vh
    }

    .overflow-hidden {
      overflow: hidden
    }

    .p-6 {
      padding: 1.5rem
    }

    .py-4 {
      padding-top: 1rem;
      padding-bottom: 1rem
    }

    .px-6 {
      padding-left: 1.5rem;
      padding-right: 1.5rem
    }

    .pt-8 {
      padding-top: 2rem
    }

    .fixed {
      position: fixed
    }

    .relative {
      position: relative
    }

    .top-0 {
      top: 0
    }

    .right-0 {
      right: 0
    }

    .shadow {
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
    }

    .text-center {
      text-align: center
    }

    .text-gray-200 {
      --text-opacity: 1;
      color: #edf2f7;
      color: rgba(237, 242, 247, var(--text-opacity))
    }

    .text-gray-300 {
      --text-opacity: 1;
      color: #e2e8f0;
      color: rgba(226, 232, 240, var(--text-opacity))
    }

    .text-gray-400 {
      --text-opacity: 1;
      color: #cbd5e0;
      color: rgba(203, 213, 224, var(--text-opacity))
    }

    .text-gray-500 {
      --text-opacity: 1;
      color: #a0aec0;
      color: rgba(160, 174, 192, var(--text-opacity))
    }

    .text-gray-600 {
      --text-opacity: 1;
      color: #718096;
      color: rgba(113, 128, 150, var(--text-opacity))
    }

    .text-gray-700 {
      --text-opacity: 1;
      color: #4a5568;
      color: rgba(74, 85, 104, var(--text-opacity))
    }

    .text-gray-900 {
      --text-opacity: 1;
      color: #1a202c;
      color: rgba(26, 32, 44, var(--text-opacity))
    }

    .underline {
      text-decoration: underline
    }

    .antialiased {
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale
    }

    .w-5 {
      width: 1.25rem
    }

    .w-8 {
      width: 2rem
    }

    .w-auto {
      width: auto
    }

    .grid-cols-1 {
      grid-template-columns: repeat(1, minmax(0, 1fr))
    }

    @media (min-width:640px) {
      .sm\:rounded-lg {
        border-radius: .5rem
      }

      .sm\:block {
        display: block
      }

      .sm\:items-center {
        align-items: center
      }

      .sm\:justify-start {
        justify-content: flex-start
      }

      .sm\:justify-between {
        justify-content: space-between
      }

      .sm\:h-20 {
        height: 5rem
      }

      .sm\:ml-0 {
        margin-left: 0
      }

      .sm\:px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem
      }

      .sm\:pt-0 {
        padding-top: 0
      }

      .sm\:text-left {
        text-align: left
      }

      .sm\:text-right {
        text-align: right
      }
    }

    @media (min-width:768px) {
      .md\:border-t-0 {
        border-top-width: 0
      }

      .md\:border-l {
        border-left-width: 1px
      }

      .md\:grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr))
      }
    }

    @media (min-width:1024px) {
      .lg\:px-8 {
        padding-left: 2rem;
        padding-right: 2rem
      }
    }

    @media (prefers-color-scheme:dark) {
      .dark\:bg-gray-800 {
        --bg-opacity: 1;
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--bg-opacity))
      }

      .dark\:bg-gray-900 {
        --bg-opacity: 1;
        background-color: #1a202c;
        background-color: rgba(26, 32, 44, var(--bg-opacity))
      }

      .dark\:border-gray-700 {
        --border-opacity: 1;
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--border-opacity))
      }

      .dark\:text-white {
        --text-opacity: 1;
        color: #fff;
        color: rgba(255, 255, 255, var(--text-opacity))
      }

      .dark\:text-gray-400 {
        --text-opacity: 1;
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--text-opacity))
      }

      .dark\:text-gray-500 {
        --tw-text-opacity: 1;
        color: #6b7280;
        color: rgba(107, 114, 128, var(--tw-text-opacity))
      }
    }
  </style>

  <style>
    body {
      font-family: 'Nunito', sans-serif;
    }
  </style>
</head>

<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 432 432" style="enable-background:new 0 0 432 432;" xml:space="preserve">
                    <g>
                      <path d="M173.92,79.52c20.96,14.81,45.77-12.9,37.09-35.05c-2.75-9.77-7.98-26.16-16.96-32.07c-11.08-6.56-22.31,6.36-29.87,13.49
                        C150.57,41.67,155.58,70.29,173.92,79.52z" />
                      <path d="M241.25,118.33c-10.95-16.62-24.34-26.34-45.06-22.95c-31.1-2.81-44.87,23.15-69.58,34.93
                        c-26.81,6.9-33.71,26.53-22.95,52.52c0.58-0.04,1.02-0.11,1.23-0.24c-0.8-0.26-1.24-1.39-0.52-2.01c4.62-3.45,9.95,1.67,15.12-0.16
                        c-9.02-5.93,7.98-4.4,10.99-2.07c0.51-0.18,1.02-0.38,1.52-0.6c-0.05-0.05-0.08-0.1-0.11-0.14c-1.01-0.25-2.05-0.34-2.77-0.39
                        c-1.54-0.1-1.55-2.33,0-2.41c3.46-0.28,7,0.07,10.31-1.1c-4.68-0.64,0.67-4.38,2.9-4.35c1.14-2.04,4.08-2.69,6.12-3.61
                        c-2.38-0.9,0.38-3.42,1.37-4.3c-1.86-3.91,3.7-6.26,6.93-5.92c0.35-2.76,5-2.65,7.25-2.63c1.99-4.06,9.22-1.86,12.99-1.81
                        c-11.94-9.83,3.28-5.8,6.1,0.86c1.24-2.33,3.56,0.89,4.45,2.08c4.02-0.31,2.39,7.48,3.12,10.24c0.28-0.76,0.45-1.56,0.69-2.34
                        c0.43-1.51,2.62-0.86,2.32,0.64c-0.41,1.86-1.1,3.61-1.54,5.47c5.39-6.51,3.77,4.16-1.49,4.41c0.03,0.46,0.07,0.92,0.11,1.38
                        c0.67,0.4,1.24,0.9,1.61,1.53c2.62-0.87,1.73,2.88,1.87,4.35c3.07,2.39-0.5,7.35-3.99,5.86c-4.66,6.51-0.98,16.9-8.62,21.29
                        c-3.7,2.14-5.91,5.98-9.69,8.01c-0.56,0.3-0.82,1.02-0.74,1.8c2.3,1.89,10.16,8.84,4.72,10.55c0.94,2.87,1.71,5.89,1.39,8.92
                        c0,0,0,0,0,0c0.01,0.73-0.52,1.27-1.21,1.17c0.69,2.05,1.03,8.54-1.63,6.32c0.05,0.38,0.12,0.75,0.15,1.13
                        c4.56,0.93,14.07,5.46,5.56,5.66c0.24,0.28,0.46,0.56,0.67,0.86c4.68-1.34,13.92,5.66,4.62,6.07c0.12,0.07,0.24,0.14,0.36,0.21
                        c10.3-1.79,15.96,7.81,6.98,4.8c3.03,1.22,6.31,3.13,6.83,6.72c5.07,0.08,9.51,11.26,2.38,6.47c0.94,3.2,0.49,6.53,2.43,9.42
                        c-0.38,15.19-10.97,23.34-9.63,2.32c-1.25-4.4-9.38-7.99-6.31-0.5c0.44,2.11-0.76,3.37-2.89,3.03c-6.97-2.01-8.41-10.55-12.2-15.82
                        c-0.29,0.4-0.52,0.85-0.17,1.14c1.6,1.82-2.01,2.86-2.42,0.68c-2.57-0.29-0.52-3.8-1.3-5.48c-0.01-0.01-0.02-0.01-0.03-0.02
                        c-0.75,4.58-3.82,3.15-4.97-0.29c-0.52,2.53-2.25,1.93-3.54,0.51c-1.28,1.23-2.56,2.47-3.86,3.69c0.04,0.16,0.1,0.31,0.12,0.48
                        c0.7,0.55,1.4,1.11,2.08,1.69c2.82-1.36,7.05,1.56,4.85,4.57c0.46,0.49,0.91,0.99,1.34,1.49c4.11-0.88,12.19,1.95,9.47,7.05
                        c1.86,1.02,3.79,3.49,1.45,5.13c5.84,0.24,15.03,10.12,3.4,7.28c0.96,1.45,1.73,4.22,0.03,5.43c0.07,0.22,0.13,0.44,0.19,0.65
                        c2.86,1.15,10.51,8.93,4.1,9.54c0.07,0.65,0.05,1.31-0.09,1.96c3.59,1.41,4.49,8.68-0.74,5.38c2.14,1.87,2.28,5.28,1.72,7.87
                        c0.57,1.71,1.69,6.3-0.94,6.49c0.96,2.05,0.77,5.63-2.24,3.69c0.04,2.09-1.22,7.85,2.27,7.17c10.06-0.33,19.61,1.1,29.21-3.24
                        c5.66-0.62,3.39,6.08,0.63,8.22c-1.49,1.79-4.03,2.42-5.31,4.3c-15.86,2.04-29.21,15.63-45.38,11.75
                        c-4.93-3.77,1.41-11.23-0.12-16.59c-1.23,1.31-4.15,0.67-4.29-1.36c0.06-2.41,1.94-4.66,1.44-7.18c-6.58,9.74-4.83,0.15-4.52-5.28
                        c-7.17,6.19-3.27-1.57-3.43-5.56c-5.31,8.67-3.79-1.13-3.37-5.2c-3.73,4.81-4.13-3.58-5.22-6.04c0.15,1.85-1.87,4.93-2.83,1.94
                        c0.25-3.16,0.5-7.26-0.5-10.66c-1.46-1.25-2.95-2.51-3.89-4.45c-2.24,5.03,0.32,15.17-4.92,18.27
                        c-18.73,38.09,7.72,102.1,55.41,78.89c12.28-8.83,18.05-23.86,27.58-35.31c10.26-14.25,19.69-28.55,26.22-44.93
                        c16.36-48.78,77.47-85.58,58.61-141.87C284.72,158.95,258.48,143.33,241.25,118.33z" />
                      <path d="M142.31,57.51c-2.35-3.7-4.51-7.54-6.29-11.54c-7.37-16.58-31.86-25.26-46.09-12.06c-16.14,15.57-16.53,57.91-0.2,73.68
                        C127.33,136.74,165.33,93.71,142.31,57.51z" />
                      <path d="M347.57,124.87c-13.82-10.49-48.3,20.9-45.23,34.53c-8.83,18.52,20.18,31.34,27.46,10.67c2.92-4.81,5.64-5.45,10.84-7.46
                        C357.64,158.24,362.67,134.59,347.57,124.87z" />
                      <path d="M267.51,114.14c2.79,3.28,5.28,6.8,6.9,10.79c8.23,20.33,44.61,12.08,38.49-13.11c-5.74-9.93,0.13-14.58,3.97-23.33
                        c2.09-8.5-2.77-16.61-11.04-19.31c-20.25-6.6-33.7,22.3-39.54,36.88C265.01,109.26,265.78,112.11,267.51,114.14z" />
                      <path d="M261.18,87.36c7.25-5.18,8.85-12.63,9.03-20.98c1.41-12.33,11.06-21.85,7.73-35.05c-2.9-11.49-14.62-17.63-25.88-14.43
                        C219.4,25.72,215.58,110.46,261.18,87.36z" />
                    </g>
                  </svg>
                </span>
                <span class="app-brand-text demo text-body fw-bolder">Veterinaria App</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">🦓🐷🐯🐸🐼🐨🐔🦄🐰🦊🙈🐶🐺😹🐑🦎🦈🦕🦔🐇🐿🦘🐫🐃🐕🦏🐳🦛🐠🦆🦚🦉🐌🕷🦠</h4>
            <p class="mb-4">¡Por el bienestar de la sociedad animal!</p>

            <form id="formAuthentication" class="mb-3" action="{{ route('register.perform') }}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="mb-3">
                <label for="nombre" class="form-label">Tus Nombres</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tus nombres" autofocus />
              </div>
              <div class="mb-3">
                <label for="correo" class="form-label">Correo eléctronico</label>
                <input type="text" class="form-control" id="correo" name="correo" placeholder="Escribe tu correo" />
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Frase de seguridad</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>

              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                  <label class="form-check-label" for="terms-conditions">
                    Aceptación
                    <a href="javascript:void(0);">politícas privacidad & terminos. </a>
                  </label>
                </div>
              </div>
              <button class="btn btn-primary d-grid w-100" type="submit">Empezar</button>
            </form>

            <p class="text-center">
              <span>No es tu primera vez?</span>
              <a href="login">
                <span>Identifícate</span>
              </a>
            </p>
          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <div class="buy-now">
    <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank" class="btn btn-danger btn-buy-now">🐱‍💻¡Ayuda!</a>
  </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{asset('/assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('/assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

  <script src="{{asset('/assets/vendor/js/menu.js')}}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="{{asset('/assets/js/main.js')}}"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>