<?php

namespace Webkul\Expenses\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Webkul\Expenses\Models\ExpenseModel;
use Faker\Factory as Faker;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     *
     * @return void
     */
    public function run()
    {
        
        // Model::unguard();
        // ExpenseModel::factory(10)->create();
        
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 50; $i++){
            
            DB::table('expenses')->insert([
                'subject' => $faker->name,
            'description' => $faker->paragraph,
            'price' => $faker->randomNumber,
            'amount' => $faker->randomDigit,
            'tax_amount' => $faker->randomNumber,
            'grand_total' => $faker->randomNumber,
            'date_transac' => $faker->datetime,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
}
