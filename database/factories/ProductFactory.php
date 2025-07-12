<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->words(3, true); // Nombre más realista
        $price = $this->faker->randomFloat(2, 20, 100);
        $discount = $this->faker->randomFloat(2, 0, $price); // Nunca mayor que el precio

        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'price' => $price,
            'discount_price' => $discount,
            'description' => $this->faker->paragraphs(3, true), // 3 párrafos como string
        ];
    }
}
