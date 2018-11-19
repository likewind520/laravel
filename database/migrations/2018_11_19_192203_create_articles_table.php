<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('')->comment('文章标题');
            $table->unsignedInteger('user_id')->index()->default(0)->comment('文章作者');
            //数据迁移->外键约束 将作者与用户表中的id绑定
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            //将文章中栏目id与栏目表中的id绑定
            $table->unsignedInteger('category_id')->index()->default(0)->comment('文章栏目id');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
