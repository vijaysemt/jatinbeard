<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Validator;


class BorrowFromMail extends Mailable
{
    use Queueable, SerializesModels;

    /* Create a new message instance.
    */
   public function __construct($data)
   {
       $this->data=$data;
   }
   public function Build(){
       return $this->view('borrow',[
           'data'=>$this->data
       ])->subject('www.gmfinance.nz How much can I Borrow new Enquiry');
   }

}
