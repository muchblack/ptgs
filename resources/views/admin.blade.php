<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-menu-fixed layout-compact"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<head>
    @include('layout.header')
</head>
<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layout.leftMenu')
        <!-- Layout page -->
        <div class="layout-page">
            @include('layout.rightTop')
            <!-- Content wrapper -->
            <div class="content-wrapper">
                @yield('sendParams')
                <!-- content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    @inertia
                </div>
                <!-- footer -->
                @include('layout.footer')
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
@include('layout.defaultJS')
</body>
</html>
