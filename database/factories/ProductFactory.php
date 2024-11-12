<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        $purchase_price = $this->faker->numberBetween(10000, 1000000);
        $markup = $this->faker->numberBetween(10, 50); // markup 10-50%
        $selling_price = $purchase_price * (1 + ($markup/100));

        return [
            'category_id' => Categories::factory(),
            'supplier_id' => Supplier::factory(),
            'name' => $this->faker->words(3, true),
            'sku' => $this->faker->unique()->ean13(),
            'description' => $this->faker->paragraph(),
            'purchase_price' => $purchase_price,
            'selling_price' => $selling_price,
            'image' => 'products/dummy-' . $this->faker->numberBetween(1, 5) . '.jpg',
        ];
    }
}