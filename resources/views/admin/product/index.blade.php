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
                                <h4 class=" mb-3">Product List:-</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <a href="/createproduct">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i> Add New Product
                                    </button>
                                </a>
                            </div>
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
                                            <th>Image</th>
                                            <th>Cover</th>
                                            <th>Name</th>
                                            <th>Order</th>
                                            <th>Weight</th>
                                            <th>Length</th>
                                            <th>Breadth</th>
                                            <th>Height</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sr = 0;
                                        @endphp
                                        @foreach (App\Models\Product::get() as $date)
                                            @php
                                                $sr++;
                                            @endphp
                                            <tr>
                                                <td>{{ $sr }}</td>
                                                <td>
                                                    <img src="{{ url('admin/assets/uploads/product/home/' . $date->pimage) }}"
                                                        alt="" width="50px">
                                                </td>
                                                <td>
                                                    <img src="{{ url('admin/assets/uploads/product/cover/' . $date->pcover) }}"
                                                        alt="" width="80px">
                                                </td>
                                                <td>{{ $date->name }}</td>
                                                <td> {{ $date->order }}  </td>
                                                <td> {{ $date->weight }}  </td>
                                                <td> {{ $date->length }}  </td>
                                                <td> {{ $date->breadth }}  </td>
                                                <td> {{ $date->height }}  </td>
                                                <td>
                                                    @if ($date->status == 0)
                                                        <span class="font-weight-bold text-primary">
                                                            @php
                                                                echo 'Visible!!';
                                                            @endphp
                                                        </span>
                                                    @else
                                                        <span class="font-weight-bold text-danger">
                                                            @php
                                                                echo 'Hidden!!';
                                                            @endphp
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('updateproduct/' . $date->id . '/' . $date->name) }}">
                                                        <span class="btn btn-success btn-sm">
                                                            <i class="far fa-edit"></i> Update
                                                        </span>
                                                    </a>
                                                    <a href="{{ url('deleteproduct/' . $date->id .'/' . $date->name) }}">
                                                        <span class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </span>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- end container-fluid -->
                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    © 2024 Jatin Beard Oil - Dashboard | All Rights Reserved. Designed by DigitalMagnetix
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
