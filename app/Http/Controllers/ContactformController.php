<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFromMail;
use Illuminate\Support\Facades\Mail; // Import Mail facade

class ContactformController extends Controller
{
    public function postmessage(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'mobile' => 'required|string',
            'course' => 'required|string',
            'message' => 'required|string'
        ]);

        // Collect data from the request
        $data = [
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'course' => $request->input('course'),
            'message' => $request->input('message')
        ];

        // Send email
        Mail::to('getsearchforme@gmail.com')->send(new ContactFromMail($data));

        // Return response
        return back()->with('status', 'Form successfully submitted! We will contact you as soon as possible.');
    }
}
