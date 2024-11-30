@extends('layouts.components.master')

<body>
   


    <style>
        .card {
            border: 1px solid #f0f0f0;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            color: #6c757d;
            font-size: 1.25rem;
        }

        .card-text {
            color: #343a40;
            font-weight: bold;
        }
    </style>
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
                <div class="row mt-4">
                    <div class="col-md-4">
                        <label for="rangeCalendar">Select Date Range:</label>
                        <input type="text" id="rangeCalendar" class="form-control" placeholder="Select Date Range" />
                    </div>
                </div>
                
                <div class="row mt-4">
                    <!-- Card 1: Orders -->
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Total Orders</h4>
                                <p class="card-text display-4">150</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2: Customers -->
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Cash on delivery Orders</h4>
                                <p class="card-text display-4">320</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3: Revenue -->
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Razorpay Orders</h4>
                                <p class="card-text display-4">12</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4: Products -->
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Total Amount</h4>
                                <p class="card-text display-4">85</p>
                            </div>
                        </div>
                    </div>
 <hr class="my-4" />
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Stock Items</h4>
                                <p class="card-text display-4">85</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Out of stock items</h4>
                                <p class="card-text display-4">85</p>
                            </div>
                        </div>
                    </div>
                </div>


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

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#rangeCalendar", {
            mode: "range", // Enables range selection
            dateFormat: "Y-m-d", // Format of the selected date range
            defaultDate: [
                new Date(new Date().getFullYear(), new Date().getMonth(), 1), // 1st of current month
                new Date() // Today's date
            ],
            onChange: function(selectedDates, dateStr, instance) {
                console.log("Selected Date Range:", dateStr);
            }
        });
    </script>
