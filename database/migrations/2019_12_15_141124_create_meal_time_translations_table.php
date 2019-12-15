<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealTimeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_time_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('language', 3);
            $table->integer('meal_time_id')->unsigned();

            $table->foreign('meal_time_id')->references('id')->on('meal_times');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meal_time_translations', function (Blueprint $table) {
            $table->dropForeign(['meal_time_id']);
        });
        Schema::dropIfExists('meal_time_translations');
    }
}
