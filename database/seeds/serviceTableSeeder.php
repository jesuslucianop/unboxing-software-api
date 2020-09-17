<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class serviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


   $servicesarray = ['Web app', 'app mobile', 'graphic Design'];
        DB::table('service')->insert([
            'name' => Arr::random($servicesarray),
            'description' => Str::random(15),
            'idStatus' => '2'

        ]);
    }
}
