<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->nullable()->comment('分区名');
            $table->string('host')->default('')->nullable()->comment('IP地址');
            $table->string('username')->default('')->nullable()->comment('用户名');
            $table->string('password')->default('')->nullable()->comment('密码');
            $table->unsignedInteger('port')->default('3306')->nullable()->comment('端口');
            $table->unsignedInteger('sort')->default('0')->nullable()->comment('排序');
            $table->string('dbname')->default('')->nullable()->comment('数据库名');
            $table->boolean('status')->nullable()->comment('状态');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zone');
    }
}
