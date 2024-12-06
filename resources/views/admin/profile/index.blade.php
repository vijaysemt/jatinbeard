@extends('layouts.components.master')

    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                @include('layouts.components.topbar')
            </div>
            <!-- end Topbar -->
            <div class="left-side-menu">
                @include('layouts.components.sidebar')
            <!-- End Sidebar -->
            <div class="clearfix"></div>
        </div>

        <div class="content-page">
            <div class="content">
                <!-- Start container-fluid -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div>
                                <h4 class="header-title mb-3">Jatin Beard Oil - Profile!</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                     <!-- start  -->
                     <div class="row  my-5">
                        <div class="col-md-5 my-auto">
                            <img src="{{url('admin/assets/images/security.svg')}}" class="img-fluid mb-md-0 mb-4">
                        </div>
                        <div class="col-md-7">
                            @foreach(App\Models\Users::get() as $date)
                            <form action="https://coderthemes.com/simple/layouts/vertical/mt-3" class="p-2">
                                <div class="form-group">
                                    <label for="username">Name</label>
                                    <input class="form-control input-lg" type="text" id="username" value="{{$date->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control input-lg" type="email" id="emailaddress" value="{{$date->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control input-lg" type="text" value="{{$date->password}}">
                                </div>

                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Update </button>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container-fluid -->



                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                © 2024 2024 Jatin Beard Oil - Dashboard | All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
            <!-- end content -->
        </div>
        <!-- END content-page -->
    </div>
    <!-- END wrapper -->

    @include('layouts.components.footer-cdn-master')
