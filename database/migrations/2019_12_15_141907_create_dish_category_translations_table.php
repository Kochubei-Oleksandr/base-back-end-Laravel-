<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_category_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->integer('language_id')->unsigned();
            $table->integer('dish_category_id')->unsigned();

            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('dish_category_id')->references('id')->on('dish_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dish_category_translations', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropForeign(['dish_category_id']);
        });
        Schema::dropIfExists('dish_category_translations');
    }
}
