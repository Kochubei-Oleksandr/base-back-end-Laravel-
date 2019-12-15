<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcludedFoodDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excluded_food_dish', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dish_id')->unsigned();
            $table->integer('excluded_food_id')->unsigned();

            $table->foreign('dish_id')->references('id')->on('dishes');
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
        Schema::table('excluded_food_dish', function (Blueprint $table) {
            $table->dropForeign(['dish_id']);
            $table->dropForeign(['excluded_food_id']);
        });
        Schema::dropIfExists('excluded_food_dish');
    }
}
