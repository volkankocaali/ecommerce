<?php

namespace Database\Seeders;

use App\Models\ColorProduct;
use Illuminate\Database\Seeder;

class ColorProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ColorProduct::factory(1000)->create();
    }
}
