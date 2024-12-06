@include('header')

<div class="container my-5">
  <div class="row">
    <div class="col-xl-8 col-lg-8 mb-4">
      <!-- Checkout -->
      <div class="card shadow-0 border">
          <div class="container p-4">
              <h5 class="card-title mb-3">Checkout</h5>
              @if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @elseif (session('error'))
                  <div class="alert alert-danger">
                      {{ session('error') }}
                  </div>
              @endif
              <form id="orderForm" action="{{ route('cart.processCheckout') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12 mb-3">
                        <p class="mb-0">First name</p>
                        <div class="form-outline">
                            <input type="text" id="firstName" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" required />
                            @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <p class="mb-0">Last name</p>
                        <div class="form-outline">
                            <input type="text" id="lastName" name="last_name"  value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" required />
                            @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <p class="mb-0">Phone</p>
                        <div class="form-outline">
                            <input type="tel" id="phone" name="phone"  value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" required />
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <p class="mb-0">Email</p>
                        <div class="form-outline">
                            <input type="email" id="email" name="email"  value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Save address checkbox -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="save_address"  value="{{ old('save_address') }}"  id="saveAddress" />
                    <label class="form-check-label" for="saveAddress">Save this address</label>
                </div>

                <hr class="my-4" />
                <h5 class="card-title mb-3">Shipping info</h5>
                <div class="row">
                    <div class="col-sm-8 mb-3">
                        <p class="mb-0">Address</p>
                        <div class="form-outline">
                            <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" required />
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4 col-12 mb-3">
                        <p class="mb-0">City</p>
                        <div class="form-outline">
                            <input type="text" id="city" name="city"  value="{{ old('city') }}"  class="form-control @error('city') is-invalid @enderror" required />
                            @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 col-12 mb-3">
                        <p class="mb-0">House</p>
                        <div class="form-outline">
                            <input type="text" id="house" name="house"  value="{{ old('house') }}" class="form-control @error('house') is-invalid @enderror" required />
                            @error('house')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mb-3">
                        <p class="mb-0">State</p>
                        <div class="form-outline">
                            <input type="text" id="state" name="state"  value="{{ old('state') }}" class="form-control @error('state') is-invalid @enderror" required />
                            @error('state')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mb-3">
                        <p class="mb-0">Country</p>
                        <div class="form-outline">
                            <input type="text" id="country" name="country"  value="{{ old('country') }}" class="form-control @error('country') is-invalid @enderror" required />
                            @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mb-3">
                        <p class="mb-0">Postal code</p>
                        <div class="form-outline">
                            <input type="number" id="postalCode" name="postal_code"  value="{{ old('postal_code') }}" class="form-control @error('postal_code') is-invalid @enderror" required />
                            @error('postal_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mb-3">
                        <p class="mb-0">Zip</p>
                        <div class="form-outline">
                            <input type="number" id="zip" name="zip"  value="{{ old('zip') }}"  class="form-control @error('zip') is-invalid @enderror" required />
                            @error('zip')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-12  mb-3">
                        <p class="mb-0">Gst Number(Optional)</p>
                        <div class="form-outline">
                            <input type="number" id="gst" name="gst"  value="{{ old('gst') }}"  class="form-control @error('gst') is-invalid @enderror" />
                            @error('gst')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Message to seller -->
                <div class="mb-3">
                    <p class="mb-0">Message to seller</p>
                    <div class="form-outline">
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message"  value="{{ old('message') }}"   rows="2"></textarea>
                        @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <hr class="my-4" />
                <h5 class="card-title mb-3">Products</h5>
                <div class="product">
                    @foreach($cartItems as $index => $item)
                    <div class="row mb-3 ">
                        <div class="col-sm-4">
                            <p class="mb-0">Product name</p>
                            <div class="form-outline">
                                <input type="text" name="order_items[{{ $index }}][product_name]" value="{{ $item->product->name }}" class="form-control" required readonly />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <p class="mb-0">Product price</p>
                            <div class="form-outline">
                                <input type="text" name="order_items[{{ $index }}][product_price]" value="{{ $item->product->price }}" class="form-control" required readonly />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <p class="mb-0">Quantity</p>
                            <div class="form-outline">
                                <input type="number" name="order_items[{{ $index }}][quantity]" value="{{ $item->quantity }}" class="form-control" required readonly />
                            </div>
                        </div>
                        <input type="hidden" name="order_items[{{ $index }}][sku]" value="{{ $item->product->sku }}" required readonly />
                        <input type="hidden" name="order_items[{{ $index }}][hsn]" value="{{ $item->product->hsn }}" required readonly />
                        <input type="hidden" name="order_items[{{ $index }}][tax]" value="{{ $item->product->tax }}" required readonly />
                    </div>
                    @endforeach
                    <input type="hidden" name="total_length" value="{{ $total_length }}" required readonly />
                    <input type="hidden" name="total_breadth" value="{{ $total_breadth }}" required readonly />
                    <input type="hidden" name="total_height" value="{{ $total_height }}" required readonly />
                    <input type="hidden" name="total_weight" value="{{ $total_weight }}" class="form-control" required readonly />
                </div>

                <!-- Payment method -->
                <h5 class="card-title mb-3">Payment method</h5>
                <div class="form-check mb-3">
                    <input class="form-check-input @error('payment_method') is-invalid @enderror" type="radio" name="payment_method" id="cashOnDelivery" value="Cash on Delivery" required />
                    <label class="form-check-label" for="cashOnDelivery">Cash on Delivery</label>
                    @error('payment_method')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input @error('payment_method') is-invalid @enderror" type="radio" name="payment_method" id="razorpay" value="Razorpay" required />
                    <label class="form-check-label" for="razorpay">Razorpay</label>
                    @error('payment_method')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Total amount -->


                <div class="form-outline mb-3">
                    <p class="mb-0">Total Amount</p>
                    <input type="hidden" name="total_amount" id="total_amount" value="{{ $total + $totalDeliveryCharge }}">
                    <input type="text" id="total" class="form-control" value="{{ $total + $totalDeliveryCharge }}" readonly />
                </div>

                <button type="submit" class="btn btn-primary">Place order</button>
            </form>

          </div>
      </div>
      <!-- Checkout -->
    </div>
    <div class="col-xl-4 col-lg-4">
      <div class="ms-lg-4 mt-4 mt-lg-0">
        <h6 class="mb-3">Summary</h6>
        <div class="d-flex justify-content-between">
          <p class="mb-2">Total price:</p>
          <p class="mb-2">{{ number_format($total, 1) }}</p>
        </div>
        <div class="d-flex justify-content-between">
          <p class="mb-2">Delivery Charges:</p>
          <p class="mb-2">{{$totalDeliveryCharge}}</p>
        </div><br>
        <div class="d-flex justify-content-between align-items-center">
            <input type="text" name="coupon" id="coupon" class="form-control" placeholder="Enter Coupon Code">
            <button type="button" class="btn btn-primary mr-2" onclick="applyPromoCode()">Apply</button>
        </div>
        <div>
            <p id="coupon-message" style="color: green"></p>
        </div>
        <hr />
        <div>
            <p class="text-danger mb-2"><b>Inclusive of all taxes.</b></p>
        </div>
        <div class="d-flex justify-content-between">
          <p class="mb-2">Total price:</p>
          <p class="mb-2 fw-bold text-dark">₹<span id="total_price">{{number_format($total + $totalDeliveryCharge, 1) }}</span></p>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
  function applyPromoCode() {
    const couponInput = document.getElementById('coupon').value;
    fetch(`/coupons/get/${couponInput}`)
      .then(response => response.json())
      .then(data => {
        if (data) {
          const discountAmount = data.percentage ? (data.percentage / 100) * parseFloat(document.getElementById('total_amount').value) : data.price;
          const newTotal = parseFloat(document.getElementById('total_amount').value) - discountAmount;
          document.getElementById('total').value = newTotal.toFixed(2);
          document.getElementById('total_amount').value = newTotal;
          document.getElementById('total_price').innerHTML = newTotal;
          document.getElementById('coupon-message').innerHTML = 'Coupon applied successfully!';
        } else {
          alert('Invalid coupon code.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        console.log(response);
        alert('Failed to apply coupon.');
      });
  }
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

{{-- <script>
    document.getElementById('orderForm').onsubmit = function(e) {
        e.preventDefault(); // Prevent the form from submitting immediately

        var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

        if (paymentMethod === 'Razorpay') {
            // Prepare the total amount (Razorpay expects amount in paise)
            var totalAmount = document.getElementById('total_amount').value *100; // Convert to paise

            var options = {
                "key": "{{ config('services.razorpay.key') }}", // Add your Razorpay Key here
                "amount": totalAmount, // Total amount in paise
                "currency": "INR",
                "name": "JATINBEARD",
                "description": "Order Payment",
                "image": "https://your-company-logo-url.com", // Optional - Add your logo
                "handler": function (response) {
                    // When payment succeeds, append the payment_id to the form and submit it
                    var paymentIdInput = document.createElement('input');
                    paymentIdInput.setAttribute('type', 'hidden');
                    paymentIdInput.setAttribute('name', 'razorpay_payment_id');
                    paymentIdInput.setAttribute('value', response.razorpay_payment_id);

                    document.getElementById('orderForm').appendChild(paymentIdInput);
                    document.getElementById('orderForm').submit(); // Submit the form now
                },
                "prefill": {
                    "name": document.getElementById('firstName').value + ' ' + document.getElementById('lastName').value,
                    "email": document.getElementById('email').value,
                    "contact": document.getElementById('phone').value
                },
                "theme": {
                    "color": "#3399cc"
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        } else {
            // Submit the form for other payment methods (e.g., Cash on Delivery)
            document.getElementById('orderForm').submit();
        }
    };
</script> --}}

<script src="https://checkout.razorpay.com/v1/checkout.js"></script> <!-- Ensure Razorpay script is loaded -->

<script>
    document.getElementById('orderForm').onsubmit = function(e) {
        e.preventDefault(); // Prevent default form submission

        var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

        // Check if Razorpay is selected as the payment method
        if (paymentMethod === 'Razorpay') {
            // Retrieve total amount in INR and convert to paise for Razorpay
            var totalAmount = parseFloat(document.getElementById('total_amount').value) * 100; // Convert to paise

            // Razorpay checkout options
            var options = {
                "key": "{{ config('services.razorpay.key') }}", // Your Razorpay Key from the .env or config file
                "amount": totalAmount, // Razorpay expects amount in paise
                "currency": "INR",
                "name": "JATINBEARD", // Your company or app name
                "description": "Order Payment", // Payment description
                "image": "https://your-company-logo-url.com", // Optional logo for your business
                "handler": function (response) {
                    // Razorpay sends back the payment response, now append it to the form
                    var paymentIdInput = document.createElement('input');
                    paymentIdInput.setAttribute('type', 'hidden');
                    paymentIdInput.setAttribute('name', 'razorpay_payment_id');
                    paymentIdInput.setAttribute('value', response.razorpay_payment_id);

                    // Append the payment ID to the form and submit the form
                    document.getElementById('orderForm').appendChild(paymentIdInput);
                    document.getElementById('orderForm').submit(); // Submit the form with the Razorpay payment ID
                },
                "prefill": {
                    "name": document.getElementById('firstName').value + ' ' + document.getElementById('lastName').value, // Prefilled name
                    "email": document.getElementById('email').value, // Prefilled email
                    "contact": document.getElementById('phone').value // Prefilled phone number
                },
                "theme": {
                    "color": "#3399cc" // Custom theme color for Razorpay modal
                },
                "modal": {
                    "ondismiss": function() {
                        alert('Payment process was cancelled.');
                    }
                }
            };

            // Open Razorpay Checkout modal
            var rzp = new Razorpay(options);
            rzp.open();
        } else {
            // If the payment method is Cash on Delivery or other, submit the form directly
            document.getElementById('orderForm').submit();
        }
    };
</script>



@include('footer')
