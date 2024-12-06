<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cmspage;

class CmspageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item=new Cmspage;
        $item->name='cmspagename';
        $item->order='1';
        $item->status='1';
        $item->content='content';
        $item->metatitle='metatitle';
        $item->metadescription='metadescription';
        $item->metakeywords='metakeywords';
        $item->save();
    }
}
