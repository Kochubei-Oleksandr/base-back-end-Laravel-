<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_dish', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_percentage');
            $table->integer('food_id')->unsigned();
            $table->integer('dish_id')->unsigned();

            $table->foreign('food_id')->references('id')->on('foods');
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
        Schema::table('food_dish', function (Blueprint $table) {
            $table->dropForeign(['food_id']);
            $table->dropForeign(['dish_id']);
        });
        Schema::dropIfExists('food_dish');
    }
}
