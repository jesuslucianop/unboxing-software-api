<?php


use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolesarray = ['admin','User'];
        DB::table('rol')->insert([
            'name' => Arr::random($rolesarray),
            'description' => Str::random(15),
            'idStatus' => '2'

        ]);
    }
}
