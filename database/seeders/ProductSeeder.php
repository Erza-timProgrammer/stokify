<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::factory()
            ->count(50) // Jumlah data dummy yang ingin dibuat
            ->create();
    }
}