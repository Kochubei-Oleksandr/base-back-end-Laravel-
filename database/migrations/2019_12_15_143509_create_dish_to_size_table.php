<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishToSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_to_size', function (Blueprint $table) {
            $table->increments('id');
            $table->float('dish_cost', 5,2);
            $table->integer('dish_weight');
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
        Schema::dropIfExists('dish_to_size');
    }
}
