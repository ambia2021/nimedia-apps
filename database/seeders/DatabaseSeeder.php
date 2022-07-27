<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\Admin\Database\Seeders\DatabaseSeeder as AdminDatabaseSeeder;
use Webkul\Core\Database\Seeders\DatabaseSeeder as CoreDatabaseSeeder;
use Webkul\Expenses\Database\Seeders\DatabaseSeeder as ExpensesDatabaseSeeder;
use Webkul\User\Database\Seeders\DatabaseSeeder as UserDatabaseSeeder;
use Webkul\Contact\Database\Seeders\DatabaseSeeder as ContactDatabaseSeeder;
use Webkul\Product\Database\Seeders\DatabaseSeeder as ProductDatabaseSeeder;


class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminDatabaseSeeder::class);
        // $this->call(ExpensesDatabaseSeeder::class);
        // $this->call(CoreDatabaseSeeder::class);
        // $this->call(UserDatabaseSeeder::class);
        // $this->call(ContactDatabaseSeeder::class);
        // $this->call(ProductDatabaseSeeder::class);
    }
}
