<?php

use Illuminate\Database\Seeder;

class RolePrivilegePivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = \Illuminate\Support\Facades\DB::table('role_privilege_pivot');
        $data = [
            [
                'role_id'=>2,
                'privilege_code'=>'home',
            ],
            [
                'role_id'=>2,
                'privilege_code'=>'admin',
            ],
            [
                'role_id'=>2,
                'privilege_code'=>'admin-list',
            ],
            [
                'role_id'=>2,
                'privilege_code'=>'admin-add',
            ],
            [
                'role_id'=>2,
                'privilege_code'=>'admin-edit',
            ],
            [
                'role_id'=>2,
                'privilege_code'=>'admin-delete',
            ],

            [
                'role_id'=>3,
                'privilege_code'=>'home',
            ],
            [
                'role_id'=>3,
                'privilege_code'=>'role',
            ],
            [
                'role_id'=>3,
                'privilege_code'=>'role-list',
            ],
            [
                'role_id'=>3,
                'privilege_code'=>'role-add',
            ],
            [
                'role_id'=>3,
                'privilege_code'=>'role-edit',
            ],
            [
                'role_id'=>3,
                'privilege_code'=>'role-delete',
            ],
        ];
        $table->truncate();
        $table->insert($data);
    }
}
