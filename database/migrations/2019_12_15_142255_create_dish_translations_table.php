<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('description', 250);
            $table->string('language', 3);
            $table->integer('dish_id')->unsigned();

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
        Schema::table('dish_translations', function (Blueprint $table) {
            $table->dropForeign(['dish_id']);
        });
        Schema::dropIfExists('dish_translations');
    }
}
