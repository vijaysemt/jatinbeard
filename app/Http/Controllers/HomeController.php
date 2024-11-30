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

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        if (!$startDate && !$endDate) {
             // Get the first day of the current month
            $startDate = now()->startOfMonth();
            // Get today's date
            $endDate = now();
            $startDate = Carbon::parse($startDate)->startOfDay();  // Ensure start date is at the beginning of the day
            $endDate = Carbon::parse($endDate)->endOfDay();  // Ensure end date is at the end of the day (23:59:59)
            
        } 
        // Log::info('start date');
        // Log::info($startDate);
        // Log::info('endDate');
        // Log::info($endDate);
        // Fetch orders between the given date range
        $orders = Order::where('created_at', '>=', $startDate) // Start date filter
        ->where('created_at', '<=', $endDate)->get();

        // Calculate total orders and amounts
        $totalOrders = $orders->count();
        $totalAmount = $orders->sum('total_amount'); // Assuming there is an 'amount' column
        $totalCODOrders = $orders->where('payment_method', 'Cash on Delivery')->count();
        $totalRazorpayOrders = $orders->where('payment_method', 'Razorpay')->count();

        // Fetch stock data for products
        $inStockProductsCount = Product::where('stock', '>', 0)->count();
        $outOfStockProductsCount = Product::where('stock', 0)->count();

        // Return the data as a JSON response
        return response()->json([
            'orders' => [
                'total_orders' => $totalOrders,
                'total_amount' => $totalAmount,
                'total_cod_orders' => $totalCODOrders,
                'total_razorpay_orders' => $totalRazorpayOrders,
            ],
            'products' => [
                'in_stock' => $inStockProductsCount,
                'out_of_stock' => $outOfStockProductsCount,
            ]
        ]);
    }
}
