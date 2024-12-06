<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'country',
        'house',
        'postal_code',
        'zip',
        'gst',
        'save_address',
        'message',
        'payment_method',
        'total_amount',
        'status',
        'transaction_id',
        'razorpay_order_id',
        'shipment_id',
    ];
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
