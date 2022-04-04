@extends('layouts.master')
@section('title', 'Sales List')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Sales List</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Sales</li>
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
                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#saleAdd"
                        style="float: right">Add
                </button>
                <br/>
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $key => $sale)
                            <tr style="text-align: center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $sale->getGameInfo()->name }}</td>
                                <td>{{ $sale->getGameInfo()->price }}</td>
                                <td>{{ $sale->stock }}</td>
                                <td>{!! $sale->status == '1' ? '<span class="badge badge-success">Available</span>' : '<span class="badge badge-danger">Out of stock</span>' !!}</td>
                                <td>
                                    <button onclick="Update({{ $sale->id }})" class="btn btn-outline-warning btn-sm">Edit</button>
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

    <!-- Sale Add Modal -->
    <div class="modal fade" id="saleAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sale Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addSale') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="add_game" class="col-form-label">Product Name:</label>
                            <select name="add_game" id="add_game" class="form-control">
                                @foreach($games as $game)
                                    <option value="{{ $game->id }}">{{ $game->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="add_product_info">Product Info</label>
                            <textarea class="form-control" id="add_product_info" name="add_product_info" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="add_stock">Stock:</label>
                            <input type="number" min="1" class="form-control" id="add_stock" name="add_stock" value="1" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="add_discount">Discount:</label>
                            <input type="number" min="0" class="form-control" id="add_discount" name="add_discount" value="0" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="add_status" class="col-form-label">Status:</label>
                            <select name="add_status" id="add_status" class="form-control">
                                <option value="1">Available</option>
                                <option value="0">Out of stock</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Sale Add Modal -->

    <!-- Sale Edit Modal -->
    <div class="modal fade" id="saleEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sale Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('editSale') }}" method="POST">
                        @csrf
                        <input type="hidden" id="edit_id" name="edit_id"/>
                        <div class="form-group">
                            <label for="edit_product_info">Product Info</label>
                            <textarea class="form-control" id="edit_product_info" name="edit_product_info" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_price">Price:</label>
                            <input type="number" min="1" step=".01" class="form-control" id="edit_price" name="edit_price" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="edit_stock">Stock:</label>
                            <input type="number" min="1" class="form-control" id="edit_stock" name="edit_stock" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="edit_discount">Discount:</label>
                            <input type="number" min="0" class="form-control" id="edit_discount" name="edit_discount" value="0" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="edit_status" class="col-form-label">Status:</label>
                            <select name="edit_status" id="edit_status" class="form-control">
                                <option value="1">Available</option>
                                <option value="0">Out of stock</option>
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
    <!-- END Sale Edit Modal -->
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
                url: "/sales/view",
                data: {
                    _token: CSRF_TOKEN, id: id,
                },
                success: function(data) {
                    console.log(data);
                    document.getElementById('edit_id').value = data['sale'].id;
                    document.getElementById('edit_product_info').value = data['sale'].product_info;
                    document.getElementById('edit_price').value = data['game'].price;
                    document.getElementById('edit_stock').value = data['sale'].stock;
                    document.getElementById('edit_discount').value = data['sale'].discount;
                    document.getElementById('edit_status').value = data['sale'].status;
                    $('#saleEdit').modal('show');
                },
                error: function() {
                    alert('Error... 5000');
                }
            });
        }
    </script>
@endsection
