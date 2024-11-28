<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;
use App\Models\Contact;
use App\Models\Borrow;



class AdminController extends Controller
{
    public function dashboard(){
        return view('layouts.dashboard');
    }
    public function profile(){
        return view('admin.profile.index');
    }
    public function ourstorys(){
        return view('admin.about.ourstorys');
    }
    public function adminteam(){
        return view('admin.about.team');
    }
    public function addteam(){
        return view('admin.about.addteam');
    }
    public function partners(){
        return view('admin.about.partners');
    }
    public function addpartner(){
        return view('admin.about.addpartner');
    }
    public function registration(){
        return view('admin.users.registration');
    }
    public function deletereg($id){
        $deletereg= Registration::find($id);
        $deletereg->delete();
        return redirect('/registration');
    }
    public function deletecontactreg($id){
        $deletecontactreg= Contact::find($id);
        $deletecontactreg->delete();
        return redirect('/registration');
    }
    public function deleteborrowreg($id){
        $deleteborrowreg= Borrow::find($id);
        $deleteborrowreg->delete();
        return redirect('/registration');
    }
    public function numb(){
        $numb= Registration::all();
        return redirect('home',['data'=>$numb]);
    }





}
