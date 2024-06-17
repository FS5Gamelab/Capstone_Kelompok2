<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(mt_rand(2, 8)),
            'applied_to' => 'global',
            'type' => "fixed",
            'value' => $this->faker->numberBetween(10000, 500000),
            'max_value' => $this->faker->numberBetween(500000, 1000000),
            'details' => json_encode([
                'periode' => [
                    'start' => Carbon::now(),
                    'end' => Carbon::now()->addDays(30)
                ]
            ]),
            // 'brand_id' => function(){
            //     return Brand::factory()->create()->id;
            // },
            // 'category_id' => function(){
            //     return Category::factory()->create()->id;
            // },
            // 'sub_category_id' => function(){
            //     return SubCategory::factory()->create()->id;
            // },
            // 'product_id' => function(){
            //     return Product::factory()->create()->id;
            // },
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Discount $discount){
            $discount->brand_id = Brand::factory()->create()->id;
            // $discount->category_id = Category::factory()->create()->id;
            // $discount->sub_category_id = SubCategory::factory()->create()->id;
            // $discount->product_id = Product::factory()->create()->id;
            $discount->save();
        });
    }
}
