<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishSizeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_size_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('language', 3);
            $table->integer('dish_size_id')->unsigned();

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
        Schema::table('dish_size_translations', function (Blueprint $table) {
            $table->dropForeign(['dish_size_id']);
        });
        Schema::dropIfExists('dish_size_translations');
    }
}
