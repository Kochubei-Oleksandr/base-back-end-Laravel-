<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointDeliveryAddressTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_delivery_address_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('language_id')->unsigned();
            $table->integer('point_delivery_address_id')->unsigned();

            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('point_delivery_address_id')->references('id')->on('point_delivery_addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('point_delivery_address_translations', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropForeign(['point_delivery_address_id']);
        });
        Schema::dropIfExists('point_delivery_address_translations');
    }
}
