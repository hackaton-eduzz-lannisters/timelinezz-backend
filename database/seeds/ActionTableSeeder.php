<?php

use Illuminate\Database\Seeder;

class ActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert([
            'id' => 3,
            'user_id' => 1,
            'name' => 'Novo produto',
            'tag' => 'NOVOPRODUTO',
            'template' => 'criou novo produto: "%product.name%"'
        ]);
    }
}
