<?php



use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class referTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('refer')->insert([
            'name' => Str::random(10),
            'lastName' => Str::random(10),
            'phone' => Str::random(10),
            'identification' => Str::random(10),
            'email' => Str::random(10) . '@hotmail.com',
            'idUser' => '1',
            'idStatus' => '1'

        ]);
    }
}
