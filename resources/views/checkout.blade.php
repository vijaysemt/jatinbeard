@include('header')
<style>
    body {
        background-color: rgb(238 236 236)
    }

    #form_div {
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        margin: 20px 0;
        background-color: #f9f9f9
    }

    .form-group.required .control-label:after {
        content: "*";
        color: red;
    }
</style>
<div class="container my-5">
    <div class="row">
        <div class="col-xl-2 col-lg-2 mb-4">
        </div>
        <div class="col-xl-8 col-lg-8 mb-4" id='form_div'>
            <!-- Checkout -->
            <div class="card shadow-0 border">
                <div class="container p-4">
                    <h5 class="card-title mb-3">Checkout</h5>
                    @if (session('success'))
                        <!--<div class="alert alert-success">
                      {{ session('success') }}
                  </div>-->
                        <center>
                            <div id="alert-box"
                                class="alert alert-success d-flex align-items-center justify-content-between"
                                style="border-radius: 30px; padding: 15px; font-size: 16px; color: green; width: 61%; margin: 20px auto; text-align: center;">
                                <div>
                                    <i class="fas fa-check-circle"
                                        style="margin-right: 8px;"></i>{{ session('success') }}
                                </div>
                                <button type="button" class="btn-close" style="border: none; background: transparent;"
                                    onclick="this.parentElement.style.display='none';">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </center>
                    @elseif (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form class="form-group required" id="orderForm" action="{{ route('cart.processCheckout') }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-12 mb-3">
                                <label class="control-label mb-0">Enter Pincode of Location</label>
                                <div class="form-outline">
                                    <input type="number" id="pincode" name="zip" value="{{ old('zip') }}"
                                        class="form-control @error('zip') is-invalid @enderror" required />
                                    @error('zip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="control-label mb-0">First name</label>
                                <div class="form-outline">
                                    <input type="text" id="firstName" name="first_name"
                                        value="{{ old('first_name') }}"
                                        class="form-control @error('first_name') is-invalid @enderror" required />
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="control-label mb-0">Last name</label>
                                <div class="form-outline">
                                    <input type="text" id="lastName" name="last_name" value="{{ old('last_name') }}"
                                        class="form-control @error('last_name') is-invalid @enderror" required />
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="control-label mb-0">Phone</label>
                                <div class="form-outline">
                                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                        class="form-control @error('phone') is-invalid @enderror" required />
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="control-label mb-0">Email</label>
                                <div class="form-outline">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" required />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        {{-- <hr class="my-4" />
                        <h5 class="card-title mb-3">Shipping info</h5> --}}
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="control-label mb-0">Flat,house number,floor,bulding</label>
                                <div class="form-outline">
                                    <input type="text" id="address" name="address" value="{{ old('address') }}"
                                        class="form-control @error('address') is-invalid @enderror" required />
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="control-label mb-0">Area,street,sector,village</label>
                                <div class="form-outline">
                                    <input type="text" id="house" name="house" value="{{ old('house') }}"
                                        class="form-control @error('house') is-invalid @enderror" required />
                                    @error('house')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6 col-12 mb-3">
                                <label class="control-label mb-0">City</label>
                                <div class="form-outline">
                                    <input type="text" id="city" name="city" value="{{ old('city') }}"
                                        class="form-control @error('city') is-invalid @enderror" required readonly />
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6 col-12 mb-3">
                                <label class="control-label mb-0">State</label>
                                <div class="form-outline">
                                    <input type="text" id="state" name="state" value="{{ old('state') }}"
                                        class="form-control @error('state') is-invalid @enderror" required readonly />
                                    @error('state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="control-label mb-0">Country</label>
                                <div class="form-outline">
                                    <input type="text" id="country" name="country"
                                        value="{{ old('country') }}"
                                        class="form-control @error('country') is-invalid @enderror" required />
                                    @error('country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!--<hr class="my-4" />-->
                            <h5 class="card-title mb-3" style='display:none'>Products</h5>
                            <div class="product" style='display:none'>
                                @foreach ($cartItems as $index => $item)
                                    <div class="row mb-3 ">
                                        <div class="col-sm-4">
                                            <label class="control-label mb-0">Product name</label>
                                            <div class="form-outline">
                                                <input type="hidden"
                                                    name="order_items[{{ $index }}][product_name]"
                                                    value="{{ $item->product->name }}" class="form-control" required
                                                    readonly />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label mb-0">Product price</label>
                                            <div class="form-outline">
                                                <input type="hidden"
                                                    name="order_items[{{ $index }}][product_price]"
                                                    value="{{ $item->product->price }}" class="form-control" required
                                                    readonly />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label mb-0">Quantity</label>
                                            <div class="form-outline">
                                                <input type="hidden"
                                                    name="order_items[{{ $index }}][quantity]"
                                                    value="{{ $item->quantity }}" class="form-control" required
                                                    readonly />
                                            </div>
                                        </div>
                                        <input type="hidden" name="order_items[{{ $index }}][sku]"
                                            value="{{ $item->product->sku }}" required readonly />
                                        <input type="hidden" name="order_items[{{ $index }}][hsn]"
                                            value="{{ $item->product->hsn }}" required readonly />
                                        <input type="hidden" name="order_items[{{ $index }}][tax]"
                                            value="{{ $item->product->tax }}" required readonly />
                                    </div>
                                @endforeach
                                <input type="hidden" name="total_length" value="{{ $total_length }}" required
                                    readonly />
                                <input type="hidden" name="total_breadth" value="{{ $total_breadth }}" required
                                    readonly />
                                <input type="hidden" name="total_height" value="{{ $total_height }}" required
                                    readonly />
                                <input type="hidden" name="total_weight" value="{{ $total_weight }}"
                                    class="form-control" required readonly />
                            </div>

                            <!-- Payment method -->

                            <h5 class="card-title mb-3">Payment method</h5>
                            <div class="form-check mb-3">
                                <input class="form-check-input @error('payment_method') is-invalid @enderror"
                                    type="radio" name="payment_method" id="cashOnDelivery"
                                    value="Cash on Delivery" required />
                                <label class="form-check-label" for="cashOnDelivery">Cash on Delivery</label>
                                @error('payment_method')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input @error('payment_method') is-invalid @enderror"
                                    type="radio" name="payment_method" id="razorpay" value="Razorpay" required
                                    checked />
                                <label class="form-check-label" for="razorpay">Razorpay</label>
                                @error('payment_method')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Total amount -->
                            <h6 class="card-title mb-3">Total Amount : ₹ {{ $total + $totalDeliveryCharge }}</h6>
                            <input type="hidden" name="total_amount" id="total_amount"
                                value="{{ $total + $totalDeliveryCharge }}">


                            <button type="submit" class="btn btn-primary" id="place_order">Place order</button>
                            <input type="hidden" name="razorpay_payment_id" value="pay_PQJGzp24f7HlnZ">
                    </form>

                </div>
            </div>
            <!-- Checkout -->
        </div>
        <div class="col-xl-2 col-lg-2 mb-4">
        </div>

    </div>
</div>



@include('footer')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $(document).ready(function() {
        let total_amt = "{{ $total + $totalDeliveryCharge }}";
        console.log('myVariable', total_amt);

        $('#place_order').on('click', function(e) {
            e.preventDefault();
            let paymentMethod = $('input[name="payment_method"]:checked').val();

            // Check if Razorpay is selected as the payment method
            if (paymentMethod === 'Razorpay') {
                $.ajax({
                    url: '/create-order',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    contentType: 'application/json',
                    data: JSON.stringify({
                        amount: total_amt
                    }),
                    success: function(data) {
                        var options = {
                            key: data.key,
                            amount: total_amt, // Amount in paise
                            currency: "INR",
                            name: "JATINBEARD",
                            description: "Order Payment",
                            order_id: data.order_id, // Order ID from Laravel
                            handler: function(response) {
                                $.ajax({
                                    url: '/verify-payment',
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    contentType: 'application/json',
                                    data: JSON.stringify({
                                        razorpay_payment_id: response
                                            .razorpay_payment_id,
                                        razorpay_order_id: response
                                            .razorpay_order_id,
                                        razorpay_signature: response
                                            .razorpay_signature
                                    }),
                                    success: function(verification) {
                                        if (verification.error) {
                                            alert(verification.error);
                                        } else {
                                            console.log(
                                                "razorpay_payment_id:" +
                                                response
                                                .razorpay_payment_id
                                                );
                                            console.log(
                                                "razorpay_order_id:" +
                                                response
                                                .razorpay_order_id);

                                            // Append Razorpay payment details to the form
                                            $('<input>').attr({
                                                type: 'hidden',
                                                name: 'razorpay_payment_id',
                                                value: response
                                                    .razorpay_payment_id
                                            }).appendTo(
                                                '#orderForm');

                                            $('<input>').attr({
                                                type: 'hidden',
                                                name: 'razorpay_order_id',
                                                value: response
                                                    .razorpay_order_id
                                            }).appendTo(
                                                '#orderForm');

                                            // Submit the form with the Razorpay payment ID
                                            $('#orderForm').submit();
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(
                                            'Payment verification failed:',
                                            error);
                                    }
                                });
                            },
                            "prefill": {
                                "name": $('#firstName').val() + ' ' + $('#lastName')
                                    .val(),
                                "email": $('#email').val(),
                                "contact": $('#phone').val()
                            },
                            "theme": {
                                "color": "#3399cc"
                            },
                            "modal": {
                                "ondismiss": function() {
                                    alert('Payment process was cancelled.');
                                }
                            }
                        };

                        var rzp = new Razorpay(options);
                        rzp.open();
                    },
                    error: function(xhr, status, error) {
                        console.error('Order creation failed:', error);
                    }
                });
            } else {
                // If the payment method is Cash on Delivery or other, submit the form directly
                $('#total_amount').val(total_amt);  //set amount again for security reason
                setTimeout(() => {
                    $('#orderForm').submit();
                }, 10);
                
            }
        });

        // pincode api to fetch location data

        $('#pincode').on('focusout', function() {
            const pincode = $.trim($(this).val()); // Get and trim pincode value

            if (pincode.length === 6) {
                $.ajax({
                    url: `https://api.postalpincode.in/pincode/${pincode}`,
                    method: 'GET',
                    success: function(data) {
                        if (data[0].Status === "Success") {
                            // Get the first post office entry
                            const postOffice = data[0].PostOffice[0];

                            // Populate city, state, and country fields
                            $('#city').val(postOffice.District);
                            $('#state').val(postOffice.State);
                            $('#country').val(postOffice.Country);
                        } else {
                            alert('Invalid Pin Code. Please try again.');
                            $('#city').val('');
                            $('#state').val('');
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                        alert('Failed to fetch location details. Please try again later.');
                    }
                });
            } else {
                // Clear fields if pincode is invalid
                $('#city').val('');
                $('#state').val('');
            }
        });
    });
</script>





