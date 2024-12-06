<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coupon;

class couponController extends Controller
{
    public function index(){
        $coupons = coupon::paginate(20);
        return view('admin.coupon.index', compact('coupons'));
    }

    public function create(){
        return view('admin.coupon.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'percentage' => 'numeric',
            'price' => 'numeric',
            'status' => 'required|boolean',
        ]);

        $coupon = coupon::create($validatedData);

        return redirect()->route('coupons.index')->with('success', 'Coupon created successfully.');
    }

    public function edit($id){
        $coupon = coupon::findOrFail($id);
        return view('admin.coupon.update', compact('coupon'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'percentage' => 'numeric',
            'price' => 'numeric',
            'status' => 'required|boolean',
        ]);

        $coupon = coupon::findOrFail($id);
        $coupon->update($validatedData);

        return redirect()->route('coupons.index')->with('success', 'Coupon updated successfully.');
    }

    public function destroy($id){
        $coupon = coupon::findOrFail($id);
        $coupon->delete();

        return redirect()->route('coupons.index')->with('success', 'Coupon deleted successfully.');
    }
    public function get($name){
        $coupon = coupon::where('name', $name)->firstOrFail();

        return response()->json($coupon);
    }

}
