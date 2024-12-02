<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderMail extends Mailable
{
    
    use Queueable, SerializesModels;
    protected $order;

    public function __construct(Order $order){
        $this->order = $order;
    }
    public function build(){
        return $this->subject('Test Email')->view('email.ordermail', ['order' => $this->order]);
    }
}
