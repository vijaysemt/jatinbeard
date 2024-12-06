<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;
use App\Models\Contact;
use App\Models\Borrow;
use App\Models\User;
use Hash;




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


     // Update password method
     public function updatePassword(Request $request, $id)
     {
         $user = User::find($id);
 
         // Validate the inputs
         $request->validate([
             'old_password' => 'required',
             'new_password' => 'required|confirmed|min:6',
         ]);
 
         // Check if the old password is correct
         if (!Hash::check($request->old_password, $user->password)) {
             return redirect()->back()->withErrors(['old_password' => 'Old password is incorrect']);
         }
 
         // Update the password
         $user->password = Hash::make($request->new_password);
         $user->save();
 
         return redirect()->route('profile')->with('success', 'Password updated successfully');
     }
 





}
