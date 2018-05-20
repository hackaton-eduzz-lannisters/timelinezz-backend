<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->insert([
            'id' => 1,
            'title' => 'Some link',
            'description' => 'Some link description',
            'image' => 'https://sire-media-foxpt.fichub.com/generic/photogallery-photo/15/38295.custom.jpg',
            'url' => 'http://www.simpsonsworld.com/'
        ]);
    }
}
