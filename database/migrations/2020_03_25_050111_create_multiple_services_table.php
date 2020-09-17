<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultipleServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_services', function (Blueprint $table) {
            $table->bigIncrements('idMultipleServices');
            $table->integer('idRefer');
             $table->integer('idService');
             $table->String('description');
            $table->integer('idStatus');
            $table->integer('idBill');

            $table->double('amount', 255, 0);
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
        Schema::dropIfExists('multiple_services');
    }
}
