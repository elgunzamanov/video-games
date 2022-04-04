@extends('layouts.master')
@section('title', 'Post Edit')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Edit Blog Post</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Blog</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
            <form action="{{ route('editPost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block">
                    <div class="block-header block-header-default">
                        <a class="btn btn-light" href="{{ route('getAllPosts') }}">
                            <i class="fa fa-arrow-left mr-1"></i> Manage Posts
                        </a>
                        <div class="block-options">
                            <div class="custom-control custom-switch custom-control-success">
                                <input type="checkbox" class="custom-control-input" id="post_edit_active" name="post_edit_active" {{ $post->status == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="post_edit_active">Set post as active</label>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row justify-content-center push">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="edit_id">ID</label>
                                    <input type="text" class="form-control-plaintext" id="edit_id" name="edit_id" value="{{ $post->id }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="edit_title">Title</label>
                                    <input type="text" class="form-control" id="edit_title" name="edit_title" placeholder="Enter a title.." value="{{ $post->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="edit_slug">Slug</label>
                                    <input type="text" class="form-control" id="edit_slug" name="edit_slug" value="{{ $post->slug }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="edit_excerpt">Excerpt</label>
                                    <textarea class="form-control" id="edit_excerpt" name="edit_excerpt" rows="3" placeholder="Enter an excerpt..">{{ $post->excerpt }}</textarea>
                                    <div class="form-text text-muted font-size-sm font-italic">Visible on blog post list as a small description of the post.</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-6">
                                        <label>Featured Image</label>
                                        <div class="custom-file">
                                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                            <input type="file" class="custom-file-input" id="edit_image" name="edit_image" data-toggle="custom-file-input">
                                            <label class="custom-file-label" for="edit_image">Choose a new image</label>
                                        </div>
                                        <div class="mt-2">
                                            <img class="img-fluid" src="{{ asset($post->image) }}" alt="Featured Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- CKEditor (js-ckeditor-inline + js-ckeditor ids are initialized in Helpers.ckeditor()) -->
                                    <!-- For more info and examples you can check out http://ckeditor.com -->
                                    <label>Body</label>
                                    <textarea id="js-ckeditor" name="edit_body">
                                        {{ $post->body }}
                                    </textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-6">
                                        <!-- Flatpickr Datetimepicker (.js-flatpickr class is initialized in Helpers.flatpickr()) -->
                                        <!-- For more info and examples you can check out https://github.com/flatpickr/flatpickr -->
                                        <label for="edit_publish_date">Publish Date</label>
                                        <input type="text" class="js-flatpickr form-control bg-white" id="edit_publish_date" name="edit_publish_date" data-enable-time="true" placeholder="Y-m-d H:i" value="{{ $post->published_at }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content bg-body-light">
                        <div class="row justify-content-center push">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-fw fa-check mr-1"></i> Save Changes
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

@section('css')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}"/>
@endsection

@section('js')
    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Page JS Helpers (Flatpickr + CKEditor plugins) -->
    <script>
        jQuery(function () {
            CKEDITOR.config.height = '450px';
            Dashmix.helpers(['flatpickr', 'ckeditor']);
        });
    </script>
@endsection
