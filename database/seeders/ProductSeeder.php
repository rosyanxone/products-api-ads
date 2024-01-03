<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Logitech H111 Headset Stereo Single Jack 3.5mm',
                'price' => 80000
            ],
            [
                'category_id' => 1,
                'name' => 'Philips Rice Cooker - Inner Pot 2L Bakuhanseki - HD3110/33',
                'price' => 249000
            ],
            [
                'category_id' => 4,
                'name' => 'Iphone 12 64Gb/128Gb/256Gb Garansi Resmi IBOX/TAM - Hitam, 64Gb',
                'price' => 11340000
            ],
            [
                'category_id' => 5,
                'name' => 'Papan alat bantu Push Up Rack Board Fitness Workout Gym',
                'price' => 90000
            ],
            [
                'category_id' => 2,
                'name' => 'Jim Joker - Sandal Slide Kulit Pria Bold 2S Hitam - Hitam',
                'price' => 305000
            ]
        ];
        
        foreach($products as $product) {
            Product::create([
                'category_id' => $product['category_id'],
                'name' => $product['name'],
                'slug' => Str::slug(
                    $product['name'], '-', 'en', 
                    [
                        '/' => '-', 
                        '.' => '-'
                    ]
                ),
                'price' => $product['price']
            ]);
        }
    }
}
