<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'cate_id','name','order', 'description','fdescription','price','delivery','oprice','stock','weight','length','breadth','sku', 'tax','hsn','height','status','pcover','pimage','metatitle','metadescription','metakeywords','seohead'
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
