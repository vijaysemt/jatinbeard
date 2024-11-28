<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;

class LabelController extends Controller
{
    public function labellist(){
        return view('admin.label.index');
    }

    public function createlabel(){
        return view('admin.label.create');
    }

    public function deletelabel($id){
        $deletelabel= Label::find($id);
        $deletelabel->delete();
        return redirect('/labellist');
    }

    public function addlabelinfo(Request $request){
        $addlabelinfo=new Label();
        $addlabelinfo->name = $request->input('name');
        $addlabelinfo->colorcode = $request->input('colorcode');
        $addlabelinfo->status = $request->input('status');
        $addlabelinfo->save();
        return redirect('/labellist');
    }

    public function updatelabel($id){
        $updatelabel = Label::find($id);
        return view('admin.label.update',['data'=>$updatelabel]);
    }


    public function updatelabelinfo(Request $request, $id){
        $updatelabelinfo= Label::find($id);

        $updatelabelinfo->name = $request->input('name');
        $updatelabelinfo->colorcode = $request->input('colorcode');
        $updatelabelinfo->status = $request->input('status');
        $updatelabelinfo->update();
        return redirect('/labellist');
    }


}
