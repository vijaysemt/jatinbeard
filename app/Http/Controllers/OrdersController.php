<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::with('orderItems')->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }
    public function view($id){
        $orders = Order::where('id',$id)->with('orderItems')->paginate(20);
        return view('admin.orders.view', compact('orders'));
    }
}
