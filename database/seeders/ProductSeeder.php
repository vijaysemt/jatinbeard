<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{

    public function run(): void
    {

        $product= new Product;
        $product->cate_id='1';
        $product->name='Product name';
        $product->order='1';
        $product->description='description';
        $product->fdescription='fdescription';
        $product->price='500';
        $product->oprice='650';
        $product->stock='1';
        $product->pcover='pcover.png';
        $product->pimage='pimage.png';
        $product->metatitle='metatitle';
        $product->metadescription='metadescription';
        $product->metakeywords='metakeywords';
        $product->seohead='seohead';
        $product->save();

    }

}
