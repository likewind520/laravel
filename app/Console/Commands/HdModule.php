<?php

namespace App\Console\Commands;

use App\Models\Module;
use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HdModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hd_module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '自定义命令提示';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        //扫描出 app/Http/Controllers里面所有文件以及文件夹
        $modules=glob('app/Http/Controllers/*');
        //dd($modules); 通过自定义的hd_module在命令行中打印
        foreach ($modules as $module){
            //dd($module); 只能打印一条  不能用dd打印
           // dump($module);
           //判断模块里面 System 是否为目录,
            //if判断是为了获得模块中有System目录的模块
            if (is_dir($module.'/System')){
                 //dump($module);
                //获取模块为英文标识
                //basename php 函数,用户获取整个路径最后一部分
               $moduleName=basename($module);
               //dump($moduleName); "Admin" "Wechat"
                //获取模块中文名称:System/config.php
               $config= include $module.'/System/config.php';
                //dump($config);array:1 ["app" => "后台管理"] array:1 ["app" => "微信管理"]
                //获取模块中所有的权限
                $permissions=include $module.'/System/permission.php';
                //dump($permissions);
                //将模块数据写入数据表中:title name permissions
                //执行完成这句代码,那么 modules 表就应该有数据被写入
                //fill([]);填充
                //->save() 为什么用save()而没有用create(),就是为了每次执行hd_module命令后都会生成一次
                //firstOrNew 和save 配套使用数据表中name字段有内容就查找没有就创建出
                Module::firstOrNew(['name'=>$moduleName])->fill([
                    'title'=>$config['app'],'permissions'=>$permissions
                ])->save();
                //将所有设定权限写入权限表:title name module
                //执行完成这句代码,那么 permission 表就应该有数据被写入
                foreach ($permissions as $permission){
                    //dump($permission);
                    Permission::firstOrNew(['name'=>$moduleName . '-' . $permission['name']])->fill([
                        'title'=>$permission['title'],
                        'module'=>$moduleName
                    ])->save();
                }
            }
        }
        //=======================================//
        //给指定一个用户设置站长角色,站长角色要拥有所有权限
        //设置一个角色填充文件,系统初始需要有一个站长角色
        //将所有权限设置给站长这个角色
        //找到站长这个角色对象
        $role=Role::where('name','webmaster')->first();
        //dump($role);
        //获取所有权限 pluck()获取name这一列的数据
        $permissions = Permission::pluck('name');
        //dump($permissions);所有权限的英文标识
        //给角色同步权限
        //执行完成这句话之后 role_has_permissions表应该有数据
        $role->syncPermissions($permissions);
        //获得设置成站长的那个用户
        $user = User::find(1);
        //给用户同步权限
        //注意如果执行报错:App\User 模型中未定义assignRole,解决办法:需要在 User 模型中引入HasRoles类
        $user->assignRole('webmaster');
        //清除权限缓存
        app()['cache']->forget('spatie.permission.cache');
        //命令执行成功提示信息
        $this->info('permission init successfully');
    }
}
