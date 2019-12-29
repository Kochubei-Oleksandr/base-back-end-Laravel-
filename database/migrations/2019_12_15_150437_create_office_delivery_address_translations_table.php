<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeDeliveryAddressTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_delivery_address_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('language_id')->unsigned();
            $table->integer('office_delivery_address_id')->unsigned();

            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('office_delivery_address_id')->references('id')->on('office_delivery_addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('office_delivery_address_translations', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropForeign(['office_delivery_address_id']);
        });
        Schema::dropIfExists('office_delivery_address_translations');
    }
}
