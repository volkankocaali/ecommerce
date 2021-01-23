<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductPhotos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPhotosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductPhotos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $order= 1;
        return [
            'product_id' => Product::all()->random()->id,
            'path' => $this->faker->imageUrl(),
            'thumbnail_path' => $this->faker->imageUrl('250','250'),
            'alt' => $this->faker->text('10'),
            'is_active' => 1,
            'sort_order' => $order++,
        ];
    }
}
