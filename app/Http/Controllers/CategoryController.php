<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use File;

class CategoryController extends Controller
{

    public function categorylist(){
        return view('admin.category.index');
    }

    public function createcategory(){
        return view('admin.category.create');
    }


    public function updatecategory($id){
        $updatecategory = Category::find($id);
        return view('admin.category.update',['data'=>$updatecategory]);
    }




    public function addcategoryinfo(Request $request){
        $addcategoryinfo=new Category();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/category/home/',$filename);
            $addcategoryinfo->image = $filename;
        }
        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/category/cover/',$filename);
            $addcategoryinfo->cover = $filename;
        }
        $addcategoryinfo->name = $request->input('name');
        $addcategoryinfo->order = $request->input('order');
        $addcategoryinfo->status = $request->input('status');
        $addcategoryinfo->shortdescription = $request->input('shortdescription');
        $addcategoryinfo->fulldescription = $request->input('fulldescription');
        $addcategoryinfo->metatitle = $request->input('metatitle');
        $addcategoryinfo->metadescription = $request->input('metadescription');
        $addcategoryinfo->metakeywords = $request->input('metakeywords');
        $addcategoryinfo->save();
        return redirect('/categorylist');
    }

    public function updatecategoryinfo(Request $request, $id){
        $updatecategoryinfo= Category::find($id);
        if($request->hasFile('image')){
            $path='admin/assets/uploads/category/home/'.$updatecategoryinfo->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/category/home/',$filename);
            $updatecategoryinfo->image = $filename;
        }
        if($request->hasFile('cover')){
            $path='admin/assets/uploads/category/cover/'.$updatecategoryinfo->cover;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('cover');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/category/cover/',$filename);
            $updatecategoryinfo->cover = $filename;
        }
        $updatecategoryinfo->name = $request->input('name');
        $updatecategoryinfo->order = $request->input('order');
        $updatecategoryinfo->status = $request->input('status');
        $updatecategoryinfo->shortdescription = $request->input('shortdescription');
        $updatecategoryinfo->fulldescription = $request->input('fulldescription');
        $updatecategoryinfo->metatitle = $request->input('metatitle');
        $updatecategoryinfo->metadescription = $request->input('metadescription');
        $updatecategoryinfo->metakeywords = $request->input('metakeywords');
        $updatecategoryinfo->update();
        return redirect('/categorylist');
    }

    public function deletecategory($id){
        $deletecategory= Category::find($id);
        $path='admin/assets/uploads/category/home/'.$deletecategory->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $path='admin/assets/uploads/category/cover/'.$deletecategory->cover;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $deletecategory->delete();
        return redirect('/categorylist');
    }

}
