@extends('layouts.master')
@section('title', 'Blog')
@section('content')
    <!-- Hero -->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Blog</h1>
                <p class="lead fw-normal text-white-50 mb-0">Recent posts</p>
            </div>
        </div>
    </header>

    <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5">
            <h2 class="fw-bolder fs-5 mb-4">Featured Stories</h2>
            <div class="row gx-5">
                @foreach($posts as $post)
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="{{ asset($post->image) }}" alt="..." />
                            <div class="card-body p-4">
                                <a class="text-decoration-none link-dark stretched-link" href="{{ route('getPost', $post->slug) }}"><div class="h5 card-title mb-3">{{ $post->title }}</div></a>
                                <p class="card-text mb-0">{{ $post->excerpt }}</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                        <div class="small">
                                            <div class="fw-bold">{{ $post->author }}</div>
                                            <div class="text-muted">{{ date('F j, Y', strtotime($post->published_at)) }} &middot; 6 min read</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
