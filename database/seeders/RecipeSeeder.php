<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            'name' => "Beef and Barley Soup",
            'description' => 'Hearty and comforting, this soup is full of classic flavors that hit the spot as the weather cools.
            Smarts: This soup requires 60 minutes of hands-off simmer time to cook the pearl barley. If you are short on time, make the soup ahead (it reheats well), look for quick-cooking barley (Trader Joe’s sells one that cooks in 10 minutes) or use canned white beans as a substitute.',
            'thumbnail' => "https://cooksmarts.imgix.net/meal_photos/992/20171120-Beef-and-Barley-Soup-NM-3.jpg?ixlib=rails-4.2.0&auto=format",
        ]);
    }
}
