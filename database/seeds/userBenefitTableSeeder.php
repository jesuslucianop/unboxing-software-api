<?php


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class userBenefitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_benefit')->insert([
            'idUser' => '1',
            'amountpay' => '809.554',
            'idStatus' => '1',
            'idBill' => '1'
        ]);
    }
}
