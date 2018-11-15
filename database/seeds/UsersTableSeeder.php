<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //调用模型工厂，一次性填充30个数据
        factory(\App\User::class,30)->create();
        //修改第一个数据为正式数据
        $user=\App\User::find(1);
        $user->name='胡黎明';
        $user->email='942167232@qq.com';
        $user->password=bcrypt('1111');
        $user->is_admin=true;
        $user->save();

    }
}
