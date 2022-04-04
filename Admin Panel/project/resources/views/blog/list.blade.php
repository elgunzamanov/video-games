@extends('layouts.master')
@section('title', 'All Posts')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Manage All Posts</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Blog</li>
                            <li class="breadcrumb-item active" aria-current="page">All Posts</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Posts Statistics -->
            <div class="row text-center">
                <div class="col-6 col-xl-3">
                    <!-- All Posts -->
                    <a class="block block-rounded" href="{{ route('getAllPosts') }}">
                        <div class="block-content block-content-full">
                            <div class="py-md-3">
                                <div class="py-3 d-none d-md-block">
                                    <i class="far fa-2x fa-file-alt opacity-50"></i>
                                </div>
                                <p class="font-size-h3 font-w700 mb-0">
                                    {{ count($posts) }}
                                </p>
                                <p class="text-muted mb-0">
                                    All Posts
                                </p>
                            </div>
                        </div>
                    </a>
                    <!-- END All Posts -->
                </div>
                <div class="col-6 col-xl-3">
                    <!-- Active Posts -->
                    <a class="block block-rounded" href="{{ route('getAllPosts') }}">
                        <div class="block-content block-content-full">
                            <div class="py-md-3">
                                <div class="py-3 d-none d-md-block">
                                    <i class="far fa-2x fa-eye opacity-50"></i>
                                </div>
                                <p class="font-size-h3 font-w700 mb-0">
                                    {{ count($activePosts) }}
                                </p>
                                <p class="text-muted mb-0">
                                    Active
                                </p>
                            </div>
                        </div>
                    </a>
                    <!-- END Active Posts -->
                </div>
                <div class="col-6 col-xl-3">
                    <!-- Draft Posts -->
                    <a class="block block-rounded" href="{{ route('getAllPosts') }}">
                        <div class="block-content block-content-full">
                            <div class="py-md-3">
                                <div class="py-3 d-none d-md-block">
                                    <i class="fa fa-2x fa-pencil-alt opacity-50"></i>
                                </div>
                                <p class="font-size-h3 font-w700 mb-0">
                                    {{ count($posts) - count($activePosts) }}
                                </p>
                                <p class="text-muted mb-0">
                                    Drafts
                                </p>
                            </div>
                        </div>
                    </a>
                    <!-- END Draft Posts -->
                </div>
                <div class="col-6 col-xl-3">
                    <!-- New Post -->
                    <a class="block block-rounded" href="{{ route('newPost') }}">
                        <div class="block-content block-content-full">
                            <div class="py-md-3">
                                <div class="py-3 d-none d-md-block">
                                    <i class="fa fa-2x fa-plus text-success-light"></i>
                                </div>
                                <p class="font-size-h3 font-w700 mb-0">
                                    <i class="fa fa-plus text-success-light mr-1 d-md-none"></i> New Post
                                </p>
                                <p class="text-muted mb-0">
                                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                </p>
                            </div>
                        </div>
                    </a>
                    <!-- END New Post -->
                </div>
            </div>
            <!-- Post Statistics -->

            <!-- Dynamic Table Full -->
            <div class="block block-rounded">
                @include('layouts.errors')
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 60px;">ID</th>
                            <th style="width: 25%;">Title</th>
                            <th class="d-none d-sm-table-cell">Author</th>
                            <th class="d-none d-xl-table-cell">Created</th>
                            <th class="d-none d-xl-table-cell">Published</th>
                            <th>Status</th>
                            <th style="width: 60px;" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr style="text-align: center">
                                <td>{{ $post->id }}</td>
                                <td>
                                    <a href="{{ route('viewPost', $post->slug) }}">{{ $post->title }}</a>
                                </td>
                                <td>{{ $post->author }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->published_at }}</td>
                                <td>{!! $post->status == '1' ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Deactive</span>' !!}</td>
                                <td>
                                    <a class="btn btn-outline-warning btn-sm" href="{{ route('getPost', $post->id) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table Full -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}"/>
@endsection

@section('js')
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
@endsection
