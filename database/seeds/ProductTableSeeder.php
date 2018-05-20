<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 4,
            'user_id' => 1,
            'name' => 'Some product',
            'image' => 'https://sire-media-foxpt.fichub.com/generic/photogallery-photo/15/38295.custom.jpg',
            'url' => 'http://www.simpsonsworld.com/'
        ]);
    }
}
