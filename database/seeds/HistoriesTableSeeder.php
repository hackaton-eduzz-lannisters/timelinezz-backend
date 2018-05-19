<?php

use Illuminate\Database\Seeder;

class HistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('histories')->insert([[
                'user_id' => 1,
                'action_id' => 3,
                'product_id' => 4,
                'sponsored' => true,
                'additional_message' => 'Os Simpsons melhoraram em *40%*!',
                'link_id' => null
            ],
            [
                'user_id' => 2,
                'action_id' => 3,
                'product_id' => 4,
                'sponsored' => false,
                'additional_message' => null,
                'link_id' => 1
            ]]);
    }
}
