@extends('layouts.master')
@section('title', 'New Post')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">New Blog Post</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Blog</li>
                            <li class="breadcrumb-item active" aria-current="page">New</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-full content-boxed">
        @include('layouts.errors')
        <!-- New Post -->
            <form action="{{ route('addPost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block">
                    <div class="block-header block-header-default">
                        <a class="btn btn-light" href="{{ route('getAllPosts') }}">
                            <i class="fa fa-arrow-left mr-1"></i> Manage Posts
                        </a>
                        <div class="block-options">
                            <div class="custom-control custom-switch custom-control-success">
                                <input type="checkbox" class="custom-control-input" id="post_add_active" name="post_add_active">
                                <label class="custom-control-label" for="post_add_active">Set post as active</label>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row justify-content-center push">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="add_title">Title</label>
                                    <input type="text" class="form-control" id="add_title" name="add_title" placeholder="Enter a title..">
                                </div>
                                <div class="form-group">
                                    <label for="add_excerpt">Excerpt</label>
                                    <textarea class="form-control" id="add_excerpt" name="add_excerpt" rows="3" placeholder="Enter an excerpt.."></textarea>
                                    <div class="form-text text-muted font-size-sm font-italic">Visible on blog post list as a small description of the post.</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-6">
                                        <label>Featured Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="add_featured_image" name="add_featured_image" data-toggle="custom-file-input">
                                            <label class="custom-file-label" for="add_featured_image">Choose an image</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Body</label>
                                    <textarea id="js-ckeditor" name="add_body"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content bg-body-light">
                        <div class="row justify-content-center push">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-fw fa-check mr-1"></i> Create Post
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END New Post -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection

@section('js')
    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/ckeditor/ckeditor.js') }}"></script>

    <!-- Page JS Helpers (CKEditor plugin) -->
    <script>
        jQuery(function () {
            CKEDITOR.config.height = '450px';
            Dashmix.helpers(['ckeditor']);
        });
    </script>
@endsection
