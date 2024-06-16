<?php

namespace Database\Factories;

use Carbon\Carbon;
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
    public function definition(): array
    {
        return [
            'code' => Carbon::now()->format('YmdHis') . mt_rand(100000, 999999),
            'name' => $this->faker->sentence(mt_rand(2, 8)),
            'size' => json_encode([
                'length' => 5,
                'width' => 5,
                'height' => 5,
                'weight' => 5
            ]),
            'stock' => $this->faker->numberBetween(10, 100),
            'price' => $this->faker->numberBetween(1000, 100000),
            'expired_at' => Carbon::now()->addDays(30),
            'description' => $this->faker->sentence(mt_rand(5, 10)),
            'category_id' => $this->faker->numberBetween(1, 1000),
            'brand_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
