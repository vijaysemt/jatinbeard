<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

use Illuminate\Support\Facades\Log; // Add this line to import the Log facade
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('layouts.dashboard');
    }

    public function fetchData(Request $request)
    {

        $startDate = $request->input('start_date'); // Start of the day
        $endDate = $request->input('end_date');    // End of the day;
        if (!$startDate && !$endDate) {
             // Get the first day of the current month
            $startDate = now()->startOfMonth();
            // Get today's date
            $endDate = now();
            $startDate = Carbon::parse($startDate)->startOfDay();  // Ensure start date is at the beginning of the day
            $endDate = Carbon::parse($endDate)->endOfDay();  // Ensure end date is at the end of the day (23:59:59)
            
        } 
        $startDate = $startDate. ' 00:00:00'; // Start of the day
        $endDate = $endDate.' 23:59:59'; 
        Log::info('start date');
        Log::info($startDate);
        Log::info('endDate');
        Log::info($endDate);
        // Fetch orders between the given date range
        $query = Order::query();
        $orders = $query->where('created_at', '>=', $startDate) // Start date filter
        ->where('created_at', '<=', $endDate)->get();

        // Calculate total orders and amounts
        $totalOrders = $orders->count();
        $totalAmount = $orders->sum('total_amount'); // Assuming there is an 'amount' column
        $totalAmtCODOrders = $orders->where('payment_method', 'Cash on Delivery')->sum('total_amount');
        $totalAmtRazorpayOrders = $orders->where('payment_method', 'Razorpay')->sum('total_amount');

        // total failed orders

        $failedCODOrders = $orders->where('payment_method', 'Cash on Delivery')->whereIn('shipment_id', [NULL, 0]);

        $failedRazorpayOrders = $query
        ->where('created_at', '>=', $startDate) // Start date filter
        ->where('created_at', '<=', $endDate)   // End date filter
        ->where('payment_method', 'Razorpay')   // Adding payment method filter
        ->where(function($query) {
            $query->whereIn('shipment_id', [NULL, 0])
                  ->orWhereNull('razorpay_order_id')
                  ->orWhereNull('transaction_id');
        });

        // Merge the two collections
        $failedOrders = $failedCODOrders->merge($failedRazorpayOrders);
        $totalFailedCODOrders = $failedCODOrders->count();
        $totalFailedRazorpayOrders = $failedRazorpayOrders->count();
        $totalFailedOrders = $totalFailedCODOrders + $totalFailedRazorpayOrders;


        
        
        $CODOrders = $orders->where('payment_method', 'Cash on Delivery');
        
        $totalCODOrders = $CODOrders->count();
      
        $CODOrders = $CODOrders->merge($CODOrders);
      
        $razorpayOrders = $orders->where('payment_method', 'Razorpay');
        $totalRazorpayOrders = $razorpayOrders->count();
        $razorpayOrders = $razorpayOrders->merge($razorpayOrders);
        // Fetch stock data for products
        $inStockProducts = Product::where('stock', '>', 0)->get();
        $inStockProductsCount = $inStockProducts->count();

        $outOfStockProducts = Product::where('stock', 0)->get();
        $outOfStockProductsCount = $outOfStockProducts->count();

        // Return the data as a JSON response
        return response()->json([
            'orders' => [
                'orders' => $orders,
                'cod_orders' => $CODOrders,
                'razorpay_orders' => $razorpayOrders,
                'failed_orders' => $failedOrders,
                'total_orders' => $totalOrders,
                'total_amount' => $totalAmount,
                'total_cod_orders' => $totalCODOrders,
                'total_razorpay_orders' => $totalRazorpayOrders,
                'total_amt_cod_orders' => $totalAmtCODOrders,
                'total_amt_razorpay_orders' => $totalAmtRazorpayOrders,
                'total_failed_orders' => $totalFailedOrders,
            ],
            'products' => [
                'out_of_stock' => $outOfStockProducts,
                'in_stock' => $inStockProducts,
                'in_stock_count' => $inStockProductsCount,
                'out_of_stock_count' => $outOfStockProductsCount,
            ]
        ]);
    }
}
