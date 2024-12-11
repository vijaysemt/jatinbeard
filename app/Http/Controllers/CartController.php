<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\Product;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Services\ShiprocketService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Add this line to import the Log facade
use App\Traits\HandlesGuestUserId;

class CartController extends Controller
{
    // public function getGuestUserId()
    // {
    //     if (!session()->has('guest_user_id')) {
    //         // Generate a random integer as guest user ID
    //         $guestUserId = random_int(100000, 999999);

    //         // Store it in the session
    //         session(['guest_user_id' => $guestUserId]);
    //     }

    //     return session('guest_user_id');
    // }

    use HandlesGuestUserId;


    // Display the cart items
    public function index()
    {
        $guestUserId = $this->getGuestUserId();
        $cartItems = Cart::where('user_id', $guestUserId)->with('product')->get();
        $totalQuantity = $cartItems->sum('quantity');
        $totalPriceOff = $cartItems->sum(function ($item) {
            return max($item->product->oprice - $item->product->price, 0) * $item->quantity;
        });
        // Fetch recommended products, excluding those already in the cart
        $cartProductIds = $cartItems->pluck('product_id');
        $recommendedProducts = Product::whereNotIn('id', $cartProductIds)->inRandomOrder()->take(3)->get();
        // Get the highest delivery charge
        $shippingCharge = $cartItems->max(function ($item) {
            return $item->product->delivery;
        });
        $total = $cartItems->sum(function ($item) {
            return $item->product->oprice * $item->quantity;
        });
        $subtotal = $total - $totalPriceOff;
        $payabletotal = $subtotal + $shippingCharge;
        return view('cart', compact('cartItems', 'total', 'totalQuantity', 'totalPriceOff', 'recommendedProducts', 'shippingCharge', 'subtotal', 'payabletotal'));
    }

    public function checkout(Request $request)
    {
        $discountCouponAmount =  $request->discountCouponAmount;
        $shippingCharge =  $request->shippingCharge;
        $guestUserId = $this->getGuestUserId();

        $cartItems = Cart::where('user_id', $guestUserId)->with('product')->get();
        $totalQuantity = $cartItems->sum('quantity');

        $totalDeliveryCharge = $cartItems->sum(function ($item) {
            return $item->product->delivery ?? 50;
        });

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        $total = $total - $discountCouponAmount;
        $total_weight = $cartItems->sum(function ($item) {
            return $item->product->weight / 1000; // Convert ml to kg
        });
        $total_height = $cartItems->sum(function ($item) {
            return $item->product->height;
        });
        $total_breadth = $cartItems->sum(function ($item) {
            return $item->product->breadth;
        });
        $total_length = $cartItems->sum(function ($item) {
            return $item->product->length;
        });

        return view('checkout', compact('cartItems', 'total', 'total_weight', 'total_length', 'total_breadth', 'total_height', 'totalDeliveryCharge', 'totalQuantity'));
    }


    // Add a product to the cart
    public function addToCart(Product $product)
    {
        $guestUserId = $this->getGuestUserId();

        $cart = Cart::firstOrCreate(
            ['user_id' => $guestUserId, 'product_id' => $product->id],
            ['quantity' => 0]
        );

        $cart->increment('quantity');

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }


    // Remove a product from the cart
    public function removeFromCart($id)
    {
        $guestUserId = $this->getGuestUserId();

        $cart = Cart::where('user_id', $guestUserId)->where('product_id', $id)->firstOrFail();
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }


    // Update the quantity of a cart item
    public function updateCart(Request $request)
    {
        $guestUserId = $this->getGuestUserId();

        $cartItem = Cart::where('user_id', $guestUserId)->where('id', $request->id)->first();

        if ($cartItem) {
            // Update the quantity
            $cartItem->quantity = $request->quantity;
            $cartItem->save();

            // Calculate the total for the updated item
            $itemTotal = $cartItem->product->price * $cartItem->quantity;

            // Calculate the new cart total
            $cartItems = Cart::where('user_id', $guestUserId)->get();
            $cartTotal = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            return response()->json([
                'success' => true,
                'itemTotal' => $itemTotal,
                'cartTotal' => $cartTotal
            ]);
        }

        return response()->json(['success' => false], 404); // Return 404 if cart item not found
    }



