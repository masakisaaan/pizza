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
            $table->increments('id');
            $table->string('name',50);
            $table->string('kana',100);
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('postel'); //郵便番号
            $table->string('address1'); //住所1
            $table->string('address2'); //住所2
            $table->string('address3')->nullable(); //住所3
            $table->string('phone'); //電話番号
            $table->integer('gender_id');//->references('id')->on('gender_master'); //性別ID
            $table->date('birthday'); //生年月日
            $table->integer('authority_id');//->references('id')->on('authorities_master'); //権限ID
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
        Schema::drop('users');
    }
}
