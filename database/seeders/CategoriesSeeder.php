<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
    Category::create([
        'name' => 'Snack',
        'description' => 'Kategori yang mencakup berbagai jenis makanan ringan.',
    ]);
    Category::create([
        'name' => 'Makanan Instant',
        'description' => 'Kategori yang mencakup berbagai jenis makanan siap saji.',
    ]);
    Category::create([
        'name' => 'Minuman',
        'description' => 'Kategori yang mencakup berbagai minuman kemasan.',
    ]);
}
}
