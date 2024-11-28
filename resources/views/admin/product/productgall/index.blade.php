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
                                <h4 class=" mb-3">Product Gallery List:-</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <a href="/createpgallery">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus"></i> &nbsp; Add Product Gall
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
                                            <th>Alt</th>
                                            <th>Product Id</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sr = 0;
                                        @endphp
                                        @foreach (App\Models\Productgall::get() as $date)
                                            @php
                                                $sr++;
                                            @endphp
                                            <tr>
                                                <td>{{ $sr }}</td>
                                                <td>
                                                    <img src="{{ url('admin/assets/uploads/product/gallery/' . $date->pimage) }}"
                                                        alt="" width="50px">
                                                </td>
                                                <td>{{ $date->alt }}</td>

                                                <td>
                                                    @foreach (App\Models\Product::get() as $data)
                                                        @if ($date->pid == $data->id)
                                                            {{ $data->name }}
                                                        @endif
                                                    @endforeach
                                                <td>
                                                    <a href="{{ url('deletepgall/' . $date->id . '/delete' ) }}">
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
