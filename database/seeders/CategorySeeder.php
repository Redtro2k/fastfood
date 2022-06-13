<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            Category::create(['ctname' => 'Fast meal', 'ctdescription' => 'While any meal with low preparation time can be considered to be fast food, typically the term refers to food sold in a restaurant or store with preheated or precooked ingredients, and served to the customer in a packaged form for take-out/take-away.']);
            Category::create(['ctname' => 'Side dish', 'ctdescription' => 'A side dish is essentially any food served as an accompaniment to a main course. Beyond this basic definition, the exact nature of a side dish can vary widely, ranging from simple steamed vegetables to elaborate casseroles.']);
            Category::create(['ctname' => 'dessert', 'ctdescription' => 'Desserts can be defined as a usually sweeter course that concludes a meal. This definition includes a range of courses ranging from fruits or dried nuts to multi-ingredient cakes and pies. Many cultures have different variations of dessert.']);
            Category::create(['ctname' => 'beverages', 'ctdescription' => 'Actually, beverage means any kind of Liquid item. The word Beverage is a noun. Beverage can be hot and clod or an alcohol item and the beverage can be used for every thing that you can drink but sometimes it’s define gone to style of drinks like soft drinks.']);
    }
}
