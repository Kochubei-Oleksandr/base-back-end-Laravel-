<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->integer('language_id')->unsigned();
            $table->integer('city_id')->unsigned();

            $table->foreign('language_id')->references('id')->on('languages');
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
        Schema::table('city_translations', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropForeign(['city_id']);
        });
        Schema::dropIfExists('city_translations');
    }
}
