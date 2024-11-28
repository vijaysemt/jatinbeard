<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productgall;
use Illuminate\Support\Facades\DB;
use File;

class ProductgallController extends Controller
{

    public function index(){
        return view('admin.product.productgall.index');
    }
    public function createpgallery(){
        return view('admin.product.productgall.create');
    }
    public function addpgalleryinfo(Request $request)
    {
        // Create a new instance of Productgall
        $addpgalleryinfo = new Productgall();

        // Check if a file is uploaded
        if ($request->hasFile('pimage')) {
            $file = $request->file('pimage');
            $ext = $file->getClientOriginalExtension();

            // Generate a unique filename
            $filename = time() . '.' . $ext;

            // Move the file to the specified directory
            $file->move(public_path('admin/assets/uploads/product/gallery/'), $filename);

            // Assign the filename to the pimage attribute
            $addpgalleryinfo->pimage = $filename;
        }

        // Assign alt and pid inputs to the respective model attributes
        $addpgalleryinfo->alt = $request->input('alt');
        $addpgalleryinfo->pid = $request->input('pid');

        // Save the model to the database
        $addpgalleryinfo->save();

        // Redirect to the product gallery page
        return redirect('/productgall');
    }


    public function deletepgall($id){
        $deletepgall= Productgall::find($id);
        $path='admin/assets/uploads/product/gallery/'.$deletepgall->pimage;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $deletepgall->delete();
        return redirect('/productgall');
    }

}
