<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Label;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lable=new Label;
        $lable->name='sale';
        $lable->colorcode='#00000';
        $lable->status=0;
        $lable->save();

    }
}
