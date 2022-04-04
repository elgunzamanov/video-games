@extends('layouts.master')
@section('title', 'Game Edit')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Game Edit</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Game</li>
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
        <!-- Game Edit -->
            <form action="{{ route('editGame') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block">
                    <div class="block-header block-header-default">
                        <a class="btn btn-light" href="{{ route('getGamesList') }}">
                            <i class="fa fa-arrow-left mr-1"></i> All Games
                        </a>
                        <div class="block-options">
                            <div class="custom-control custom-switch custom-control-success">
                                <input type="checkbox" class="custom-control-input" id="game_edit_active" name="game_edit_active" {{ $game->status == '1' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="game_edit_active">Set game as active</label>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row justify-content-center push">
                            <div class="col-md-10">
                                <input type="hidden" id="edit_id" name="edit_id" value="{{ $game->id }}"/>
                                <div class="form-group">
                                    <label for="edit_name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" id="edit_name" name="edit_name" value="{{ $game->name }}" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="edit_developers" class="col-form-label">Developers:</label>
                                    <input type="text" class="form-control" id="edit_developers" name="edit_developers" value="{{ $game->developers }}" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="edit_publishers" class="col-form-label">Publishers:</label>
                                    <input type="text" class="form-control" id="edit_publishers" name="edit_publishers" value="{{ $game->publishers }}" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="edit_series" class="col-form-label">Series:</label>
                                    <input type="text" class="form-control" id="edit_series" name="edit_series" value="{{ $game->series }}" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="edit_engine" class="col-form-label">Engine:</label>
                                    <input type="text" class="form-control" id="edit_engine" name="edit_engine" value="{{ $game->engine }}" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="edit_platforms" class="col-form-label">Platforms:</label>
                                    <input type="text" class="form-control" id="edit_platforms" name="edit_platforms" value="{{ $game->platforms }}" required="required"/>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-6">
                                        <label>Image:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="edit_image" name="edit_image" data-toggle="custom-file-input">
                                            <label class="custom-file-label" for="edit_image">Choose a new image</label>
                                        </div>
                                        <div class="mt-2">
                                            <img class="img-fluid" src="{{ asset($game->image) }}" style="height: 300px;" alt="Game Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edit_category" class="col-form-label">Category:</label>
                                    <select class="form-control" id="edit_category" name="edit_category" onchange="getValue(this.value)">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($game->category_id == $category->id) selected @endif>
                                                {{ $category->category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edit_subcategory" class="col-form-label">Subcategory:</label>
                                    <select class="form-control" id="edit_subcategory" name="edit_subcategory">
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" @if($game->subcategory_id == $subcategory->id) selected @endif>
                                                {{ $subcategory->subcategory }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edit_modes" class="col-form-label">Modes:</label>
                                    <select name="edit_modes" id="edit_modes" class="form-control">
                                        <option value="1" @if($game->modes == '1') selected @endif>Singleplayer</option>
                                        <option value="2" @if($game->modes == '2') selected @endif>Multiplayer</option>
                                        <option value="3" @if($game->modes == '3') selected @endif>Both</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edit_released_year" class="col-form-label">Released year:</label>
                                    <input type="text" class="form-control" id="edit_released_year" name="edit_released_year" value="{{ date('F j, Y', strtotime($game->released_year)) }}" readonly/>
                                </div>
                                <div class="form-group">
                                    <label for="edit_price" class="col-form-label">Price:</label>
                                    <input type="number" class="form-control" id="edit_price" name="edit_price" value="{{ $game->price }}" min="0" step="0.01" required="required"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content bg-body-light">
                        <div class="row justify-content-center push">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-fw fa-check mr-1"></i> Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END Game Edit -->
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
                    document.getElementById('edit_subcategory').innerHTML = subcategories;
                },
                error: function() {
                    alert('Error... 5000');
                }
            });
        }
    </script>
@endsection
