<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trending;

class TrendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item=new Trending;
        $item->name='best seller';
        $item->order=1;
        $item->status=1;
        $item->save();

    }
}
