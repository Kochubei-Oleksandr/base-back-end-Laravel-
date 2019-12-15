<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodPreferenceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_preference_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('language', 3);
            $table->integer('food_preference_id')->unsigned();

            $table->foreign('food_preference_id')->references('id')->on('food_preferences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_preference_translations', function (Blueprint $table) {
            $table->dropForeign(['food_preference_id']);
        });
        Schema::dropIfExists('food_preference_translations');
    }
}
