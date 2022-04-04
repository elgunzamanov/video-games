@extends('layouts.master')
@section('title', 'Customers List')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Customers List</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Customers</li>
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
                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#customerAdd"
                        style="float: right">Add
                </button>
                <br/>
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $key => $customer)
                            <tr style="text-align: center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->getCountryName()->nicename }}</td>
                                <td>
                                    <button onclick="Update({{ $customer->id }})" class="btn btn-outline-warning btn-sm">Edit</button>
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

    <!-- Customer Add Modal -->
    <div class="modal fade" id="customerAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Customer Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addCustomer') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="add_name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="add_name" name="add_name" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="add_email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="add_email" name="add_email" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="add_phone" class="col-form-label">Phone:</label>
                            <input type="tel" class="form-control" id="add_phone" name="add_phone" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="add_country" class="col-form-label">Select Country:</label>
                            <select name="add_country" id="add_country" class="form-control">
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                                @endforeach
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
    <!-- END Customer Add Modal -->

    <!-- Customer Edit Modal -->
    <div class="modal fade" id="customerEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Customer Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('editCustomer') }}" method="POST">
                        @csrf
                        <input type="hidden" id="edit_id" name="edit_id"/>
                        <div class="form-group">
                            <label for="edit_name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="edit_name" name="edit_name" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="edit_email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="edit_email" name="edit_email" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="edit_phone" class="col-form-label">Phone:</label>
                            <input type="tel" class="form-control" id="edit_phone" name="edit_phone" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="edit_country" class="col-form-label">Select Country:</label>
                            <select name="edit_country" id="edit_country" class="form-control">
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                                @endforeach
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
    <!-- END Customer Edit Modal -->
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
                url: "/customers/view",
                data: {
                    _token: CSRF_TOKEN, id: id,
                },
                success: function(data) {
                    document.getElementById('edit_id').value = data.id;
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_email').value = data.email;
                    document.getElementById('edit_phone').value = data.phone;
                    document.getElementById('edit_country').value = data.country_id;
                    $('#customerEdit').modal('show');
                },
                error: function() {
                    alert('Error... 5000');
                }
            });
        }
    </script>
@endsection
