<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Blogcate;

use File;

class BlogController extends Controller
{
    public function blogcategory(){
        return view('admin.blog.blogcategory');
    }
    public function deleteblogcategory($id){
        $deleteblogcategory= Blogcate::find($id);
        $path='admin/assets/uploads/blogcate/'.$deleteblogcategory->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $deleteblogcategory->delete();
        return redirect('/blogcategory');
    }
    public function addblogcategory(){
        return view('admin.blog.addblogcategory');
    }
    public function addblogcateinfo(Request $request){
        $addblogcateinfo=new Blogcate();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/blogcate/',$filename);
            $addblogcateinfo->image = $filename;
        }
        $addblogcateinfo->name=$request->input('name');
        $addblogcateinfo->slug=$request->input('slug');
        $addblogcateinfo->metatitle=$request->input('metatitle');
        $addblogcateinfo->metadescription=$request->input('metadescription');
        $addblogcateinfo->metakeywords=$request->input('metakeywords');
        $addblogcateinfo->save();
        return redirect('/blogcategory');
    }
    public function updateblogcategory($id){
        $updateblogcategory= Blogcate::find($id);
        return view('admin.blog.updateblogcategory',['data'=>$updateblogcategory]);
    }

    public function updateblogcateinfo(Request $request, $id){
        $updateblogcateinfo= Blogcate::find($id);
        if($request->hasFile('image')){
            $path='admin/assets/uploads/blogcate/'.$updateblogcateinfo->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/blogcate/',$filename);
            $updateblogcateinfo->image = $filename;
        }
        $updateblogcateinfo->name=$request->input('name');
        $updateblogcateinfo->slug=$request->input('slug');
        $updateblogcateinfo->metatitle=$request->input('metatitle');
        $updateblogcateinfo->metadescription=$request->input('metadescription');
        $updateblogcateinfo->metakeywords=$request->input('metakeywords');
        $updateblogcateinfo->update();
        return redirect('/blogcategory');
    }
    public function bloglist(){
        return view('admin.blog.blog-list');
    }
    public function addblog(){
        return view('admin.blog.addblog');
    }
    public function addbloginfo(Request $request){
        $addbloginfo=new Blog();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/blog/',$filename);
            $addbloginfo->image = $filename;
        }
        $addbloginfo->name=$request->input('name');
        $addbloginfo->slug=$request->input('slug');
        $addbloginfo->status=$request->input('status');
        $addbloginfo->blagcate=$request->input('blagcate');
        $addbloginfo->description=$request->input('description');
        $addbloginfo->metatitle=$request->input('metatitle');
        $addbloginfo->metadescription=$request->input('metadescription');
        $addbloginfo->metakeywords=$request->input('metakeywords');
        $addbloginfo->save();
        return redirect('/bloglist');
    }
    public function deleteblog($id){
        $deleteblog= Blog::find($id);
        $path='admin/assets/uploads/blog/'.$deleteblog->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $deleteblog->delete();
        return redirect('/bloglist');
    }
    public function updateblog($id){
        $updateblog= Blog::find($id);
        return view('admin.blog.updateblog',['data'=>$updateblog]);
    }
    public function updatebloginfo(Request $request, $id){
        $updatebloginfo= Blog::find($id);
        if($request->hasFile('image')){
            $path='admin/assets/uploads/blog/'.$updatebloginfo->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/blog/',$filename);
            $updatebloginfo->image = $filename;
        }
        $updatebloginfo->name=$request->input('name');
        $updatebloginfo->slug=$request->input('slug');
        $updatebloginfo->status=$request->input('status');
        $updatebloginfo->blagcate=$request->input('blagcate');
        $updatebloginfo->description=$request->input('description');
        $updatebloginfo->metatitle=$request->input('metatitle');
        $updatebloginfo->metadescription=$request->input('metadescription');
        $updatebloginfo->metakeywords=$request->input('metakeywords');
        $updatebloginfo->update();
        return redirect('/bloglist');
    }

    // public function getblog(){
    //     $blog= Blog::all();
    //     return view('admin.blog.blog-list',compact(blog));
    // }



}
