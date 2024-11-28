<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productgall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product-details', compact('products'));
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('product-details', compact('product'));
    }

    public function productlist(){
        return view('admin.product.index');
    }

    public function createproduct(){
        return view('admin.product.create');
    }

    public function addproductinfo(Request $request){
        $addproductinfo=new Product();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/product/home/',$filename);
            $addproductinfo->pimage = $filename;
        }
        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/product/cover/',$filename);
            $addproductinfo->pcover = $filename;
        }
        $addproductinfo->name = $request->input('name');
        $addproductinfo->cate_id = $request->input('cate_id');
        $addproductinfo->order = $request->input('order');
        $addproductinfo->stock = $request->input('stock');
        $addproductinfo->description = $request->input('description');
        $addproductinfo->fdescription = $request->input('fdescription');
        $addproductinfo->price = $request->input('price');
        $addproductinfo->delivery = $request->input('delivery');
        $addproductinfo->status = $request->input('status');
        $addproductinfo->weight = $request->input('weight');
        $addproductinfo->length = $request->input('length');
        $addproductinfo->breadth = $request->input('breadth');
        $addproductinfo->sku = $request->input('sku');
        $addproductinfo->hsn = $request->input('hsn');
        $addproductinfo->tax = $request->input('tax');
        $addproductinfo->height = $request->input('height');
        $addproductinfo->oprice = $request->input('oprice');
        $addproductinfo->metatitle = $request->input('metatitle');
        $addproductinfo->metadescription = $request->input('metadescription');
        $addproductinfo->metakeywords = $request->input('metakeywords');
        $addproductinfo->seohead = $request->input('seohead');
        $addproductinfo->save();
        return redirect('/productlist');
    }

    public function updateproduct($id){
        $productgall = Productgall::where('pid', $id)->get();
        $updateproduct = Product::find($id);
        return view('admin.product.update',['data'=>$updateproduct , 'gall'=>$productgall]);
    }

    public function updateproductinfo(Request $request, $id){
        $updateproductinfo= Product::find($id);
        if($request->hasFile('image')){
            $path='admin/assets/uploads/product/home/'.$updateproductinfo->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/product/home/',$filename);
            $updateproductinfo->pimage = $filename;
        }
        if($request->hasFile('cover')){
            $path='admin/assets/uploads/product/cover/'.$updateproductinfo->cover;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('cover');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/product/cover/',$filename);
            $updateproductinfo->pcover = $filename;
        }
        $updateproductinfo->name = $request->input('name');
        $updateproductinfo->cate_id = $request->input('cate_id');
        $updateproductinfo->order = $request->input('order');
        $updateproductinfo->stock = $request->input('stock');
        $updateproductinfo->description = $request->input('description');
        $updateproductinfo->fdescription = $request->input('fdescription');
        $updateproductinfo->price = $request->input('price');
        $updateproductinfo->delivery = $request->input('delivery');
        $updateproductinfo->oprice = $request->input('oprice');
        $updateproductinfo->status = $request->input('status');
        $updateproductinfo->weight = $request->input('weight');
        $updateproductinfo->length = $request->input('length');
        $updateproductinfo->breadth = $request->input('breadth');
        $updateproductinfo->sku = $request->input('sku');
        $updateproductinfo->tax = $request->input('tax');
        $updateproductinfo->hsn = $request->input('hsn');
        $updateproductinfo->height = $request->input('height');
        $updateproductinfo->metatitle = $request->input('metatitle');
        $updateproductinfo->metadescription = $request->input('metadescription');
        $updateproductinfo->metakeywords = $request->input('metakeywords');
        $updateproductinfo->seohead = $request->input('seohead');
        $updateproductinfo->update();
        return redirect('/productlist');
    }

    public function deleteproduct($id){
        $deleteproduct= Product::find($id);
        $path='admin/assets/uploads/product/home/'.$deleteproduct->pimage;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $path='admin/assets/uploads/product/cover/'.$deleteproduct->pcover;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $deleteproduct->delete();
        return redirect('/productlist');
    }

}
