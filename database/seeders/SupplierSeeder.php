<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
{
    Supplier::create([
        'name' => 'PT Indofood',
        'address' => 'Jl. Payakumbuh No.4', 
        'phone' => '02144223432',
        'email' => 'indofood@gmail.com',
    ]);
    Supplier::create([
        'name' => 'PT. Naraya Cahaya Mentari',
        'address' => 'Jl. Pringgolayan No.4', 
        'phone' => '02129834562',
        'email' => 'ncm@gmail.com',
    ]);
    Supplier::create([
        'name' => 'PT Jaya Utama Santika',
        'address' => 'Jl. Ungaran No.3', 
        'phone' => '0214927341',
        'email' => 'jaya@gmail.com',
    ]);
    Supplier::create([
        'name' => 'Big Day Mart',
        'address' => 'Jl. Harahap No.124', 
        'phone' => '02177736221',
        'email' => 'bdm@gmail.com',
    ]);
    Supplier::create([
        'name' => 'CV 7 BROTHERS', 
        'address' => 'Jl. Indah No.363', 
        'phone' => '0211162628',
        'email' => 'brother@gmail.com',
    ]);
}

}