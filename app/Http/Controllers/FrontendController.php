<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cmspage;
use App\Models\Cart;

class FrontendController extends Controller
{
    public function index(){
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        return view('index', compact('cartItems', 'total'));
    }
    public function blog(){
        return view('post');
    }
    public function best_seller(){
        return view('best-seller');
    }
    public function contact(){
        return view('contact');
    }
    public function shop(){
        return view('shop');
    }
    public function product($id){
        $product = Product::find($id);
        return view('product-details', ['data'=>$product]);
    }
    public function support($id){
        $support = Cmspage::find($id);
        return view('support', ['data'=>$support]);
    }
    public function aboutus(){
        return view('about-us');
    }
    public function chandar_prakash_vyas(){
        return view('chandar-prakash-vyas');
    }
    public function rahul_tanvi(){
        return view('rahul-tanvi');
    }
    public function tanvi_jain(){
        return view('tanvi-jain');
    }

    public function testimonials(){
        return view('testimonials');
    }
    public function courses($id){
        $courses = Course::find($id);
        return view('courses', ['data'=>$courses]);

    }
    public function privacypolicy(){
        return view('privacy-policy');
    }
    public function addregnum(Request $request){
        $addregnum=new Registration();
        $addregnum->mobile=$request->input('mobile');
        $addregnum->save();
        return redirect('/');
    }

    public function contactinfo(Request $request){
        $contactinfo=new Contact();
        $contactinfo->name=$request->input('name');
        $contactinfo->email=$request->input('email');
        $contactinfo->mobile=$request->input('mobile');
        $contactinfo->loan=$request->input('loan');
        $contactinfo->message=$request->input('message');
        $contactinfo->save();
        return redirect('/contact')->with('status','Thank you for your message. It has been sent.!!!');
    }

    public function borrowreginfo(Request $request){
        $borrowreginfo=new Borrow();
        $borrowreginfo->fname=$request->input('fname');
        $borrowreginfo->lname=$request->input('lname');
        $borrowreginfo->email=$request->input('email');
        $borrowreginfo->mobile=$request->input('mobile');
        $borrowreginfo->method=$request->input('method');
        $borrowreginfo->region=$request->input('region');
        $borrowreginfo->reffer=$request->input('reffer');
        $borrowreginfo->loan=$request->input('loan');
        $borrowreginfo->message=$request->input('message');
        $borrowreginfo->save();
        return redirect('/how-much-can-i-borrow')->with('status','Thank you for your message. It has been sent.');    }

}
