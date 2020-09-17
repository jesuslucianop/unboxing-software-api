<?php


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bankAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank_account')->insert([
            'bankAccount' => '5898457',
            'idUser' => '2',
            'idStatus' => '2'

        ]);
    }
}
