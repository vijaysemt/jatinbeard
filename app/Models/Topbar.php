<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topbar extends Model
{
    use HasFactory;
    protected $table ='topbar';
    public $timestamps = false;
    protected $fillable= [
        'topbar',
    ];
}
