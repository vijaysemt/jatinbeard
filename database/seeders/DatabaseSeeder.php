<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;
use App\models\Product;
use App\models\Category;
use App\models\Label;
use App\models\Trending;
use App\models\Cmspage;
use App\Models\Slider;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UsersTableSeeder::class,
            ProductSeeder::class,
            CategorySeeder::class,
            LabelSeeder::class,
            TrendingSeeder::class,
            CmspageSeeder::class,
            SliderSeeder::class,
        ]);
    }
}
