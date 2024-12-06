<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class website extends Controller
{

    public function index(){
        return view('hello');
    }

}
