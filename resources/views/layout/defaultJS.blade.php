<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

@vite('resources/asset/vendor/libs/jquery/jquery.js')
@vite('resources/asset/vendor/libs/popper/popper.js')
@vite('resources/asset/vendor/js/bootstrap.js')
@vite('resources/asset/vendor/libs/node-waves/node-waves.js')
<script type="module" src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script type="module" src="{{ asset('/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
@vite('resources/asset/vendor/libs/apex-charts/apexcharts.js')
<!-- Main JS -->
<script type="module" src="{{ asset('/js/main.js') }}"></script>
<!-- Page JS -->

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
