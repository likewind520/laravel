<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //注册
         $this->call(UsersTableSeeder::class);
         $this->call(CategoryTableSeed::class);
         $this->call(ArticleTableSeed::class);
    }
}
