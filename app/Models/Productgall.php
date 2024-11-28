<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productgall extends Model
{
    use HasFactory;
    protected $table = 'productgalls';
    protected $fillable = [
        'pimage',
        'alt',
        'pid'
    ];
}
