<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmspage extends Model
{
    use HasFactory;
    protected $table='cmspages';
    protected $fillable=[
        'name',
        'content',
        'order',
        'status',
        'metatitle',
        'metadescription',
        'metakeywords',
    ];
}
