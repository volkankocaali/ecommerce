<?php

namespace Database\Seeders;

use App\Models\ProductPhotos;
use Illuminate\Database\Seeder;

class ProductPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductPhotos::factory(1000)->create();
    }
}
