@extends('layouts.master')
@section('title', 'Post View')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-image" style="background-image: url('{{ asset($post->image) }}');">
            <div class="bg-black-75">
                <div class="content content-top content-full text-center">
                    <h1 class="font-w700 text-white mt-5 mb-3 invisible" data-toggle="appear">
                        {{ $post->title }}
                    </h1>
                    <h2 class="h3 font-w400 text-white-75 mb-5 invisible" data-toggle="appear" data-timeout="400">{{ $post->excerpt }}</h2>
                    <p class="invisible" data-toggle="appear" data-timeout="400">
                        <a class="badge badge-pill badge-primary font-size-base px-3 py-2 mr-2 m-1" href="{{ route('getAllPosts') }}" href="javascript:void(0)">
                            <i class="fa fa-fw fa-arrow-left"></i> All Posts
                        </a>
                        <a class="badge badge-pill badge-primary font-size-base px-3 py-2 mr-2 m-1" href="javascript:void(0)">
                            <i class="fa fa-user-circle mr-1"></i> by {{ $post->author }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-full">
            <div class="row justify-content-center">
                <div class="col-sm-8 py-5">
                    <!-- Story -->
                    <article class="js-gallery story">
                        {!! $post->body !!}
                    </article>
                    <!-- END Story -->
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
