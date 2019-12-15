<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 250);
            $table->string('language', 3);
            $table->integer('food_id')->unsigned();

            $table->foreign('food_id')->references('id')->on('foods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_translations', function (Blueprint $table) {
            $table->dropForeign(['food_id']);
        });
        Schema::dropIfExists('food_translations');
    }
}
