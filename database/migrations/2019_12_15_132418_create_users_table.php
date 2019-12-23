<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 20)->nullable();
            $table->string('email', 50)->unique();
            $table->string('password', 60);
            $table->boolean('usage_policy')->nullable();
            $table->string('language', 5)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('delivery_address', 100)->nullable();
            $table->integer('age')->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('sex_id')->unsigned()->nullable();
            $table->integer('goal_id')->unsigned()->nullable();
            $table->integer('lifestyle_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('sex_id')->references('id')->on('sexes');
            $table->foreign('goal_id')->references('id')->on('goals');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['sex_id']);
            $table->dropForeign(['goal_id']);
            $table->dropForeign(['lifestyle_id']);
        });
        Schema::dropIfExists('users');
    }
}
