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

        .card.bg-primary {
            background-color: #007bff !important;
            /* Set primary color */
        }

        .card.text-white {
            color: #ffffff !important;
            /* Set text color to white */
        }

        .card-body h4 {
            font-weight: bold;
            /* Make the card title bold */
        }

        .card.bg-primary {
            background-color: #007bff !important;
            /* Set primary color */
        }

        .card .card-body,
        .card .card-body h4,
        .card .card-body p {
            color: white !important;
            /* Force white text color */
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
                        <div class="card text-center bg-success">
                            <div class="card-body">
                                <h4 class="card-title">Total Orders</h4>
                                <p class="card-text display-4" id="totalOrders">0</p>
                                <p class="card-text fs-6" id="totalAmount">₹0</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2: Customers -->
                    <div class="col-md-3">
                        <div class="card text-center bg-warning">
                            <div class="card-body">
                                <h4 class="card-title">Cash on delivery Orders</h4>
                                <p class="card-text display-4" id="totalCOD">0</p>
                                <p class="card-text fs-6" id="totalAmtCODOrders">₹0</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3: Revenue -->
                    <div class="col-md-3">
                        <div class="card text-center bg-info">
                            <div class="card-body">
                                <h4 class="card-title">Razorpay Orders</h4>
                                <p class="card-text display-4" id="totalRazorpay">0</p>
                                <p class="card-text fs-6" id="totalAmtRazorpayOrders">₹0</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4: Products -->
                    <div class="col-md-3">
                        <div class="card text-center bg-danger">
                            <div class="card-body">
                                <h4 class="card-title">Total Failed Orders</h4>
                                <p class="card-text display-4" id="totalFailedOrders">0</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="col-md-3">
                        <div class="card text-center bg-success">
                            <div class="card-body">
                                <h4 class="card-title">Stock Items</h4>
                                <p class="card-text display-4" id="inStock">0</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-center bg-danger">
                            <div class="card-body">
                                <h4 class="card-title">Out of stock items</h4>
                                <p class="card-text display-4" id="outOfStock">0</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <h3>Order List</h3> <!-- Order List Header -->
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


                        </div>
                    </div>
                </div>
                <!-- Horizontal Line -->
                <hr>

                <div class="row">
                    <div class="col-lg-12 col-12">
                        <h3>Out of Stock Product List</h3> <!-- Product List Header -->
                        <div class="table-responsive">
                            <table class="table table-hover mails m-0 table table-actions-bar table-centered"
                                id="outOfStockTable">
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
                        // Update the dashboard with the fetched data
                        $('#totalOrders').text(data.orders.total_orders);
                        $('#totalAmount').text('₹' + data.orders.total_amount);

                        $('#totalCOD').text(data.orders.total_cod_orders);
                        $('#totalRazorpay').text(data.orders.total_razorpay_orders);
                        $('#totalFailedOrders').text(data.orders.total_failed_orders);

                        $('#totalAmtCODOrders').text('₹' + data.orders.total_amt_cod_orders);
                        $('#totalAmtRazorpayOrders').text('₹' + data.orders.total_amt_razorpay_orders);

                        $('#inStock').text(data.products.in_stock);
                        $('#outOfStock').text(data.products.out_of_stock);
                        updateOrdersTable(data.orders.orders);
                        updateOutOfStockProducts(data.products.outOfStockProducts)
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Function to update the orders table with new data
            function updateOrdersTable(orders) {
                var tbody = $('#ordersTable tbody');
                tbody.empty(); // Clear any existing rows

                // Check if there are no orders
                if (orders.length === 0) {
                    tbody.append('<tr><td colspan="6" class="text-center">No orders found</td></tr>');
                    return; // Exit the function early
                }

                // Loop through the orders and create table rows
                orders.forEach(function(order, index) {
                    var row = $('<tr></tr>');

                    // Format the date (created_at) as YYYY-MM-DD
                    var formattedDate = new Date(order.created_at).toISOString().split('T')[0];
                    row.append('<td>' + order.id + '</td>');
                    row.append('<td>' + order.first_name + ' ' + order.last_name + '</td>');
                    row.append('<td>₹' + parseFloat(order.total_amount).toFixed(2) + '</td>');
                    row.append('<td>' + order.payment_method + '</td>');
                    row.append('<td>' + formattedDate + '</td>');
                    row.append('<td><a href="' + '{{ route('orders.view', '') }}' + '/' + order.id +
                        '" class="btn btn-primary btn-sm">View</a></td>');

                    // Append the row to the table body
                    tbody.append(row);
                });
            }

            function updateOutOfStockProducts(outOfStockProducts) {
                var tbody = $('#outOfStockTable tbody');
                tbody.empty(); // Clear any existing rows

                // Check if there are no out-of-stock products
                if (outOfStockProducts.length === 0) {
                    tbody.append(
                        '<tr><td colspan="11" class="text-center">No out-of-stock products found</td></tr>');
                    return; // Exit the function early
                }

                // Loop through the out-of-stock products and create table rows
                outOfStockProducts.forEach(function(product, index) {
                    var row = $('<tr></tr>');

                    // Append the data to the row
                    row.append('<td>' + (index + 1) + '</td>');
                    row.append('<td><img src="' + '{{ url('admin/assets/uploads/product/home/') }}' + '/' +
                        product.pimage + '" alt="" width="50px"></td>');
                    row.append('<td><img src="' + '{{ url('admin/assets/uploads/product/cover/') }}' + '/' +
                        product.pcover + '" alt="" width="80px"></td>');
                    row.append('<td>' + product.name + '</td>');
                    row.append('<td>' + product.order + '</td>');
                    row.append('<td>' + product.weight + '</td>');
                    row.append('<td>' + product.length + '</td>');
                    row.append('<td>' + product.breadth + '</td>');
                    row.append('<td>' + product.height + '</td>');
                    row.append('<td>' + (product.status == 0 ? 'Visible' : 'Hidden') + '</td>');
                    var actionColumn = '<td>' +
                        '<a href="' + '{{ url('updateproduct/') }}' + '/' + product.id + '/' + product
                        .name + '" class="btn btn-success btn-sm">Update</a>' +
                        ' <a href="' + '{{ url('deleteproduct/') }}' + '/' + product.id + '/' + product
                        .name +
                        '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this product?\')">' +
                        '<i class="fas fa-trash"></i> Delete' +
                        '</a>' +
                        '</td>';

                    row.append(actionColumn);

                    // Append the row to the table body
                    tbody.append(row);
                });
            }

        });
    </script>
