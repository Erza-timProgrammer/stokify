<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
    Categories::create([
        'name' => 'Elektronik Rumah Tangga',
        'description' => 'Kategori yang mencakup berbagai peralatan elektronik untuk rumah tangga.',
    ]);
    Categories::create([
        'name' => 'Perabotan Rumah Tangga',
        'description' => 'Kategori yang mencakup berbagai peralatan Perabotan untuk rumah tangga.',
    ]);
    Categories::create([
        'name' => 'Aksesoris Rumah Tangga',
        'description' => 'Kategori yang mencakup berbagai peralatan Aksesoris untuk rumah tangga.',
    ]);
}
}