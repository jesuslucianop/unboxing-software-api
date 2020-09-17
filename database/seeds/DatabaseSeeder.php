<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(bankAccountTableSeeder::class);
        $this->call(billTableSeeder::class);
        $this->call(rolTableSeeder::class);
        $this->call(multipleServicesTableSeeder::class);
        $this->call(referTableSeeder::class);
        $this->call(serviceTableSeeder::class);
        $this->call(usersTableSeeder::class);
        $this->call(statusTableSeeder::class);
        $this->call(userBenefitTableSeeder::class);
    }
}
