<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
    <!-- Page Container -->
    <div id="page-container">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>
    @include('layouts.js')
    <!-- END Page Container -->
</body>
</html>
