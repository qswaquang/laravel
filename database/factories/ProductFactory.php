<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->name,
            'stock' => rand(1, 100),
            'old_price' => $this->faker->numerify('##########'),
            'price' => $this->faker->numerify('##########'),
            'category_id' => $this->faker->randomElement([3, 4, 5, 7, 8, 11, 12, 14, 15,16,17]),
        ];
    }
}
