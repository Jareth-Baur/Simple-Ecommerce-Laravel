<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 75) as $index) {
            DB::table('products')->insert([
                'category_id' => $faker->numberBetween(1, 4), // Assuming you have 10 categories
                'title' => $faker->words(3, true),
                'desc' => $faker->sentence(15),
                'price' => $faker->randomFloat(2, 5, 500),
                'stock' => $faker->numberBetween(1, 100),
                'created_at' => Carbon::now()->subDays(rand(0, 365)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
