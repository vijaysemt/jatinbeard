<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categorys";
    protected $fillable = [
        'name',
        'order',
        'status',
        'shortdescription',
        'fulldescription',
        'metatitle',
        'metadescription',
        'metakeywords',
        'cover',
        'image',
    ];


}
