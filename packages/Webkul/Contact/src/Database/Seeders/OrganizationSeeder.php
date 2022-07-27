<?php

namespace Webkul\Contact\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Event;
use Webkul\Contact\Repositories\OrganizationRepository;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;




class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $faker;
    protected $organizationRepository;
    protected $attributeValueRepository;
    protected $entityType;

    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
        $this->faker = Faker::create();
        request()->request->add(['entity_type' => 'organizations']);
    }
    
    public function run()
    {
        Model::unguard();

        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 5; $i++) {

           $data =  [
                'name' => $faker->company,
                'address' => json_encode([
                    "address" => $faker->address,
                    "country" => "ID",
                    "state" => $faker->state,
                    "city" => $faker->city,
                    "postcode" => $faker->randomNumber,
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            urldecode($data['address']);
            // $this->organizationRepository->create($data);
            DB::table('organizations')->insert($data);
        }
    }
    static function all()
    {
        return DB::table('organizations')->get();
    }
}
