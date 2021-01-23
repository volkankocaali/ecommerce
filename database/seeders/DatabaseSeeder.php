<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        DB::table('addresses')->truncate();
        DB::table('categories')->truncate();
        DB::table('products')->truncate();
        DB::table('colors')->truncate();
        DB::table('category_products')->truncate();
        DB::table('product_photos')->truncate();
        DB::table('orders')->truncate();
        DB::table('order_products')->truncate();
        Schema::enableForeignKeyConstraints();

        $this->call(UserTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ColorTableSeeder::class);
        $this->call(ColorProductTableSeeder::class);
        $this->call(CategoryProductTableSeeder::class);
        $this->call(ProductPhotosTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderProductTableSeeder::class);

    }
}
