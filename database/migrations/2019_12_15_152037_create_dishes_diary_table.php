<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesDiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes_diary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->integer('weight');
            $table->float('kcal', 5,1);
            $table->float('protein', 4,1);
            $table->float('fat', 4,1);
            $table->float('carbohydrate', 4,1);
            $table->float('water', 4,1);
            $table->integer('user_id')->unsigned();
            $table->integer('meal_time_id')->unsigned();
            $table->integer('dish_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('dishes_diary', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['meal_time_id']);
            $table->dropForeign(['dish_id']);
        });
        Schema::dropIfExists('dishes_diary');
    }
}