    // public function processCheckout(Request $request, ShiprocketService $shiprocketService){
    //     // dd($request);
    //     $validatedData = $request->validate([
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'phone' => 'required|string|max:10',
    //         'email' => 'required|string|email|max:255',
    //         'address' => 'required|string|max:255',
    //         'city' => 'required|string|max:255',
    //         'state' => 'required|string|max:255',
    //         'country' => 'required|string|max:255',
    //         'house' => 'required|string|max:255',
    //         'postal_code' => 'required|numeric|digits:6',
    //         'zip' => 'required|numeric|digits:6',
    //         'message' => 'nullable|string',
    //         'payment_method' => 'required|in:Cash on Delivery,Razorpay',
    //         'total_amount' => 'required',
    //         'order_items' => 'required|array',
    //         'order_items.*.product_name' => 'required|string|max:255',
    //         'order_items.*.product_price' => 'required|numeric',
    //         'order_items.*.quantity' => 'required|integer|min:1',
    //     ]);

    //     $guestUserId = $this->getGuestUserId();

    //     $validatedData['user_id'] = $guestUserId;
    //     $validatedData['shipment_id'] = '0';
    //     $order = Order::create($validatedData);

    //     foreach ($validatedData['order_items'] as $item) {
    //         $order->orderItems()->create($item);
    //     }


    //     if ($validatedData['payment_method'] === 'Razorpay') {
    //         try {
    //             $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
    //             $razorpayOrder = $api->order->create([
    //                 'receipt' => 'order_rcptid_'.$order->id,
    //                 'amount' => $validatedData['total_amount'] * 100, // Amount in paise
    //                 'currency' => 'INR'
    //             ]);

    //             $order->transaction_id = $razorpayOrder->id;
    //             $orderData = [
    //                 'order_id' => $order->id,
    //                 'order_date' => now(),
    //                 'pickup_location' => 'Primary', // Change as per your config
    //                 'billing_customer_name' => $validatedData['first_name'],
    //                 'billing_last_name' => $validatedData['last_name'],
    //                 'billing_address' => $validatedData['address'],
    //                 'billing_city' => $validatedData['city'],
    //                 'billing_pincode' => $validatedData['postal_code'],
    //                 'billing_state' => $validatedData['state'], // Provide correct state
    //                 'billing_country' => $validatedData['country'], // Adjust if necessary
    //                 'billing_email' => $validatedData['email'],
    //                 'billing_phone' => $validatedData['phone'],
    //                 'shipping_is_billing' => true, // Set true if shipping and billing addresses are the same
    //                 'order_items' => array_map(function ($item) {
    //                     return [
    //                         'name' => $item['product_name'],
    //                         'sku' => 'SKU123', // Change to actual SKU
    //                         'units' => $item['quantity'],
    //                         'selling_price' => $item['product_price'],
    //                         'discount' => 0,
    //                         'tax' => 0,
    //                         'hsn' => 300490 // Change to actual HSN
    //                     ];
    //                 }, $validatedData['order_items']),
    //                 'payment_method' => 'COD', // Since payment method is COD
    //                 'sub_total' => $validatedData['total_amount'],
    //                 'length' => 10, // Product length in cm
    //                 'breadth' => 15, // Product breadth in cm
    //                 'height' => 20, // Product height in cm
    //                 'weight' => 1, // Product weight in kg
    //             ];
    //             $shiprocketResponse = $shiprocketService->createOrder($orderData);
    //             dd($shiprocketResponse);
    //             if ($shiprocketResponse['status_code'] == 1) {
    //                 $order->shipment_id = $shiprocketResponse['shipment_id'];
    //                 $order->save();
    //                 session()->flash('success', 'Order placed successfully! Shipment ID: ' . $shiprocketResponse['shipment_id']);
    //                 Mail::to($validatedData['email'])->send(new OrderMail($order));
    //                 Cart::where('user_id', $guestUserId)->delete();
    //             } else {
    //                 session()->flash('error', 'Failed to create shipment with Shiprocket.');
    //             }
    //             // session()->flash('success', 'Order placed successfully!');
    //             return redirect()->back();
    //         } catch (\Exception $e) {
    //             return back()->with('error', 'Razorpay error: ' . $e->getMessage());
    //         }
    //         $payment = $api->payment->fetch($validatedData['razorpay_payment_id']);
    //         if ($payment->status === 'authorized') {
    //             $capture = $api->payment->capture($validatedData['razorpay_payment_id'], [
    //                 'amount' => $validatedData['total_amount'] * 100, // Amount in paise
    //                 'currency' => 'INR'
    //             ]);
    //             if ($capture->status === 'captured') {
    //                 $order->payment_status = 'captured';
    //                 $order->save();
    //                 session()->flash('success', 'Payment captured successfully!');
    //             } else {
    //                 session()->flash('error', 'Failed to capture payment.');
    //             }
    //         } else {
    //             session()->flash('error', 'Payment is not authorized.');
    //         }
    //     } else {
    //         $orderData = [
    //             'order_id' => $order->id,
    //             'order_date' => now(),
    //             'pickup_location' => 'Primary', // Change as per your config
    //             'billing_customer_name' => $validatedData['first_name'],
    //             'billing_last_name' => $validatedData['last_name'],
    //             'billing_address' => $validatedData['address'],
    //             'billing_city' => $validatedData['city'],
    //             'billing_pincode' => $validatedData['postal_code'],
    //             'billing_state' => $validatedData['state'], // Provide correct state
    //             'billing_country' => $validatedData['country'], // Adjust if necessary
    //             'billing_email' => $validatedData['email'],
    //             'billing_phone' => $validatedData['phone'],
    //             'shipping_is_billing' => true, // Set true if shipping and billing addresses are the same
    //             'order_items' => array_map(function ($item) {
    //                 return [
    //                     'name' => $item['product_name'],
    //                     'sku' => 'SKU123', // Change to actual SKU
    //                     'units' => $item['quantity'],
    //                     'selling_price' => $item['product_price'],
    //                     'discount' => 0,
    //                     'tax' => 0,
    //                     'hsn' => 300490 // Change to actual HSN
    //                 ];
    //             }, $validatedData['order_items']),
    //             'payment_method' => 'COD', // Since payment method is COD
    //             'sub_total' => $validatedData['total_amount'],
    //             'length' => 10, // Product length in cm
    //             'breadth' => 15, // Product breadth in cm
    //             'height' => 20, // Product height in cm
    //             'weight' => 1, // Product weight in kg
    //         ];
    //         // Create shipment using Shiprocket
    //         $shiprocketResponse = $shiprocketService->createOrder($orderData);

