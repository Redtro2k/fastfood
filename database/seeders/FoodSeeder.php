<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Food::create([
        //     'fbname' => 'Fried Checken',
        //     'fbprice' => 67.00,
        //     'fbimage'=> 'Fried_Chicken.png',
        //     'category_id' => 1
        // ]);
        Food::create([
            'fbname' => 'Chicken Sandwich',
            'fbprice' => 68.00,
            'fbimage'=> 'Chicken_Sandwich.png',
            'category_id' => 1
        ]);
    }
}
