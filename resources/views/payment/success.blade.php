
@include('header')

<style>

.checkmark-circle {
  width: 100px;
  height: 100px;
  background-color: #4CAF50; /* Success green */
  border-radius: 50%;
  display: inline-block;
  position: relative;
}

.background-circle {
  width: 80px;
  height: 80px;
  background-color: white;
  border-radius: 50%;
  position: absolute;
  top: 10px;
  left: 10px;
}

.checkmark {
  display: block;
  position: absolute;
  top: 28px;
  left: 24px;
  width: 50px;
  height: 25px;
  transform: rotate(45deg);
}

.checkmark-stem {
    position: absolute;
    width: 7px;
    height: 35px;
    background-color: #4CAF50;
    left: 35px;
    top: -12px;
}

.checkmark-kick {
    position: absolute;
    width: 26px;
    height: 7px;
    background-color: #4CAF50;
    left: 16px;
    top: 23px;
}
</style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Payment Successful</h4>
                    </div>
                    <div class="card-body">
                       
                        <div class="text-center">
                            <div class="checkmark-circle">
                                <div class="background-circle"></div>
                                <div class="checkmark">
                                  <span class="checkmark-stem"></span>
                                  <span class="checkmark-kick"></span>
                                </div>
                              </div>
                            <h5>Thank you for your payment!</h5>
                            <p>Your order has been successfully placed. Below are your payment details:</p>
                        </div>

                        <!-- Order Details -->
                        <div class="order-details">
                            <div class="d-flex justify-content-between">
                                <div><strong>Order ID:</strong> {{ $order->razorpay_order_id }}</div>
                                <div><strong>Transaction/Shipment ID:</strong> {{ $order->transaction_id ? $order->transaction_id : $order->shipment_id }}</div>
                            </div>

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
                                    @if( $order->payment_method == 'Cash on Delivery')
                                    <tr>
                                        <td>Delivery Charge</td>
                                        <td>₹50</td>
                                    </tr>
                                    @endif
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
