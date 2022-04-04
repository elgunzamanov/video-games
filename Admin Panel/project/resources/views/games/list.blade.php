@extends('layouts.master')
@section('title', 'Games List')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Games List</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Games</li>
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
                <a href="{{ route('newGame') }}" class="btn btn-outline-info btn-sm" style="float: right">Add</a>
                <br/>
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($games as $key => $game)
                            <tr style="text-align: center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $game->name }}</td>
                                <td>{{ $game->price }} $</td>
                                <td>{!! $game->status == '1' ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Deactive</span>' !!}</td>
                                <td>
                                    <a href="{{ route('getGame', $game->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
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
