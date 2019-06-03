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
        $this->call(AdminTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PrivilegeTableSeeder::class);
        $this->call(RolePrivilegePivotTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(AdminRolePivotTableSeeder::class);
    }
}