    //         // Check if Shiprocket order was created successfully
    //         if ($shiprocketResponse['status_code'] == 1) {
    //             // Success, save shipment ID
    //             $order->shipment_id = $shiprocketResponse['shipment_id'];
    //             $order->save();
    //             session()->flash('success', 'Order placed successfully! Shipment ID: ' . $shiprocketResponse['shipment_id']);
    //             Mail::to($validatedData['email'])->send(new OrderMail($order));
    //         } else {
    //             // Failure, handle it appropriately
    //             session()->flash('error', 'Failed to create shipment with Shiprocket.');
    //         }
    //         // session()->flash('success', 'Order placed successfully!');
    //         return redirect()->back();
    //     }
    // }

    public function processCheckout(Request $request, ShiprocketService $shiprocketService)
    {
        // $email = $request->input('email');
        // $data = ['message' => 'This is a test email.'];
        // $order = Order::create($request->all());
        // Mail::to('vijay11@mailinator.com')->send(new OrderMail($order));
        // return;
        Log::info('process checkout request');
        Log::info($request->all());
        $validatedData = $this->validateCheckoutData($request);
       
        try {
            $guestUserId = $this->getGuestUserId();
            Log::info('$guestUserId razorpay');
            Log::info($guestUserId);
            $validatedData['user_id'] = $guestUserId;
            $validatedData['shipment_id'] = '0';
            $validatedData['gst'] = $request['gst'];
            $validatedData['total_amount'] =  $validatedData['payment_method'] === 'Cash on Delivery' ? 
            $validatedData['total_amount'] + 50 : $validatedData['total_amount'];
            // $validatedData['razorpay_order_id'] = '0';
            Log::info('order creating');
            Log::info($validatedData);
            $order = Order::create($validatedData);
            $this->saveOrderItems($order, $validatedData['order_items']);
            if ($validatedData['payment_method'] === 'Razorpay') {
                //$razorpayOrder = $this->createRazorpayOrder($validatedData, $order);
                $order->razorpay_order_id = $validatedData['razorpay_order_id'];
                $order->transaction_id = $validatedData['razorpay_payment_id'];
                $order->save();
                $shiprocketResponse = $this->createShiprocketOrder($shiprocketService, $validatedData, $order);
                Log::info('shiprocketResponse');
                Log::info($shiprocketResponse);
                if ($shiprocketResponse['status_code'] == 1) {
                    $this->finalizeOrder($order, $shiprocketResponse, $validatedData);
                    $this->captureRazorpayPayment($validatedData, $order->razorpay_order_id);
                    Mail::to($validatedData['email'])->send(new OrderMail($order));
                    return redirect()->route('payment.success', ['orderId' => $order->id])->with('message', 'Your order was successful!');
                    // return redirect()->back()->with('success', 'Order placed and payment captured successfully!');
                } else {
                    session()->flash('error', 'Failed to create shipment with Shiprocket.');
                    return redirect()->back()->with('error', 'Order failed: Shipment creation failed.');
                }
            }
            $shiprocketResponse = $this->createShiprocketOrder($shiprocketService, $validatedData, $order);
            Log::info('shiprocketResponse');
            Log::info($shiprocketResponse);
            if ($shiprocketResponse['status_code'] == 1) {
                $this->finalizeOrder($order, $shiprocketResponse, $validatedData);
              
                Mail::to($validatedData['email'])->send(new OrderMail($order));
                return redirect()->route('payment.success', ['orderId' => $order->id])->with('message', 'Your order was successful!');
                // return redirect()->back()->with('success', 'Order placed successfully with Cash on Delivery.');
            } else {
                return redirect()->back()->with('error', 'Failed to create shipment with Shiprocket.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Checkout process failed: ' . $e->getMessage());
        }
    }
    protected function validateCheckoutData($request)
    {
        return $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|min:3|max:255',
            'house' => 'required|string|min:3|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            // 'postal_code' => 'required|numeric|digits:6',
            'zip' => 'required|numeric|digits:6',
            'message' => 'nullable|string',
            'total_weight' => 'required',
            'total_length' => 'required',
            'total_breadth' => 'required',
            'total_height' => 'required',
            'payment_method' => 'required|in:Cash on Delivery,Razorpay',
            'razorpay_payment_id' => 'required_if:payment_method,Razorpay',
            'razorpay_order_id' => 'required_if:payment_method,Razorpay',
            'total_amount' => 'required|numeric',
            'order_items' => 'required|array',
            'order_items.*.product_name' => 'required|string|max:255',
            'order_items.*.product_price' => 'required|numeric',
            'order_items.*.quantity' => 'required|integer|min:1',
            // 'order_items.*.height' => 'required',
            // 'order_items.*.breadth' => 'required',
            // 'order_items.*.length' => 'required',
            'order_items.*.hsn' => 'required',
            'order_items.*.sku' => 'required',
            'order_items.*.tax' => 'required',
        ]);
    }

    protected function saveOrderItems($order, $orderItems)
    {
        foreach ($orderItems as $item) {
            $order->orderItems()->create($item);
        }
    }

    protected function createRazorpayOrder($validatedData, $order)
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
        return $api->order->create([
            'receipt' => 'order_rcptid_' . $order->id,
            'amount' => $validatedData['total_amount'] * 100, // Amount in paise
            'currency' => 'INR',
        ]);
    }

    protected function captureRazorpayPayment($validatedData, $razorpayOrderId)
    {
        $keyId = config('services.razorpay.key');
        $keySecret = config('services.razorpay.secret');
        $paymentId = $validatedData['razorpay_payment_id'];
        $amount = $validatedData['total_amount'] * 100; // Amount in paise (smallest unit)
        $response = Http::withBasicAuth($keyId, $keySecret)
            ->post("https://api.razorpay.com/v1/payments/{$paymentId}/capture", [
                'amount' => $amount, // Amount in smallest currency unit
                'currency' => 'INR'
            ]);
             
        if ($response->successful() && $response->json('status') === 'captured') {
            $order = Order::where('razorpay_order_id', $razorpayOrderId)->first();
            if ($order) {
                $order->payment_status = 'captured';
                $order->transaction_id = $paymentId;
                $order->save();
            } else {
                Log::error('Order not found for the given Razorpay Order ID.');
                // throw new \Exception('Order not found for the given Razorpay Order ID.');
            }
        } else {
            Log::error('Failed to capture payment. Response body: ' . $response->body());
            //  throw new \Exception('Failed to capture Razorpay payment: ' . $response->body());
            // return;
        }
    }


    protected function createShiprocketOrder($shiprocketService, $validatedData, $order)
    {
        // Prepare order data for Shiprocket
        $orderData = $this->prepareShiprocketOrderData($validatedData, $order);

        // Create shipment using Shiprocket API
        return $shiprocketService->createOrder($orderData);
    }

    protected function prepareShiprocketOrderData($validatedData, $order)
    {
        // Determine the payment method
        if ($validatedData['payment_method'] === 'Cash on Delivery') {
            $payment_method = 'COD';
        } else {
            $payment_method = 'prepaid';
        }

        // Prepare the order data for Shiprocket API
        return [
            'order_id' => $order->id,
            'order_date' => now(), // Current timestamp
            "channel_id" => "5631500", // Channel ID - should be checked if dynamic
            'pickup_location' => 'Primary', // Pickup location can be dynamic if needed
            'billing_customer_name' => $validatedData['first_name'],
            'billing_last_name' => $validatedData['last_name'],
            'billing_address' => $validatedData['address']. ' ' .$validatedData['house'],
            'billing_city' => $validatedData['city'],
            'billing_pincode' => $validatedData['zip'],
            'billing_state' => $validatedData['state'],
            'billing_country' => $validatedData['country'] ?? 'INDIA',
            'billing_email' => $validatedData['email'] ?? 'test@mailinator.com',
            'billing_phone' => $validatedData['phone'] ?? '9876543210',
            'shipping_is_billing' => true, // Set to true if shipping and billing addresses are the same
            'order_items' => array_map(function ($item) {
                // Ensure each item has required fields like SKU, tax, HSN
                return [
                    'name' => $item['product_name'],
                    'sku' => $item['sku'] ?? '', // Fallback to empty string if SKU is missing
                    'units' => $item['quantity'],
                    'selling_price' => $item['product_price'],
                    'discount' => 0, // Assuming no discount for now
                    'tax' => $item['tax'] ?? 0, // Fallback to 0 if tax is missing
                    'hsn' => $item['hsn'] ?? '', // Fallback to empty string if HSN is missing
                ];
            }, $validatedData['order_items']),
            'payment_method' => $payment_method,
            'sub_total' => $validatedData['total_amount'],
            'length' => $validatedData['total_length'], // cm
            'breadth' => $validatedData['total_breadth'], // cm
            'height' => $validatedData['total_height'], // cm
            'weight' => $validatedData['total_weight'], // kg
        ];
    }

    protected function finalizeOrder($order, $shiprocketdata, $validatedData)
    {
        $shipmentId = $shiprocketdata['shipment_id'];
        // Update shipment ID and save the order
        $order->shipment_id = $shipmentId;
        $order->razorpay_order_id = $shiprocketdata['order_id'];
        $order->save();
       
        // Send order confirmation email
        // Mail::to($validatedData['email'])->send(new OrderMail($order));

        // Clear the cart for the user
        Cart::where('user_id', $validatedData['user_id'])->delete();


        // Flash a success message
        session()->flash('success', 'Order placed successfully! Shipment ID: ' . $shipmentId);
    }

    public function createOrder(Request $request)
    {
        // $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
        $orderData = [
            'receipt'         => 'order_rcpt_' . time(),
            'amount'          => $request->amount * 100, // Amount in paise
            'currency'        => 'INR',
            'payment_capture' => 1, // 1 for automatic capture, 0 for manual
        ];

        try {
            $order = $api->order->create($orderData); // Create Razorpay order
            return response()->json([
                'order_id' => $order['id'],
                'key'      => config('services.razorpay.key'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function verifyPayment(Request $request)
    {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        $attributes = [
            'razorpay_signature'  => $request->razorpay_signature,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_order_id'   => $request->razorpay_order_id,
        ];

        try {
            $api->utility->verifyPaymentSignature($attributes); // Verifies payment
            Log::info('Razorpay Payment verified successfully');
            return response()->json(['message' => 'Payment verified successfully']);
        } catch (\Exception $e) {
            Log::info('Razorpay Payment verify error');
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function showSuccessPage($orderId)
    {
        // Retrieve the order from the database by its ID
        $order = Order::find($orderId);

        if (!$order) {
            return redirect()->route('index')->with('error', 'Order not found.');
        }

        // Retrieve the success message from the session
        $message = session('message');

        return view('payment.success', compact('order', 'message'));
    }
}
