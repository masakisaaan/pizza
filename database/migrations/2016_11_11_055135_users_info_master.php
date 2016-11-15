<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersInfoMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users_info_master', function (Blueprint $table) {
        $table->increments('id');//->primary(); //会員情報ID
        $table->string('member_mail'); //メールアドレス
        $table->integer('users_id');//->references('id')->on('users'); //会員ID
        $table->timestamps(); //登録・更新日
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('users_info_master');
    }
}
