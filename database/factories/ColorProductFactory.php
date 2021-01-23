<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ColorProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'color_id' => Color::all()->random()->id,
            'product_id' => Product::all()->random()->id,
        ];
    }
}
