<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodNutrientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_nutrient', function (Blueprint $table) {
            $table->increments('id');
            $table->float('value', 5,1);
            $table->string('unit', 10);
            $table->integer('food_id')->unsigned();
            $table->integer('nutrient_id')->unsigned();

            $table->foreign('food_id')->references('id')->on('foods');
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
        Schema::table('food_nutrient', function (Blueprint $table) {
            $table->dropForeign(['food_id']);
            $table->dropForeign(['nutrient_id']);
        });
        Schema::dropIfExists('food_nutrient');
    }
}
