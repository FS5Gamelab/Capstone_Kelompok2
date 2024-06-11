<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'description' => $this->faker->sentence(mt_rand(5, 10))
        ];
    }
}
