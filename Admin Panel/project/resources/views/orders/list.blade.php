@extends('layouts.master')
@section('title', 'Orders List')
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <!-- Quick Overview -->
            <div class="row row-deck">
                <div class="col-6 col-lg-3">
                    <a class="block block-rounded block-link-shadow text-center" href="be_pages_ecom_orders.html">
                        <div class="block-content py-5">
                            <div class="font-size-h3 font-w600 text-primary mb-1">78</div>
                            <p class="font-w600 font-size-sm text-muted text-uppercase mb-0">
                                Pending
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3">
                    <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content py-5">
                            <div class="font-size-h3 font-w600 mb-1">126</div>
                            <p class="font-w600 font-size-sm text-muted text-uppercase mb-0">
                                Today
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3">
                    <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content py-5">
                            <div class="font-size-h3 font-w600 mb-1">350</div>
                            <p class="font-w600 font-size-sm text-muted text-uppercase mb-0">
                                Yesterday
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3">
                    <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content py-5">
                            <div class="font-size-h3 font-w600 mb-1">89.752</div>
                            <p class="font-w600 font-size-sm text-muted text-uppercase mb-0">
                                This Month
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- END Quick Overview -->

            <!-- All Orders -->
            <div class="block block-rounded">
                @include('layouts.errors')
                <div class="block-header block-header-default">
                    <h3 class="block-title">All Orders</h3>
                    <div class="block-options">
                        <div class="dropdown">
                            <button type="button" class="btn btn-light" id="dropdown-ecom-filters" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Filters
                                <i class="fa fa-angle-down ml-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-ecom-filters">
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    Pending
                                    <span class="badge badge-primary badge-pill">78</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    Completed
                                    <span class="badge badge-secondary badge-pill">280</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    Canceled
                                    <span class="badge badge-secondary badge-pill">5</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                    All
                                    <span class="badge badge-secondary badge-pill">19k</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content bg-body-dark">
                    <!-- Search Form -->
                    <form action="be_pages_ecom_orders.html" method="POST" onsubmit="return false;">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-alt" id="dm-ecom-orders-search" name="dm-ecom-orders-search" placeholder="Search all orders..">
                        </div>
                    </form>
                    <!-- END Search Form -->
                </div>
                <div class="block-content">
                    <!-- All Orders Table -->
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped table-vcenter font-size-sm">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 100px;">ID</th>
                                <th class="d-none d-sm-table-cell text-center">Submitted</th>
                                <th>Status</th>
                                <th class="d-none d-xl-table-cell">Customer</th>
                                <th class="d-none d-xl-table-cell text-center">Products</th>
                                <th class="d-none d-sm-table-cell text-right">Total Price</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                                <tr>
                                    <td class="text-center">
                                        <a class="font-w600" href="be_pages_ecom_order.html">
                                            <strong>{{ $order->id }}</strong>
                                        </a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">{{ $order->created_at }}</td>
                                    <td class="font-size-base">
                                        {!! $order->status == '2' ? '<span class="badge badge-warning">Pending</span>' : ($order->status == '1' ? '<span class="badge badge-success">Completed</span>' : '<span class="badge badge-danger">Canceled</span>') !!}
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="font-w600" href="javascript:void(0)">{{ $order->getCustomerName()->name }}</a>
                                    </td>
                                    <td class="d-none d-xl-table-cell text-center">
                                        <a class="font-w600" href="{{ route('viewProducts', $order->id) }}">{{ $order->quantity }}</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-right">
                                        <strong>${{ $order->total_price }}</strong>
                                    </td>
                                    <td class="text-center font-size-base">
                                        <a class="btn btn-sm btn-alt-secondary" href="{{ route('viewProducts', $order->id) }}">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END All Orders Table -->
                </div>
            </div>
            <!-- END All Orders -->
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
