<?php

namespace Webkul\Contact\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class PersonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 
     * @return void
     */
    public function run()
    {
        Model::unguard();  

        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 15; $i++) {

            $data =[
                'name' => $faker->name,
                'emails' => "[".json_encode([
                    "value" => $faker->email,
                    "label" => "work",
                ])."]",
                'contact_numbers' =>"[".json_encode([
                    "value" => $faker->phoneNumber,
                    "label" => "work",
                ])."]",
                'organization_id' => OrganizationSeeder::all()->random()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            urldecode($data['emails'] && $data['contact_numbers']);
            DB::table('persons')->insert($data);
        }
    }
}
