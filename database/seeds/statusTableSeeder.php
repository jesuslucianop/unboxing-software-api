<?php

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class statusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusarray = ['Active', 'Inactive', 'Pending', ' in transit', 'Suspend'];
        DB::table('status')->insert([
            'name' => Arr::random($statusarray),
            'active' => Str::random(15)


        ]);
    }
}
