<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcludedFoodTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excluded_food_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('language', 3);
            $table->integer('excluded_food_id')->unsigned();

            $table->foreign('excluded_food_id')->references('id')->on('excluded_foods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('excluded_food_translations', function (Blueprint $table) {
            $table->dropForeign(['excluded_food_id']);
        });
        Schema::dropIfExists('excluded_food_translations');
    }
}
