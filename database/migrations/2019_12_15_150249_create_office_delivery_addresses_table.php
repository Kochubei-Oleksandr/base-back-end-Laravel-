<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeDeliveryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_delivery_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned();

            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('office_delivery_addresses', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });
        Schema::dropIfExists('office_delivery_addresses');
    }
}
