<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use File;

class SliderController extends Controller
{

    public function sliderlist(){
        return view('admin.slider.index');
    }

    public function createslider(){
        return view('admin.slider.create');
    }

    public function addsliderinfo(Request $request){
        $addsliderinfo=new Slider();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/slider/',$filename);
            $addsliderinfo->image = $filename;
        }
        $addsliderinfo->order = $request->input('order');
        $addsliderinfo->status = $request->input('status');
        $addsliderinfo->save();
        return redirect('/sliderlist');
    }

    public function updateslider($id){
        $updateslider = Slider::find($id);
        return view('admin.slider.update',['data'=>$updateslider]);
    }

    public function updatesliderinfo(Request $request, $id){
        $updatesliderinfo= Slider::find($id);
        if($request->hasFile('image')){
            $path='admin/assets/uploads/slider/'.$updatesliderinfo->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('admin/assets/uploads/slider/',$filename);
            $updatesliderinfo->image = $filename;
        }
        $updatesliderinfo->order = $request->input('order');
        $updatesliderinfo->status = $request->input('status');
        $updatesliderinfo->update();
        return redirect('/sliderlist');
    }

    public function deleteslider($id){
        $deleteslider= Slider::find($id);
        $path='admin/assets/uploads/slider/'.$deleteslider->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $deleteslider->delete();
        return redirect('/sliderlist');
    }





}
