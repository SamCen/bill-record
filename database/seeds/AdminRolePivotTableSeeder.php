<?php

use Illuminate\Database\Seeder;

class AdminRolePivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = \Illuminate\Support\Facades\DB::table('admin_role_pivot');
        $data = [
            [
                'admin_id'=>2,
                'role_id'=>2
            ],
            [
                'admin_id'=>3,
                'role_id'=>3
            ],
            [
                'admin_id'=>4,
                'role_id'=>2
            ],
            [
                'admin_id'=>4,
                'role_id'=>3
            ],
        ];
        $table->truncate();
        $table->insert($data);
    }
}
