<?php


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class multipleServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('multiple_services')->insert([
            'idRefer' => '1',
            'idService' => '2',
            'description' => Str::random(10),
            'idStatus' => '2',
            'idBill' => '2',
            'amount' => '855.4887'

        ]);
    }
}
