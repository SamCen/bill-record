<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigInteger('parent_id')->default(0);
            $table->string('route')->comment('路由名称');
            $table->string('name')->comment('权限菜单名称');
            $table->string('type')->comment('权限菜单类型');
            $table->string('icon')->nullable()->comment('菜单图标');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privileges');
    }
}
