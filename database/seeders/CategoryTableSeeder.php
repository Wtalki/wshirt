<?php

namespace Database\Seeders;


use App\Models\Tag;
use App\Models\Size;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Support\Str;
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
                ['name' => 'Pants', 'description' => 'Latest Pants and accessories.', 'status' => 1, 'image' => 'pants.png'],
                ['name' => 'Watch', 'description' => 'Stylish and modern watches.', 'status' => 1, 'image' => 'watch.png'],
                ['name' => 'Shoes', 'description' => 'Trendy and comfortable shoes for every occasion.', 'status' => 1, 'image' => 'shoes.png'],
            ];

           foreach ($categories as $category) {
                $category = Category::insert([
                    'image' => $category['image'],
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'status' => $category['status'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }


            for ($i = 0; $i < 50; $i++) {
                $product = Product::create([
                    'name' => 'Product' . ($i + 1),
                    'sku_number' => 'SKU-' . strtoupper(Str::random(8)),
                    'gender' => ['men','women'][array_rand(['men','women'])],
                    'stock' => rand(1,50),
                    'price' => rand(5000,50000),
                    'status' => rand(0,1),
                    'template' => null,
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Quisque vel dui non lectus bibendum tincidunt. Donec vel convallis velit, ac commodo nunc. Duis vel eros consectetur, hendrerit purus at, pulvinar nunc. Sed at elit vel ex facilisis pellentesque.',
                    'type' => 'Type ' . rand(1,10),
                    'cover' => null,
                    'view_count' => rand(0,2000),
                    'category_id' => rand(1,4),
                ]);

                Discount::create([
                    'product_id' => $product->id,
                    'percentage' => rand(5, 25),
                    'text' => 'Discount text for Product ' . ($i + 1),
                ]);

                for ($j = 0 ; $j < 4 ; $j++){
                    Color::insert([
                        'product_id' => $product->id,
                        'color' => ['Red', 'Blue', 'Green','Black'][array_rand(['Red', 'Blue', 'Green','Black'])],
                        'color_code' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)),
                    ]);
                }

                for ($j = 0; $j < 2; $j++) {
                    Size::insert([
                        'product_id' => $product->id,
                        'size' => ['S', 'M', 'L', 'XL'][array_rand(['S', 'M', 'L', 'XL'])],
                    ]);
                }

                for ($j = 0; $j < 3; $j++) {
                    Tag::insert([
                        'product_id' => $product->id,
                        'tags' => ['new','trend','sale','discounted','selling fast', 'last 10'][array_rand(['new','trend','sale','discounted','selling fast', 'last 10'])],
                    ]);
                }

                for ($j = 0; $j < 4; $j++) {
                Image::insert([
                    'product_id' => $product->id,
                    'path' =>'/images/' . rand(1,160) . '.jpg',
                ]);
            }
            }
    }
}
