<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = \Illuminate\Support\Facades\DB::table('admins');
        $data = [
            [
                'id'=>1,
                'name'=>'admin',
                'account'=>'admin',
                'password'=>bcrypt('123456'),
                'last_login_ip'=>ip2long('127.0.0.1'),
                'status'=>1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
            ],
            [
                'id'=>2,
                'name'=>'账号管理员',
                'account'=>'account',
                'password'=>bcrypt('123456'),
                'last_login_ip'=>ip2long('127.0.0.1'),
                'status'=>1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
            ],
            [
                'id'=>3,
                'name'=>'角色管理员',
                'account'=>'role',
                'password'=>bcrypt('123456'),
                'last_login_ip'=>ip2long('127.0.0.1'),
                'status'=>1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
            ],
            [
                'id'=>4,
                'name'=>'账号角色管理员',
                'account'=>'account-role',
                'password'=>bcrypt('123456'),
                'last_login_ip'=>ip2long('127.0.0.1'),
                'status'=>1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
            ]
        ];
        $table->truncate();
        $table->insert($data);
    }
}
