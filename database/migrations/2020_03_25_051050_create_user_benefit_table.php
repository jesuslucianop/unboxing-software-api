<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBenefitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_benefit', function (Blueprint $table) {
            $table->bigIncrements('idUserBenefit');
            $table->integer('idUser');
            $table->double('amountpay',255,0);
            $table->integer('idStatus');
            $table->integer('idBill');
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
        Schema::dropIfExists('user_benefit');
    }
}
