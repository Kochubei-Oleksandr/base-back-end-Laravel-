<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->integer('language_id')->unsigned();
            $table->integer('goal_id')->unsigned();

            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('goal_id')->references('id')->on('goals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goal_translations', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropForeign(['goal_id']);
        });
        Schema::dropIfExists('goal_translations');
    }
}
