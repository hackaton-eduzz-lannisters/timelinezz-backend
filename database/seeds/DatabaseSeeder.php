<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            AppTableSeeder::class,
            ProductTableSeeder::class,
            LinkTableSeeder::class,
            ActionTableSeeder::class,
            UserFollowsTableSeeder::class,
            UserGroupTableSeeder::class,
            HistoriesTableSeeder::class,
        ]);
    }
}
