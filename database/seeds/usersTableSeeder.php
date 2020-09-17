<?php


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('users')->insert([
        'name' => Str::random(10),
            'lastName' => Str::random(10),
            'identification' => Str::random(10),
            'phone' =>'809',
            'address' =>'809',
            'email' => Str::random(10).'@hotmail.com',
            'idBankAccount' =>'1',
            'idRefer' =>'2',
            'idStatus' =>'1',
            'idRol' =>'1',
            'notification' =>'8',
            'percent' =>'89',

     ]);
    }
}
