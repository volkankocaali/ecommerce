<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street' => $this->faker->streetName,
            'house_number' => $this->faker->numberBetween(0,10),
            'zipcode' => $this->faker->postcode,
            'city' => $this->faker->city,
            'district' => $this->faker->streetName,
            'type' => $this->faker->randomElement(['billing','shipping']),
            'country' => $this->faker->country,
            'user_id' => rand(1,100),
        ];
    }
}
