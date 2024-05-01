<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert dummy items
        Item::create([
            'category_id' => 1,
            'name' => 'Item 1',
            'description' => 'Description for Item 1',
            'price' => 10.99,
            'image' => 'item1.jpg'
        ]);

        Item::create([
            'category_id' => 2,
            'name' => 'Item 2',
            'description' => 'Description for Item 2',
            'price' => 15.99,
            'image' => 'item2.jpg'
        ]);

        // Add more items as needed
    }

}
