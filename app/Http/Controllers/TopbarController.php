<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topbar;

class TopbarController extends Controller
{
    public function topbar(){
        return view('admin.topbar.index');
    }

    public function addtopbarinfo(Request $request, $id){
        $topbar= Topbar::find($id);
        $topbar->topbar = $request->input('topbar');
        $topbar->update();
        return redirect('/topbar');
    }
}
