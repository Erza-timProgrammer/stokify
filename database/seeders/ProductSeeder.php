<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Membuat 24 produk dengan nilai default untuk minimum_stock dan maximum_stock
        for ($i = 1; $i <= 24; $i++) {
            Product::create([
                'category_id'    => $faker->numberBetween(1, 3),
                'supplier_id'    => $faker->numberBetween(1, 5),
                'name'           => $faker->word . ' Product ' . $i,
                'sku'            => 'SKU' . $faker->unique()->numberBetween(100000, 999999),
                'description'    => $faker->sentence,
                'purchase_price' => $faker->randomFloat(2, 1000, 5000),
                'selling_price'  => $faker->randomFloat(2, 5000, 10000),
                'image'          => 'products/product-' . $faker->numberBetween(1, 10) . '.jpg',
                'stock'          => $faker->numberBetween(10, 100),
                'minimum_stock'  => 5,
                'maximum_stock'  => 8,
            ]);
        }

        // Membuat 3 produk dengan minimum_stock kurang dari 3
        for ($i = 1; $i <= 3; $i++) {
            Product::create([
                'category_id'    => $faker->numberBetween(1, 3),
                'supplier_id'    => $faker->numberBetween(1, 5),
                'name'           => 'Low Min Stock Product ' . $i,
                'sku'            => 'SKU' . $faker->unique()->numberBetween(100000, 999999),
                'description'    => $faker->sentence,
                'purchase_price' => $faker->randomFloat(2, 1000, 5000),
                'selling_price'  => $faker->randomFloat(2, 5000, 10000),
                'image'          => 'products/product-' . $faker->numberBetween(1, 10) . '.jpg',
                'stock'          => $faker->numberBetween(10, 100),
                // Minimum stock kurang dari 3, misalnya 0, 1, atau 2
                'minimum_stock'  => $faker->numberBetween(0, 2),
                'maximum_stock'  => 8,
            ]);
        }

        // Membuat 3 produk dengan maximum_stock lebih dari 10
        for ($i = 1; $i <= 3; $i++) {
            Product::create([
                'category_id'    => $faker->numberBetween(1, 3),
                'supplier_id'    => $faker->numberBetween(1, 5),
                'name'           => 'High Max Stock Product ' . $i,
                'sku'            => 'SKU' . $faker->unique()->numberBetween(100000, 999999),
                'description'    => $faker->sentence,
                'purchase_price' => $faker->randomFloat(2, 1000, 5000),
                'selling_price'  => $faker->randomFloat(2, 5000, 10000),
                'image'          => 'products/product-' . $faker->numberBetween(1, 10) . '.jpg',
                'stock'          => $faker->numberBetween(10, 100),
                'minimum_stock'  => 5,
                // Maximum stock lebih dari 10, misalnya antara 11 dan 20
                'maximum_stock'  => $faker->numberBetween(11, 20),
            ]);
        }
    }
}
