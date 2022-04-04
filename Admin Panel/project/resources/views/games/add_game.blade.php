@extends('layouts.master')
@section('title', 'Game Add')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Game Add</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Game</li>
                            <li class="breadcrumb-item active" aria-current="page">Add</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-full content-boxed">
        @include('layouts.errors')
        <!-- Game Add -->
            <form action="{{ route('addGame') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block">
                    <div class="block-header block-header-default">
                        <a class="btn btn-light" href="{{ route('getGamesList') }}">
                            <i class="fa fa-arrow-left mr-1"></i> All Games
                        </a>
                        <div class="block-options">
                            <div class="custom-control custom-switch custom-control-success">
                                <input type="checkbox" class="custom-control-input" id="game_add_active" name="game_add_active">
                                <label class="custom-control-label" for="game_add_active">Set game as active</label>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row justify-content-center push">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="add_name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" id="add_name" name="add_name" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="add_developers" class="col-form-label">Developers:</label>
                                    <input type="text" class="form-control" id="add_developers" name="add_developers" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="add_publishers" class="col-form-label">Publishers:</label>
                                    <input type="text" class="form-control" id="add_publishers" name="add_publishers" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="add_series" class="col-form-label">Series:</label>
                                    <input type="text" class="form-control" id="add_series" name="add_series" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="add_engine" class="col-form-label">Engine:</label>
                                    <input type="text" class="form-control" id="add_engine" name="add_engine" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="add_platforms" class="col-form-label">Platforms:</label>
                                    <input type="text" class="form-control" id="add_platforms" name="add_platforms" required="required"/>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-6">
                                        <label>Image:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="add_image" name="add_image" data-toggle="custom-file-input">
                                            <label class="custom-file-label" for="add_image">Choose an image</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="add_category" class="col-form-label">Category:</label>
                                    <select class="form-control" id="add_category" onchange="getValue(this.value)" name="add_category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="add_subcategory" class="col-form-label">Subcategory:</label>
                                    <select class="form-control" id="add_subcategory" name="add_subcategory">
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="add_modes" class="col-form-label">Modes:</label>
                                    <select name="add_modes" id="add_modes" class="form-control">
                                        <option value="1">Singleplayer</option>
                                        <option value="2">Multiplayer</option>
                                        <option value="3">Both</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="add_released_year" class="col-form-label">Released year:</label>
                                    <input type="date" class="form-control" id="add_released_year" name="add_released_year" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="add_price" class="col-form-label">Price:</label>
                                    <input type="number" class="form-control" id="add_price" name="add_price" min="0" step="0.01" required="required"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content bg-body-light">
                        <div class="row justify-content-center push">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-fw fa-check mr-1"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END Game Add -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection

@section('js')
    <!-- My JS Code -->
    <script>
        const getValue = (category) => {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "/games/subcategories",
                data: {
                    _token: CSRF_TOKEN, category: category,
                },
                success: function(data) {
                    let subcategories = '';
                    for (let i = 0; i < data.length; i++) {
                        subcategories += `
                            <option value="${data[i].id}">${data[i].subcategory}</option>
                        `;
                    }
                    document.getElementById('add_subcategory').innerHTML = subcategories;
                },
                error: function() {
                    alert('Error... 5000');
                }
            });
        }
    </script>
@endsection
