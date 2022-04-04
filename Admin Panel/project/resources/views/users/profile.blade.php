@extends('layouts.master')
@section('title', 'User Profile')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-image" style="background-image: url({{ asset('assets/media/photos/photo17@2x.jpg') }});">
            <div class="bg-black-75">
                <div class="content content-full">
                    <div class="py-5 text-center">
                        <a class="img-link" href="#">
                            <img class="img-avatar img-avatar96 img-avatar-thumb"
                                 src="{{ asset(\Illuminate\Support\Facades\Auth::user()->image) }}" alt="User"/>
                        </a>
                        <h1 class="font-w700 my-2 text-white">User Profile</h1>
                        <h2 class="h4 font-w700 text-white-75">
                            {{ \Illuminate\Support\Facades\Auth::user()->name }}
                        </h2>
                        <a class="btn btn-hero-dark" href="{{ route('index') }}">
                            <i class="fa fa-fw fa-arrow-left"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-full content-boxed">
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="{{ route('editProfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-user-circle text-muted mr-1"></i> User Info
                    </h2>
                    <div class="row push">
                        <div style="margin: auto" class="col-lg-8 col-xl-5">
                            @include('layouts.errors')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" readonly="readonly"
                                       value="{{ \Illuminate\Support\Facades\Auth::user()->name }}"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" readonly="readonly"
                                       value="{{ \Illuminate\Support\Facades\Auth::user()->email }}"/>
                            </div>
                            <div class="form-group">
                                <label>Your Image</label>
                                <div class="push">
                                    <img class="img-avatar" src="{{ asset(\Illuminate\Support\Facades\Auth::user()->image) }}" alt="User"/>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input"
                                           id="new_image" name="new_image"/>
                                    <label class="custom-file-label" for="new_image">Choose a new image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END User Profile -->

                    <!-- Change Password -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-asterisk text-muted mr-1"></i> Change Password
                    </h2>
                    <div class="row push">
                        <div style="margin: auto" class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" class="form-control" id="current_password" name="current_password"/>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="confirm_new_password">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Change Password -->

                    <!-- Submit -->
                    <div class="row push">
                        <div class="col-lg-8 col-xl-5 offset-lg-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-check-circle mr-1"></i> Update Profile
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END Submit -->
                    </form>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
