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
                                <h4 class="header-title mb-3">Welcome!</h4>
                            </div>
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
                                © 2024 Jatin Beard Oil - Dashboard | All Rights Reserved. Designed by DigitalMagnetix
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
