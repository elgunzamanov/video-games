<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>

    <title>@yield('title', "Video Games")</title>

    <meta name="description" content="Video Games by Elgun Zamanov"/>
    <meta name="author" content="Elgun Zamanov"/>
    <meta name="robots" content="noindex, nofollow"/>

    <!-- Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets\media\favicons\gamepad.png') }}"/>
    <!-- END Icons -->

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"/>
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}"/>
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Page Container -->
    <div id="page-container">
        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url({{ asset('assets/media/photos/photo22@2x.jpg') }});">
                <div class="row no-gutters bg-primary-op">
                    <!-- Main Section -->
                    <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                        <div class="p-3 w-100">
                            <!-- Header -->
                            <div class="mb-3 text-center">
                                <a class="link-fx font-w700 font-size-h1" href="#">
                                    <span class="text-dark">Video</span><span class="text-primary">Games</span>
                                </a>
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Sign In</p>
                            </div>
                            <!-- END Header -->

                            <!-- Sign In Form -->
                            <div class="row no-gutters justify-content-center">
                                <div class="col-sm-8 col-xl-6">
                                    <form class="js-validation-signin" action="{{ route('login_post') }}" method="POST">
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if(session('error'))
                                            <div class="alert alert-danger">Email or password is incorrect</div>
                                        @endif
                                        <div class="py-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-alt"
                                                       id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg form-control-alt"
                                                       id="password" name="password" placeholder="Enter your password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-hero-lg btn-hero-primary">
                                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                    <!-- END Main Section -->

                    <!-- Meta Info Section -->
                    <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                        <div class="p-3">
                            <p class="display-4 font-w700 text-white mb-3">
                                Welcome to Game World
                            </p>
                            <p class="font-size-lg font-w600 text-white-75 mb-0">
                                Copyright &copy; <span data-toggle="year-copy"></span>
                            </p>
                        </div>
                    </div>
                    <!-- END Meta Info Section -->
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <script src="{{ asset('assets/js/dashmix.core.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/op_auth_signin.min.js') }}"></script>
</body>

</html>
