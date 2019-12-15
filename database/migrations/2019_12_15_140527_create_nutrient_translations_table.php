<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutrientTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrient_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('language', 3);
            $table->integer('nutrient_id')->unsigned();

            $table->foreign('nutrient_id')->references('id')->on('nutrients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nutrient_translations', function (Blueprint $table) {
            $table->dropForeign(['nutrient_id']);
        });
        Schema::dropIfExists('nutrient_translations');
    }
}
