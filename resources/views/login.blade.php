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
    @vite('resources/asset/vendor/css/pages/page-auth.css')
</head>
<body>
<!-- Content -->
@inertia

<!-- / Content -->
@include('layout.defaultJS')
</body>
</html>
