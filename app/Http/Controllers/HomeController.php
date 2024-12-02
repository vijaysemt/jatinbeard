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

        $totalFailedCODOrders = $orders->where('payment_method', 'Cash on Delivery')->whereIn('shipment_id', [NULL, 0])->count();
        $totalFailedRazorpayOrders = $query
        ->where('created_at', '>=', $startDate) // Start date filter
        ->where('created_at', '<=', $endDate)   // End date filter
        ->where('payment_method', 'Razorpay')   // Adding payment method filter
        ->where(function($query) {
            $query->whereIn('shipment_id', [NULL, 0])
                  ->orWhereNull('razorpay_order_id')
                  ->orWhereNull('transaction_id');
        })->count();
        
        $totalFailedOrders = $totalFailedCODOrders + $totalFailedRazorpayOrders;


        $totalCODOrders = $orders->where('payment_method', 'Cash on Delivery')->count();
        $totalRazorpayOrders = $orders->where('payment_method', 'Razorpay')->count();

        // Fetch stock data for products
        $inStockProductsCount = Product::where('stock', '>', 0)->count();
        $outOfStockProductsCount = Product::where('stock', 0)->count();
        $outOfStockProducts = Product::where('stock', 0)->get();

        // Return the data as a JSON response
        return response()->json([
            'orders' => [
                'orders' => $orders,
                'total_orders' => $totalOrders,
                'total_amount' => $totalAmount,
                'total_cod_orders' => $totalCODOrders,
                'total_razorpay_orders' => $totalRazorpayOrders,
                'total_amt_cod_orders' => $totalAmtCODOrders,
                'total_amt_razorpay_orders' => $totalAmtRazorpayOrders,
                'total_failed_orders' => $totalFailedOrders,
            ],
            'products' => [
                'outOfStockProducts' => $outOfStockProducts,
                'in_stock' => $inStockProductsCount,
                'out_of_stock' => $outOfStockProductsCount,
            ]
        ]);
    }
}
