<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $category= new Category;
        $category->name='name';
        $category->status=1;
        $category->order=1;
        $category->shortdescription='shortdescription';
        $category->fulldescription='fulldescription';
        $category->metatitle='metatitle';
        $category->metadescription='metadescription';
        $category->metakeywords='metakeywords';
        $category->cover='ccover.png';
        $category->image='cimage.png';
        $category->save();
    }
}
