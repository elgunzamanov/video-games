<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
    <!-- Page Container -->
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        @include('layouts.nav')
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>
    @include('layouts.js')
    <!-- END Page Container -->
</body>
</html>
