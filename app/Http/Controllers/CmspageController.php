<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cmspage;
use File;

class CmspageController extends Controller
{
    public function pagelist(){
        return view('admin.cmspage.index');
    }

    public function createcmspage(){
        return view('admin.cmspage.create');
    }

    public function addcmspageinfo(Request $request){
        $addcmspageinfo=new Cmspage();
        $addcmspageinfo->name=$request->input('name');
        $addcmspageinfo->order=$request->input('order');
        $addcmspageinfo->status=$request->input('status');
        $addcmspageinfo->content=$request->input('content');
        $addcmspageinfo->metatitle = $request->input('metatitle');
        $addcmspageinfo->metadescription = $request->input('metadescription');
        $addcmspageinfo->metakeywords = $request->input('metakeywords');
        $addcmspageinfo->save();
        return redirect('/pagelist');
    }

    public function updatecmspage($id){
        $updatecmspage = Cmspage::find($id);
        return view('admin.cmspage.update',['data'=>$updatecmspage]);
    }

    public function updatecmspageinfo(Request $request, $id){
        $updatecmspageinfo= Cmspage::find($id);
        $updatecmspageinfo->name = $request->input('name');
        $updatecmspageinfo->order = $request->input('order');
        $updatecmspageinfo->status = $request->input('status');
        $updatecmspageinfo->content = $request->input('content');
        $updatecmspageinfo->metatitle = $request->input('metatitle');
        $updatecmspageinfo->metadescription = $request->input('metadescription');
        $updatecmspageinfo->metakeywords = $request->input('metakeywords');
        $updatecmspageinfo->update();
        return redirect('/pagelist');
    }

    public function deletecmspage($id){
        $deletecmspage= Cmspage::find($id);
        $deletecmspage->delete();
        return redirect('/pagelist');
    }


}
