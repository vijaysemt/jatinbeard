@extends('layouts.components.master')

<body>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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

        .small-text {
            font-size: 1.2rem;
        }

        .clickable {
            cursor: pointer;
        }


        
        /* .card.bg-primary {
            background-color: #007bff !important;
          
        }

        .card.text-white {
            color: #ffffff !important;
           
        }

        .card-body h4 {
            font-weight: bold;
            
        }

        .card.bg-primary {
            background-color: #007bff !important;
           
        }

        .card .card-body,
        .card .card-body h4,
        .card .card-body p {
            color: white !important;
           
        } */

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


                {{-- <div style="display: flex; gap: 20px; justify-content: center; align-items: center;">
                    <!-- Earnings Card -->
                    <div
                        style="background: #f6d4c5; border-radius: 10px; padding: 20px; width: 200px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
                        <h2 style="margin: 0; color: #FF5722;">$30,200</h2>
                        <p style="margin: 5px 0; font-size: 14px; color: #333;">All Earnings</p>
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                            <span style="font-size: 12px; color: #888;">% change</span>
                            <span style="font-size: 16px; color: #FF5722;">↑</span>
                        </div>
                    </div>

                    <!-- Page Views Card -->
                    <div
                        style="background: #d0f6df; border-radius: 10px; padding: 20px; width: 200px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
                        <h2 style="margin: 0; color: #00C853;">290+</h2>
                        <p style="margin: 5px 0; font-size: 14px; color: #333;">Page Views</p>
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                            <span style="font-size: 12px; color: #888;">% change</span>
                            <span style="font-size: 16px; color: #00C853;">↑</span>
                        </div>
                    </div>
                </div> --}}

                <div class="row mt-4">

                    <!-- Card 1: Orders -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">

                                <div class="text-start ms-3">
                                    <p class="card-text display-4 mb-0">
                                        <span id="totalOrders" class="fw-bold text-success">0</span>
                                        <small id="totalAmount" class="small-text text-muted">(₹0)</small>
                                    </p>
                                    <h4 class="card-title ">Total Orders</h4>
                                </div>
                                <!-- Icon -->
                                <div class="text-end">
                                    <i class="fa fa-shipping-fast text-success fs-3 fa-2x"></i>
                                </div>
                            </div>
                            <div class="card-footer bg-success clickable text-white text-decoration-none"
                                onclick="updateOrdersTable(1)">
                                View
                            </div>
                        </div>
                    </div>
                    <!-- Card 2: Customers -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">

                                <div class="text-start ms-3">
                                    <p class="card-text display-4 mb-0">
                                        <span id="totalCOD" class="fw-bold text-warning">0</span>
                                        <small id="totalAmtCODOrders" class="small-text text-muted">(₹0)</small>
                                    </p>
                                    <h4 class="card-title ">COD Orders</h4>
                                </div>
                                <!-- Icon -->
                                <div class="text-end">
                                    <i class="fa fa-money-bill-alt text-warning fs-3 fa-2x"></i>
                                </div>
                            </div>
                            <div class="card-footer bg-warning clickable text-white text-decoration-none"
                                onclick="updateOrdersTable(2)">
                                View
                            </div>
                        </div>

                    </div>
                    <!-- Card 3: Revenue -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">

                                <div class="text-start ms-3">
                                    <p class="card-text display-4 mb-0">
                                        <span id="totalRazorpay" class="fw-bold text-info">0</span>
                                        <small id="totalAmtRazorpayOrders" class="small-text text-muted">(₹0)</small>
                                    </p>
                                    <h4 class="card-title ">Razorpay Orders</h4>
                                </div>
                                <!-- Icon -->
                                <div class="text-end">
                                    <i class="fa fa-money-check text-info fs-3 fa-2x"></i>
                                </div>
                            </div>
                            <div class="card-footer bg-info clickable text-white text-decoration-none"
                                onclick="updateOrdersTable(3)">
                                View
                            </div>
                        </div>
                    </div>
                    <!-- Card 4: Products -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">

                                <div class="text-start ms-3">
                                    <p class="card-text display-4 mb-0">
                                        <span id="totalFailedOrders" class="fw-bold text-danger">0</span>

                                    </p>
                                    <h4 class="card-title ">Total Failed Orders</h4>
                                </div>
                                <!-- Icon -->
                                <div class="text-end">
                                    <i class="fa fa-exclamation-triangle  text-danger fs-3 fa-2x"></i>
                                </div>
                            </div>
                            <div class="card-footer bg-danger clickable text-white text-decoration-none"
                                onclick="updateOrdersTable(4)">
                                View
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="col-md-3">


                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">

                                <div class="text-start ms-3">
                                    <p class="card-text display-4 mb-0">
                                        <span id="inStock" class="fw-bold text-success">0</span>

                                    </p>
                                    <h4 class="card-title ">Stock Items</h4>
                                </div>
                                <!-- Icon -->
                                <div class="text-end">
                                    <i class="fa fa-store text-success fs-3 fa-2x"></i>
                                </div>
                            </div>
                            <div class="card-footer bg-success clickable text-white text-decoration-none"
                                onclick="updateStockProducts(1)">
                                View
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">

                                <div class="text-start ms-3">
                                    <p class="card-text display-4 mb-0">
                                        <span id="outOfStock" class="fw-bold text-danger">0</span>

                                    </p>
                                    <h4 class="card-title ">Out of stock items</h4>
                                </div>
                                <!-- Icon -->
                                <div class="text-end">
                                    <i class="fa fa-box text-danger fs-3 fa-2x"></i>
                                </div>
                            </div>
                            <div class="card-footer bg-danger clickable text-white text-decoration-none"
                                onclick="updateStockProducts(2)">
                                View
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">

                                <div class="text-start ms-3">
                                    <p class="card-text display-4 mb-0">
                                        <span id="outOfStock" class="fw-bold text-danger"></span>

                                    </p>
                                    <h4 class="card-title ">Track Order</h4>
                                </div>
                                <!-- Icon -->
                                <div class="text-end">
                                    <i class="fa fa-shipping-fast text-success fs-3 fa-2x"></i>
                                </div>
                            </div>
                            <div class="card-footer bg-success clickable text-white text-decoration-none"
                                onclick="trackOrder()">
                                View
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="item_list" hidden>
                    <div class="col-lg-12 col-12">
                        <h3 id="list_name">List</h3> <!-- Order List Header -->
                        <div class="table-responsive">
                            <table class="table table-hover mails m-0 table table-actions-bar table-centered"
                                id="ordersTable">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Name</th>
                                        <th>Order</th>
                                        <th>Payment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <table class="table table-hover mails m-0 table table-actions-bar table-centered"
                                id="stockTable">
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
                                    <!-- Data will be populated here -->
                                </tbody>


                            </table>

                        </div>
                        <div id="pagination-controls">
                            <!-- Pagination buttons will be dynamically added here -->
                        </div>
                    </div>
                </div>
                <!-- Horizontal Line -->
                <hr>




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
        let all_dashboard_data;
        let currentPage = 1; // Initially, we start at page 1
        let ordersPerPage = 5; // Number of orders to display per page
        $(document).ready(function() {

            fetchDashboardData(); // Make an AJAX request to fetch data

            flatpickr("#rangeCalendar", {
                mode: "range", // Enables range selection
                dateFormat: "Y-m-d", // Format of the selected date range
                defaultDate: [
                    new Date(new Date().getFullYear(), new Date().getMonth(),
                        1), // 1st of current month
                    new Date() // Today's date
                ],
                onChange: function(selectedDates, dateStr, instance) {
                    console.log("Selected Date Range:", dateStr);
                },
                onClose: function(selectedDates) {
                    console.log(selectedDates[0]);
                    if (selectedDates.length === 2) {
                        const startDate = selectedDates[0];
                        const endDate = selectedDates[1];

                        // Format as YYYY-MM-DD
                        const formattedStartDate =
                            `${startDate.getFullYear()}-${(startDate.getMonth() + 1).toString().padStart(2, '0')}-${startDate.getDate().toString().padStart(2, '0')}`;
                        const formattedEndDate =
                            `${endDate.getFullYear()}-${(endDate.getMonth() + 1).toString().padStart(2, '0')}-${endDate.getDate().toString().padStart(2, '0')}`;

                        console.log('startDate', formattedStartDate);
                        console.log('endDate', formattedEndDate);
                        // Make an AJAX request to fetch data based on the selected date range
                        fetchDashboardData(formattedStartDate, formattedEndDate);

                    }
                }
            });

            function fetchDashboardData(startDate = null, endDate = null) {
                $.ajax({
                    url: "{{ route('dashboard.data') }}",
                    type: "GET",
                    data: {
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(data) {
                        all_dashboard_data = data;
                        all_orders_data = data.orders;
                        all_products_data = data.products;
                        // Update the dashboard with the fetched data
                        $('#totalOrders').text(all_orders_data.total_orders);
                        $('#totalAmount').text('(₹' + all_orders_data.total_amount + ')');

                        $('#totalCOD').text(all_orders_data.total_cod_orders);
                        $('#totalRazorpay').text(all_orders_data.total_razorpay_orders);
                        $('#totalFailedOrders').text(all_orders_data.total_failed_orders);

                        $('#totalAmtCODOrders').text('(₹' + all_orders_data.total_amt_cod_orders + ')');
                        $('#totalAmtRazorpayOrders').text('(₹' + all_orders_data
                            .total_amt_razorpay_orders + ')');

                        $('#inStock').text(all_products_data.in_stock_count);
                        $('#outOfStock').text(all_products_data.out_of_stock_count);
                        updateOrdersTable(1);
                        // updateStockProducts(1)
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }



        });
        // Function to update the orders table with new data
        function updateOrdersTable(type, pageNumber = null) {
            console.log('type', type);
            let orders_data = [];
            let orders = []; // Example data for demonstration purposes
            let totalOrders = 0; // Total orders, this will be fetched from your backend or a variable

            // Based on type, select the appropriate order data
            if (type === 1) {
                $('#list_name').html('Orders List');
                orders_data = all_orders_data.orders;
            } else if (type === 2) {
                $('#list_name').html('Cash on Delivery Orders List');
                orders_data = all_orders_data.cod_orders;
            } else if (type === 3) {
                $('#list_name').html('Razorpay Orders List');
                orders_data = all_orders_data.razorpay_orders;
            } else if (type === 4) {
                $('#list_name').html('Failed Orders List');
                orders_data = all_orders_data.failed_orders;
            }

            totalOrders = orders_data.length; // Total number of orders available
            currentPage = pageNumber ? pageNumber : 1;
            // Handle pagination based on currentPage
            let startIndex = (currentPage - 1) * ordersPerPage;
            let endIndex = startIndex + ordersPerPage;
            let paginatedOrders = orders_data.slice(startIndex, endIndex); // Paginate the orders data
            $('#item_list').removeAttr('hidden');
            $('#ordersTable').removeAttr('hidden');
            $('#stockTable').attr('hidden', true);
            var tbody = $('#ordersTable tbody');
            tbody.empty(); // Clear any existing rows
            console.log('paginatedOrders', paginatedOrders);
            console.log('orders_data', orders_data);
            // Check if there are no orders
            if (paginatedOrders.length === 0) {
                tbody.append('<tr><td colspan="6" class="text-center">No orders found</td></tr>');
                return;
            }

            // Loop through the orders and create table rows
            paginatedOrders.forEach(function(order, index) {
                var row = $('<tr></tr>');

                // Format the date (created_at) as YYYY-MM-DD
                var formattedDate = new Date(order.created_at).toISOString().split('T')[0];

                row.append('<td>' + (startIndex + index + 1) + '</td>');
                row.append('<td>' + order.first_name + ' ' + order.last_name + '</td>');
                row.append('<td>₹' + parseFloat(order.total_amount).toFixed(2) + '</td>');
                row.append('<td>' + order.payment_method + '</td>');
                row.append('<td>' + formattedDate + '</td>');
                row.append('<td><a href="' + '{{ route('orders.view', '') }}' + '/' + order.id +
                    '" class="btn btn-primary btn-sm">View</a></td>');

                tbody.append(row);
            });

            // Update the pagination controls
            updatePaginationControls(totalOrders, type,1);
        }

        // Function to update pagination controls
        function updatePaginationControls(totalOrders, type,list_type=1) {
            let totalPages = Math.ceil(totalOrders / ordersPerPage); // Total pages required
            let paginationControls = $('#pagination-controls');
            paginationControls.empty(); // Clear existing pagination controls

            if(totalPages<=1) {
                return
            }
            // Add Previous button
            if (currentPage > 1) {
                paginationControls.append('<button class="btn btn-secondary m-1" onclick="changePage(' + type + ', ' + (
                    currentPage - 1) + ', ' + list_type + ')">Previous</button>');
            }

            // Add page numbers
            for (let i = 1; i <= totalPages; i++) {
                if (i === currentPage) {
                    paginationControls.append('<button class="btn btn-primary" disabled>' + i + '</button>');
                } else {
                    paginationControls.append('<button class="btn btn-secondary m-1" onclick="changePage(' + type + ', ' + i + ', ' + list_type + ')">' + i +
                        '</button>');
                }
            }

            // Add Next button
            if (currentPage < totalPages) {
                paginationControls.append('<button class="btn btn-secondary m-1" onclick="changePage(' + type + ', ' + (
                    currentPage + 1) + ', ' + list_type + ')">Next</button>');
            }
        }

        // Function to handle page change
        function changePage(type, pageNumber,list_type=1) {
            console.log('type',type);
            console.log('pageNumber',pageNumber);
            console.log('list_type',list_type);
            currentPage = pageNumber; // Set current page to the selected page
            if(list_type == 1) {
                updateOrdersTable(type,pageNumber); // Re-fetch and update the orders for the new page (1 refers to all orders type)
            }else {
                updateStockProducts(type,pageNumber);
            }
            
        }
       

        function updateStockProducts(type,pageNumber) {
            let products_data = [];
            if (type == 1) {
                $('#list_name').html('Stock Products List');
                products_data = all_products_data.in_stock;
            } else if (type == 2) {
                $('#list_name').html('Out of Stock Products List');
                products_data = all_products_data.out_of_stock;
            }

            $('#item_list').removeAttr('hidden');
            $('#stockTable').removeAttr('hidden');
            $('#ordersTable').attr('hidden', true);
            var tbody = $('#stockTable tbody');
            tbody.empty(); // Clear any existing rows

            // Check if there are no products
            if (products_data.length === 0) {
                tbody.append('<tr><td colspan="11" class="text-center">No products found</td></tr>');
                return; // Exit the function early
            }
            currentPage = pageNumber ? pageNumber : 1;
            // Calculate total products and slice data based on current page
            let totalProducts = products_data.length;
            let startIndex = (currentPage - 1) * ordersPerPage;
            let endIndex = startIndex + ordersPerPage;
            let paginatedProducts = products_data.slice(startIndex, endIndex); // Get products for the current page

            // Loop through the products and create table rows
            paginatedProducts.forEach(function(product, index) {
                var row = $('<tr></tr>');

                // Append the data to the row
                row.append('<td>' + (startIndex + index + 1) + '</td>');
                row.append('<td><img src="' + '{{ url('admin/assets/uploads/product/home/') }}' + '/' + product
                    .pimage + '" alt="" width="50px"></td>');
                row.append('<td><img src="' + '{{ url('admin/assets/uploads/product/cover/') }}' + '/' + product
                    .pcover + '" alt="" width="80px"></td>');
                row.append('<td>' + product.name + '</td>');
                row.append('<td>' + product.order + '</td>');
                row.append('<td>' + product.weight + '</td>');
                row.append('<td>' + product.length + '</td>');
                row.append('<td>' + product.breadth + '</td>');
                row.append('<td>' + product.height + '</td>');
                row.append('<td>' + (product.status == 0 ? 'Visible' : 'Hidden') + '</td>');

                var actionColumn = '<td>' +
                    '<a href="' + '{{ url('updateproduct/') }}' + '/' + product.id + '/' + product.name +
                    '" class="btn btn-success btn-sm">Update</a>' +
                    '</td>';

                row.append(actionColumn);

                // Append the row to the table body
                tbody.append(row);
            });

            // Update the pagination controls
            updatePaginationControls(totalProducts, 1,2);
        }

        function trackOrder() {
            
            window.open('https://jatinbeard.shiprocket.co/tracking', '_blank');
        }
    </script>
