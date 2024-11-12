<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class CategoriesAndSupplierSeeder extends Seeder
{
    public function run()
    {
        // Membuat 10 kategori
        Categories::factory()
            ->count(10)
            ->create();

        // Membuat 20 supplier
        Supplier::factory()
            ->count(20)
            ->create();
    }
}