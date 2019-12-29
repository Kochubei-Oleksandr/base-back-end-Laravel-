<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->integer('language_id')->unsigned();
            $table->integer('region_id')->unsigned();

            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('region_id')->references('id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('region_translations', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropForeign(['region_id']);
        });
        Schema::dropIfExists('region_translations');
    }
}
