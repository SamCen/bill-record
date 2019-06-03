<?php

use Illuminate\Database\Seeder;

class PrivilegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = \Illuminate\Support\Facades\DB::table('privileges');
        $data = [
            [
                'code'=>'home',
                'parent_code'=>null,
                'name'=>'首页权限',
                'menu_id'=>1,
                'type'=>'menu',
            ],
            [
                'code'=>'admin',
                'parent_code'=>null,
                'name'=>'账号管理权限',
                'menu_id'=>2,
                'type'=>'menu',
            ],
            [
                'code'=>'role',
                'parent_code'=>null,
                'name'=>'角色管理权限',
                'menu_id'=>3,
                'type'=>'menu',
            ],
            [
                'code'=>'admin-list',
                'parent_code'=>'admin',
                'name'=>'账号列表权限',
                'menu_id'=>4,
                'type'=>'menu',
            ],
            [
                'code'=>'admin-add',
                'parent_code'=>'admin',
                'name'=>'账号添加权限',
                'menu_id'=>null,
                'type'=>'button',
            ],
            [
                'code'=>'admin-edit',
                'parent_code'=>'admin',
                'name'=>'账号修改权限',
                'menu_id'=>null,
                'type'=>'button',
            ],
            [
                'code'=>'admin-delete',
                'parent_code'=>'admin',
                'name'=>'账号修改权限',
                'menu_id'=>null,
                'type'=>'button',
            ],
            [
                'code'=>'role-list',
                'parent_code'=>'role',
                'name'=>'角色列表权限',
                'menu_id'=>5,
                'type'=>'button',
            ],
            [
                'code'=>'role-add',
                'parent_code'=>'role',
                'name'=>'角色添加权限',
                'menu_id'=>null,
                'type'=>'button',
            ],
            [
                'code'=>'role-edit',
                'parent_code'=>'role',
                'name'=>'角色修改权限',
                'menu_id'=>null,
                'type'=>'button',
            ],
            [
                'code'=>'role-delete',
                'parent_code'=>'role',
                'name'=>'角色删除权限',
                'menu_id'=>null,
                'type'=>'button',
            ],
        ];
        $table->truncate();
        $table->insert($data);
    }
}
