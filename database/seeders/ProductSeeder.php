<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
{
    Product::create([
        'category_id' => 1,
        'supplier_id' => 2,
        'name' => 'Cosmos Kipas Angin',
        'sku' => '1234567890123',
        'description' => 'Kipas Angin berdiri, terbuat dari bahan alumunium',
        'purchase_price' => 135000,
        'selling_price' => 150000,
        'image' => 'products/product-1.jpg',
    ]);

    Product::create([
        'category_id' => 1,
        'supplier_id' => 4,
        'name' => 'uniqlo Blender',
        'sku' => '1234567890124',
        'description' => 'Blender serbaguna dengan 5 kecepatan',
        'purchase_price' => 250000,
        'selling_price' => 300000,
        'image' => 'products/product-2.jpg',
    ]);

    Product::create([
        'category_id' => 1,
        'supplier_id' => 3,
        'name' => 'Philips TV 32 Inch',
        'sku' => '1234567890125',
        'description' => 'TV layar datar dengan resolusi Full HD',
        'purchase_price' => 1500000,
        'selling_price' => 1700000,
        'image' => 'products/product-3.jpg',
    ]);

    Product::create([
        'category_id' => 1,
        'supplier_id' => 3,
        'name' => 'Philips Rice Cooker',
        'sku' => '1234567890126',
        'description' => 'Rice Cooker dengan kapasitas 1.8 liter',
        'purchase_price' => 300000,
        'selling_price' => 350000,
        'image' => 'products/product-4.jpg',
    ]);

    Product::create([
        'category_id' => 2,
        'supplier_id' => 5,
        'name' => 'Sapu Ijuk',
        'sku' => '1234567890127',
        'description' => 'Sapu dengan bulu domba',
        'purchase_price' => 900000,
        'selling_price' => 1050000,
        'image' => 'products/product-5.jpg',
    ]);

    Product::create([
        'category_id' => 2,
        'supplier_id' => 4,
        'name' => 'Wajan Merah',
        'sku' => '1234567890128',
        'description' => 'Wajan yang anti api',
        'purchase_price' => 2800000,
        'selling_price' => 3000000,
        'image' => 'products/product-6.jpg',
    ]);

    Product::create([
        'category_id' => 1,
        'supplier_id' => 1,
        'name' => 'Toshiba Microwave',
        'sku' => '1234567890129',
        'description' => 'Microwave dengan kapasitas 23 liter',
        'purchase_price' => 600000,
        'selling_price' => 750000,
        'image' => 'products/product-7.jpg',
    ]);

    Product::create([
        'category_id' => 3,
        'supplier_id' => 5,
        'name' => 'Hordeng Batik',
        'sku' => '1234567890130',
        'description' => 'Hordeng Yang tembus pandang',
        'purchase_price' => 3500000,
        'selling_price' => 4000000,
        'image' => 'products/product-8.jpg',
    ]);

    Product::create([
        'category_id' => 3,
        'supplier_id' => 5,
        'name' => 'Karpet manik manik',
        'sku' => '1234567890131',
        'description' => 'Karpet dengan ukuran 3x4 meter',
        'purchase_price' => 5000000,
        'selling_price' => 5500000,
        'image' => 'products/product-9.jpg',
    ]);

    Product::create([
        'category_id' => 3,
        'supplier_id' => 4,
        'name' => 'Pintu Geser',
        'sku' => '1234567890132',
        'description' => 'Pintu dengan sistem geser',
        'purchase_price' => 2000000,
        'selling_price' => 2200000,
        'image' => 'products/product-10.jpg',
    ]);
}

}