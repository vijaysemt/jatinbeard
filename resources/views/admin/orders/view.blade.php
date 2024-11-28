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
                            @foreach($orders as $order)
                                <tr>
                                    <li>Order Id : {{ $order->id }}</li>
                                    <li>Last Name : {{ $order->first_name }} {{ $order->last_name }}</li>
                                    <li>Amount : ${{ number_format($order->total_amount, 2) }}</li>
                                    <li>Payment : {{ $order->payment_method }}</li>
                                    <li>Email : {{ $order->email }}</li>
                                    <li>Phone : {{ $order->phone }}</li>
                                    <li>City : {{ $order->city }}</li>
                                    <li>House : {{ $order->house }}</li>
                                    <li>Postal Code : {{ $order->postal_code }}</li>
                                    <li>Zip : {{ $order->zip }}</li>
                                    <li>Messege : {{ $order->messege }}</li>
                                    <li>Address : {{ $order->address }}</li>
                                    <li>Payment : {{ $order->payment_method }}</li>
                                    <li>Date : {{ $order->created_at->format('Y-m-d') }}</li>
                                    <li>
                                        <h3>Order Items</h3>
                                        @foreach($order->orderItems as $item)
                                            <div class="row">
                                                <div class="col">Name : {{$item->product_name }}</div>
                                                <div class="col">Quantity : {{$item->quantity }}</div>
                                                <div class="col">Price : {{$item->product_price }}</div>
                                            </div>
                                        @endforeach
                                    </li>

                                    <a href="{{ route('orders.index') }}" class="btn btn-primary btn-sm">Back</a>


                                </tr>
                            @endforeach
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
