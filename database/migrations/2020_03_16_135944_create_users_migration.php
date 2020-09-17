<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersMigration extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('idUser');
            $table->String('name');
            $table->String('lastName');
            $table->String('token');
            $table->integer('phone');
            $table->String('password');  
            $table->String('address');
            $table->String('email');
            $table->integer('notification');
            $table->integer('idBankAccount');
            $table->integer('idRefer');
            $table->integer('idStatus');
            $table->integer('idRol');
            $table->integer('percent');
              
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
