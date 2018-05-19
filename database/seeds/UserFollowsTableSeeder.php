<?php

use Illuminate\Database\Seeder;

class UserFollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_follows')->insert([[
                'user_id' => 1,
                'following_id' => 2,
            ],
            [
                'user_id' => 2,
                'following_id' => 1,
            ]]);
    }
}
