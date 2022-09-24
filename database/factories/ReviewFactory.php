<?php

namespace Database\Factories;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
             'customer'=> $this->faker->word,
             'review'=> $this->faker->paragraph,
             'star'=>$this->faker->randomDigit,
             'product_id'=>function(){
                return Product::all()->random();
             },
             // 'product_id' => factory('\App\Models\Review::class'),

        ];
    }
}
