<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutritionPlanTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrition_plan_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('description', 250);
            $table->string('language', 3);
            $table->integer('nutrition_plan_id')->unsigned();

            $table->foreign('nutrition_plan_id')->references('id')->on('nutrition_plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nutrition_plan_translations', function (Blueprint $table) {
            $table->dropForeign(['nutrition_plan_id']);
        });
        Schema::dropIfExists('nutrition_plan_translations');
    }
}
