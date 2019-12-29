<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_category_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('language_id')->unsigned();
            $table->integer('food_category_id')->unsigned();

            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('food_category_id')->references('id')->on('food_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_category_translations', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropForeign(['food_category_id']);
        });
        Schema::dropIfExists('food_category_translations');
    }
}
