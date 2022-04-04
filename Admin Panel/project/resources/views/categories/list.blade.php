@extends('layouts.master')
@section('title', 'Categories List')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Categories List</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Categories</li>
                            <li class="breadcrumb-item active" aria-current="page">List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Dynamic Table Full -->
            <div class="block block-rounded">
                <div class="block-header block-header-default"></div>
                @include('layouts.errors')
                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#subcategoryAdd"
                        style="float: right">Add Subcategory
                </button>
                <button type="button" class="btn btn-outline-info btn-sm mr-4" data-toggle="modal" data-target="#categoryAdd"
                        style="float: right">Add Category
                </button>
                <br/>
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategories as $key => $subcategory)
                            <tr style="text-align: center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $subcategory->getCategoryName()->category }}</td>
                                <td>{{ $subcategory->subcategory }}</td>
                                <td>{!! $subcategory->status == '1' ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Deactive</span>' !!}</td>
                                <td>
                                    <button onclick="Update({{ $subcategory->id }})" class="btn btn-outline-warning btn-sm">Edit</button>
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

    <!-- Category Add Modal -->
    <div class="modal fade" id="categoryAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addCategory') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="add_category" class="col-form-label">Category:</label>
                            <input type="text" class="form-control" id="add_category" name="add_category" required="required"/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Category Add Modal -->

    <!-- Subcategory Add Modal -->
    <div class="modal fade" id="subcategoryAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subcategory Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addSubcategory') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="select_category" class="col-form-label">Category:</label>
                            <select name="select_category" id="select_category" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="add_subcategory" class="col-form-label">Subcategory:</label>
                            <input type="text" class="form-control" id="add_subcategory" name="add_subcategory" required="required"/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Subcategory Add Modal -->

    <!-- Category Edit Modal -->
    <div class="modal fade" id="categoryEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('editCategory') }}" method="POST">
                        @csrf
                        <input type="hidden" id="edit_id" name="edit_id"/>
                        <div class="form-group">
                            <label for="edit_category" class="col-form-label">Category:</label>
                            <input type="text" class="form-control" id="edit_category" name="edit_category"/>
                        </div>
                        <div class="form-group">
                            <label for="edit_subcategory" class="col-form-label">Subcategory:</label>
                            <input type="text" class="form-control" id="edit_subcategory" name="edit_subcategory"/>
                        </div>
                        <div class="form-group">
                            <label for="edit_status" class="col-form-label">Status:</label>
                            <select class="form-control" id="edit_status" name="edit_status">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="update" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Category Edit Modal -->
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}"/>
@endsection

@section('js')
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>

    <!-- My JS Code -->
    <script>
        const Update = (id) => {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "/categories/view",
                data: {
                    _token: CSRF_TOKEN, id: id,
                },
                success: function(data) {
                    document.getElementById('edit_id').value = data['subcategory'].id;
                    document.getElementById('edit_category').value = data['category'].category;
                    document.getElementById('edit_subcategory').value = data['subcategory'].subcategory;
                    document.getElementById('edit_status').value = data['subcategory'].status;
                    $('#categoryEdit').modal('show');
                },
                error: function() {
                    alert('Error... 5000');
                }
            });
        }
    </script>
@endsection
