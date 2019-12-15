<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSexTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sex_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('language', 3);
            $table->integer('sex_id')->unsigned();

            $table->foreign('sex_id')->references('id')->on('sexes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sex_translations', function (Blueprint $table) {
            $table->dropForeign(['sex_id']);
        });
        Schema::dropIfExists('sex_translations');
    }
}
