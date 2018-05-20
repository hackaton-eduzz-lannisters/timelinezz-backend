<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => 'mister poke',
                'avatar' => 'https://timeentertainment.files.wordpress.com/2013/05/fictioninfluence_list_homersimpson.jpg?w=350&h=350&crop=1'
            ], 
            [
                'id' => 2,
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => 'uuu george',
                'avatar' => 'http://icons.iconarchive.com/icons/jonathan-rey/simpsons/256/Marge-Simpson-icon.png'
            ]
        ]);
    }
}
