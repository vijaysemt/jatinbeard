<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;
    protected $table='coupon';
    protected $fillable=[
        'name',
        'percentage',
        'price',
        'status',
    ];
}
