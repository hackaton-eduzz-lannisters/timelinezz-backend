<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_groups')->insert([
            'id' => 2,
            'user_id' => 1,
            'name' => str_random(10),
            'token' => str_random(10)
        ]);
    }
}
