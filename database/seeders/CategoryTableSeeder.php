<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
                ['name' => 'Shirt', 'description' => 'Comfortable and stylish shirts.', 'status' => 1, 'image' => 'shirt.png'],
                ['name' => 'Gaming', 'description' => 'Latest gaming gear and accessories.', 'status' => 1, 'image' => 'gaming.png'],
                ['name' => 'Watch', 'description' => 'Stylish and modern watches.', 'status' => 1, 'image' => 'watch.png'],
                ['name' => 'Shoes', 'description' => 'Trendy and comfortable shoes for every occasion.', 'status' => 1, 'image' => 'shoes.png'],
           ];

           foreach ($categories as $category) {
            Category::insert([
                'image' => $category['image'],
                'name' => $category['name'],
                'description' => $category['description'],
                'status' => $category['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
