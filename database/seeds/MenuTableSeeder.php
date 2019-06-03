<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = \Illuminate\Support\Facades\DB::table('menus');
        $data = [
            [
                'id'=>1,
                'parent_id'=>0,
                'name'=>'主页',
                'path'=>'/home',
                'component'=>'Home',
                'icon'=>null,
                'meta'=>json_encode(['title'=>'首页']),
            ],
            [
                'id'=>2,
                'parent_id'=>0,
                'name'=>'账号管理',
                'path'=>null,
                'component'=>null,
                'icon'=>null,
                'meta'=>json_encode(['title'=>'账号管理']),
            ],
            [
                'id'=>3,
                'parent_id'=>0,
                'name'=>'角色管理',
                'path'=>null,
                'component'=>null,
                'icon'=>null,
                'meta'=>json_encode(['title'=>'角色管理']),
            ],
            [
                'id'=>4,
                'parent_id'=>2,
                'name'=>'账号列表',
                'path'=>'/admin',
                'component'=>'Admin',
                'icon'=>null,
                'meta'=>json_encode(['title'=>'账号列表']),
            ],
            [
                'id'=>5,
                'parent_id'=>3,
                'name'=>'角色列表',
                'path'=>'/role',
                'component'=>'Role',
                'icon'=>null,
                'meta'=>json_encode(['title'=>'角色列表']),
            ],
        ];
        $table->truncate();
        $table->insert($data);
    }
}
