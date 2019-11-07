<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('mobile',11)->nullable()->comment('手机');
            $table->string('password')->nullable()->comment('密码');
            $table->string('openid')->default('')->comment('微信openid');
            $table->string('nickname')->comment('昵称');
            $table->unsignedInteger('last_login_ip')->nullable()->comment('上次登录ip');
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
        Schema::dropIfExists('users');
    }
}
