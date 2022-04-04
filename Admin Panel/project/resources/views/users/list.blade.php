@extends('layouts.master')
@section('title', 'Users List')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Users List</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Users</li>
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
                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#userAdd" data-whatever="@getbootstrap" style="float: right">Add</button>
                <br/>
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr style="text-align: center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{!! $user->status == '1' ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Deactive</span>' !!}</td>
                                <td>
                                    <button onclick="Update({{ $user->id }})" class="btn btn-outline-warning btn-sm">Edit</button>
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

    <!-- User Add Modal -->
    <div class="modal fade" id="userAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addUser') }}" method="POST">
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
                            <label for="add_position" class="col-form-label">Position:</label>
                            <input type="text" class="form-control" id="add_position" name="add_position" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="add_roles" class="col-form-label">Role:</label>
                            <select id="add_roles" name="add_roles" required="required" class="form-control">
                                <option value="2">Admin</option>
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
    <!-- END User Add Modal -->

    <!-- User Edit Modal -->
    <div class="modal fade" id="userEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('editUser') }}" method="POST">
                        @csrf
                        <input type="hidden" id="edit_id" name="edit_id"/>
                        <div class="form-group">
                            <label for="edit_name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="edit_name" name="edit_name" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="edit_position" class="col-form-label">Position:</label>
                            <input type="text" class="form-control" id="edit_position" name="edit_position" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="edit_email" class="col-form-label">Email:</label>
                            <input type="email" onblur="Check(this.value)" class="form-control" id="edit_email" name="edit_email" required="required"/>
                            <span id="email-check"></span>
                        </div>
                        <div class="form-group">
                            <label for="edit_password" class="col-form-label">Password:</label>
                            <input type="text" class="form-control" id="edit_password" name="edit_password"/>
                        </div>
                        <div class="form-group">
                            <label for="edit_roles" class="col-form-label">Role:</label>
                            <select class="form-control" id="edit_roles" name="edit_roles"></select>
                        </div>
                        <div class="form-group">
                            <label for="edit_status" class="col-form-label">Status:</label>
                            <select class="form-control" id="edit_status" name="edit_status"></select>
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
    <!-- END User Edit Modal -->
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
                url: "/users/view",
                data: {
                    _token: CSRF_TOKEN, id: id,
                },
                success: function(data) {
                    let roles = `
                        <option value="2">Admin</option>
                    `;

                    let status = `
                        <option value="1" ${data.status === '1' ? 'selected="selected"' : ''}>Active</option>
                        <option value="0" ${data.status === '0' ? 'selected="selected"' : ''}>Deactive</option>
                    `;

                    document.getElementById('edit_id').value = data.id;
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_email').value = data.email;
                    document.getElementById('edit_position').value = data.position;
                    document.getElementById('edit_roles').innerHTML = roles;
                    document.getElementById('edit_status').innerHTML = status;
                    $('#userEdit').modal('show');
                },
                error: function() {
                    alert('Error... 5000');
                }
            });
        }

        const Check = (email) => {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: "/users/email-check",
                data: {
                    _token: CSRF_TOKEN, email: email,
                },
                success: function(data) {
                    document.getElementById('email-check').innerHTML = 'This email has already been used!';
                    document.getElementById('update').disabled = true;
                },
                error: function() {
                    alert('Error... 5000');
                }
            });
        }
    </script>
@endsection
