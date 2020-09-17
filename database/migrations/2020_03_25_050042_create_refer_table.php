<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refer', function (Blueprint $table) {
            $table->bigIncrements('idRefer');
            $table->String('name');
            $table->String('lastName');
            $table->String('phone');
            $table->String('identification');
            $table->String('email');
            $table->integer('idUser');
            $table->integer('idStatus');
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
        Schema::dropIfExists('refer');
    }
}
