<?php

namespace Database\Seeders;

use App\Models\ProductAsset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_assets = [
            [
                'product_id' => 1,
                'image' => 'logitech-h111.png'
            ],
            [
                'product_id' => 1,
                'image' => 'logitech-h111-headset-stereo-single-jack-3-5mm.png'
            ],
            [
                'product_id' => 2,
                'image' => 'philips-rice-cooker-inner-pot-2l-bakuhanseki-hd3110-33.png'
            ],
            [
                'product_id' => 2,
                'image' => 'philips.png'
            ],
            [
                'product_id' => 2,
                'image' => 'philips-rice-cooker.png'
            ],
            [
                'product_id' => 3,
                'image' => 'iphone-12-64gb-128gb-256gb.png'
            ],
            [
                'product_id' => 4,
                'image' => 'papan-alat-bantu-push-up.png'
            ],
            [
                'product_id' => 5,
                'image' => 'jim-joker-sandal-slide-kulit-pria-bold-2s-hitam-hitam.png'
            ]
        ];
        
        foreach($product_assets as $product_asset) {
            ProductAsset::create([
                'product_id' => $product_asset['product_id'],
                'image' => $product_asset['image']
            ]);
        }
    }
}
