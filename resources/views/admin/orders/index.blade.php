@include('layouts.components.master')

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            @include('layouts.components.topbar')
        </div>
        <!-- end Topbar --> <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            @include('layouts.components.sidebar')
            <!-- End Sidebar -->
            <div class="clearfix"></div>
            <!-- Left Sidebar End -->
        </div>
        <!-- END wrapper -->

        <div class="content-page">
            <div class="content">
                <!-- Start container-fluid -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <h4 class=" mb-3">Orders List:-</h4>
                            </div>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                    <!-- end row -->

                    <!-- end row -->
                    <!-- start  -->
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="table-responsive">
                                <table class="table table-hover mails m-0 table table-actions-bar table-centered">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>Name</th>
                                            <th>Order</th>
                                            <th>Payment</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                                <td>${{ number_format($order->total_amount, 2) }}</td>
                                                <td>{{ $order->payment_method }}</td>
                                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <a href="{{ route('orders.view', $order->id) }}"
                                                        class="btn btn-primary btn-sm">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Pagination links -->
                                <div class="d-flex justify-content-end">
                                    {{ $orders->links('pagination::bootstrap-4') }}
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end container-fluid -->

                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    © 2024 Jatin Beard Oil - Dashboard | All Rights Reserved. Designed by
                                    DigitalMagnetix
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- end Footer -->
                    <!-- Button trigger modal -->


                </div>
                <!-- end content -->
            </div>
            <!-- END content-page -->



            @include('layouts.components.footer-cdn-master')
