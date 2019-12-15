<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesInOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes_in_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->integer('food_delivery_order_id')->unsigned();
            $table->integer('dish_id')->unsigned();
            $table->integer('meal_time_id')->unsigned();
            $table->integer('dish_size_id')->unsigned();

            $table->foreign('food_delivery_order_id')->references('id')->on('food_delivery_orders');
            $table->foreign('dish_id')->references('id')->on('dishes');
            $table->foreign('meal_time_id')->references('id')->on('meal_times');
            $table->foreign('dish_size_id')->references('id')->on('dish_sizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishes_in_order', function (Blueprint $table) {
            $table->dropForeign(['food_delivery_order_id']);
            $table->dropForeign(['dish_id']);
            $table->dropForeign(['meal_time_id']);
            $table->dropForeign(['dish_size_id']);
        });
        Schema::dropIfExists('dishes_in_order');
    }
}
