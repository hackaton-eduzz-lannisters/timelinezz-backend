<?php

use Illuminate\Database\Seeder;

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
