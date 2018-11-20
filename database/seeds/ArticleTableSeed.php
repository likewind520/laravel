<?php

use Illuminate\Database\Seeder;

class ArticleTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //一次性填充
       factory(\App\Models\Article::class,100)->create();
    }
}
