<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 250);
            $table->integer('language_id')->unsigned();
            $table->integer('food_id')->unsigned();

            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('food_id')->references('id')->on('foods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_translations', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropForeign(['food_id']);
        });
        Schema::dropIfExists('food_translations');
    }
}
