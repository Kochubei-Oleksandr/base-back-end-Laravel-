<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLifestyleTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lifestyle_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('language', 3);
            $table->integer('lifestyle_id')->unsigned();

            $table->foreign('lifestyle_id')->references('id')->on('lifestyles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lifestyle_translations', function (Blueprint $table) {
            $table->dropForeign(['lifestyle_id']);
        });
        Schema::dropIfExists('lifestyle_translations');
    }
}
