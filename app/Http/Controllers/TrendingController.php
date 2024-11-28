<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trending;
use File;

class TrendingController extends Controller
{

    public function trendinglist(){
        return view('admin.trending.index');
    }

    public function createtrending(){
        return view('admin.trending.create');
    }

    public function addtrendinginfo(Request $request){
        $addtrendinginfo=new Trending();

        $addtrendinginfo->name = $request->input('name');
        $addtrendinginfo->order = $request->input('order');
        $addtrendinginfo->status = $request->input('status');
        $addtrendinginfo->save();
        return redirect('/trendinglist');
    }

    public function updatetrending($id){
        $updatetrending = Trending::find($id);
        return view('admin.trending.update',['data'=>$updatetrending]);
    }

    public function updatetrendinginfo(Request $request, $id){
        $updatetrending= Trending::find($id);

        $updatetrending->name = $request->input('name');
        $updatetrending->order = $request->input('order');
        $updatetrending->status = $request->input('status');
        $updatetrending->update();
        return redirect('/trendinglist');
    }

    public function deletetrending($id){
        $deletetrending= Trending::find($id);
        $deletetrending->delete();
        return redirect('/trendinglist');
    }




}
