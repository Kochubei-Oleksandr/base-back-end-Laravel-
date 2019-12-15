<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishNutritionPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_nutrition_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('day_number');
            $table->integer('nutrition_plan_id')->unsigned();
            $table->integer('meal_time_id')->unsigned();
            $table->integer('dish_id')->unsigned();

            $table->foreign('nutrition_plan_id')->references('id')->on('nutrition_plans');
            $table->foreign('meal_time_id')->references('id')->on('meal_times');
            $table->foreign('dish_id')->references('id')->on('dishes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dish_nutrition_plan', function (Blueprint $table) {
            $table->dropForeign(['nutrition_plan_id']);
            $table->dropForeign(['meal_time_id']);
            $table->dropForeign(['dish_id']);
        });
        Schema::dropIfExists('dish_nutrition_plan');
    }
}
