<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert dummy categories
        Category::create([
            'name' => 'Category 1',
            'image' => 'salad.jpg'
        ]);

        Category::create([
            'name' => 'Category 2',
            'image' => 'biriyani.jpg'
        ]);

        // Add more categories as needed
    }

}
