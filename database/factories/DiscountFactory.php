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
            'type' => "fixed",
            'rules' => json_encode([
                'minimum_purchase' => $this->faker->numberBetween(50, 500),
                'applicable_products' => Arr::random(['product1', 'product2', 'product3']),
            ]),
            'availability' => $this->faker->numberBetween(0, 999),
            'applied_to' => 'product',
            'brand_id' => function(){
                return Brand::factory()->create()->id;
            },
            // 'category_id' => function(){
            //     return Category::factory()->create()->id;
            // },
            // 'sub_category_id' => function(){
            //     return SubCategory::factory()->create()->id;
            // },
            // 'product_id' => function(){
            //     return Product::factory()->create()->id;
            // },
            'started_at' => Carbon::now(),
            'expired_at' => Carbon::now()->addDays(30)
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
