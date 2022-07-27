<?php

namespace Webkul\Product\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Webkul\Product\Models\Product;
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
        Model::unguard();
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 15; $i++) {
            DB::table('products')->insert([
                'sku' => $faker->unique()->randomNumber,
                'name' => 'Jasa '.$faker->word,
                'description' => $faker->paragraph,
                'quantity' => $faker->numberBetween(1, 12),
                'price' => $faker->numberBetween(1, 10)*1000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
