<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>

    <title>@yield('title', 'Video Games')</title>

    <meta name="description" content="Video Games by Elgun Zamanov"/>
    <meta name="author" content="Elgun Zamanov"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets\media\favicons\gamepad.png') }}"/>
    <!-- END Icons -->

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"/>
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}"/>
    @yield('css')
    <!-- END Stylesheets -->
</head>
