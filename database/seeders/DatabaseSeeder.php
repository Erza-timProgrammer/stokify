<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DummyUsersSeeder::class,
            SupplierSeeder::class,
            CategoriesSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
