<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $order = 1;
        return [
            'name' => $this->faker->name,
            'sku' => uniqid(),
            'description' => $this->faker->text,
            'price' => $this->faker->randomElement(['14.99','29.99','39.99','49.99','99.99']),
            'stock' => rand(1,100),
            'sort_order' => $order++ ,
        ];
    }
}
