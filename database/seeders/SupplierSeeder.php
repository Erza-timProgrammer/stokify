<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
{
    Supplier::create([
        'name' => 'Toshiba',
        'address' => 'Jl. Payakumbuh No.4', 
        'phone' => '02144223432',
        'email' => 'toshiba@gmail.com',
    ]);
    Supplier::create([
        'name' => 'Cosmos',
        'address' => 'Jl. Pringgolayan No.4', 
        'phone' => '02129834562',
        'email' => 'cosmos@gmail.com',
    ]);
    Supplier::create([
        'name' => 'Philips',
        'address' => 'Jl. Ungaran No.3', 
        'phone' => '0214927341',
        'email' => 'philips@gmail.com',
    ]);
    Supplier::create([
        'name' => 'uniqlo',
        'address' => 'Jl. Harahap No.124', 
        'phone' => '02177736221',
        'email' => 'uniqlo@gmail.com',
    ]);
    Supplier::create([
        'name' => 'Ikea', 
        'address' => 'Jl. Indah No.363', 
        'phone' => '0211162628',
        'email' => 'ikea@gmail.com',
    ]);
}

}