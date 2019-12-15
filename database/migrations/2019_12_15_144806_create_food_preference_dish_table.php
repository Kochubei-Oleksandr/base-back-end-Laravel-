<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodPreferenceDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_preference_dish', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dish_id')->unsigned();
            $table->integer('food_preference_id')->unsigned();

            $table->foreign('dish_id')->references('id')->on('dishes');
            $table->foreign('food_preference_id')->references('id')->on('food_preferences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_preference_dish', function (Blueprint $table) {
            $table->dropForeign(['dish_id']);
            $table->dropForeign(['food_preference_id']);
        });
        Schema::dropIfExists('food_preference_dish');
    }
}
