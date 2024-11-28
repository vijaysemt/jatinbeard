
@include('header')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Payment Successful</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h5>Thank you for your payment!</h5>
                            <p>Your order has been successfully placed. Below are your payment details:</p>
                        </div>

                        <!-- Order Details -->
                        <div class="order-details">
                            <!--<p><strong>Order ID:</strong> {{ $order->id }}</p>
                            <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>-->
                            <p><strong>Transaction ID:</strong> {{ $order->transaction_id }}</p>

                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderItems as $item)
                                        <tr>
                                            <td>{{ $item->product_name }}</td>
                                            <td>₹{{ number_format($item->product_price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th>Total Amount</th>
                                        <th>₹{{ number_format($order->total_amount, 2) }}</th>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Payment Info -->
                            <!--<p><strong>Payment Status:</strong> {{ $order->payment_status }}</p>-->
                            <p><strong>Payment Date:</strong> {{ $order->created_at->format('d M, Y h:i A') }}</p>
                        </div>

                        <!-- Button to go back to homepage or view orders -->
                        <div class="mt-4 text-center">
                            <a href="{{ route('index') }}" class="btn btn-primary">Back to Home</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('footer')
