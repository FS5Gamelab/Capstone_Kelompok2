<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
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
            'description' => $this->faker->sentence(mt_rand(5, 10)),
            'category_id' => $this->faker->numberBetween(1,100)
        ];
    }
}
