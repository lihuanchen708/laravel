<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpireUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empire_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vld_key')->unique()->default("abc")->comment('使用码');
            $table->integer('deadline')->default(1662723111)->comment('到期时间戳');
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
        Schema::dropIfExists('empire_users');
    }
}
