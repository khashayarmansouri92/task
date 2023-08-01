<?php

namespace Database\Seeders;

use App\Models\Product\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $name = $faker->words(2, true);
            $price = $faker->randomFloat(2, 1, 1000);
            $count = $faker->numberBetween(1, 100);

            Product::create([
                'name' => $name,
                'price' => $price,
                'inventory' => $count,
            ]);
        }
    }
}
