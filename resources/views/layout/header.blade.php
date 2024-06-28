 <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/asset/img/favicon/favicon.ico') }}" />
    <title> {{ $title ?? "" }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />

    @vite('resources/asset/vendor/fonts/materialdesignicons.css')

    <!-- Menu waves for no-customizer fix -->
    @vite('resources/asset/vendor/libs/node-waves/node-waves.css')

    <!-- Core CSS -->
    @vite('resources/asset/vendor/css/core.css')
    @vite('resources/asset/vendor/css/theme-default.css')
    @vite('resources/css/demo.css')

    <!-- Vendors CSS -->
    @vite('resources/asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')
    <!-- Page CSS -->
    @vite('resources/asset/js/config.js')
    <!-- Helpers -->
    <script type="module" src="{{ asset('/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    @vite('resources/js/app.js')

    @inertiaHead
