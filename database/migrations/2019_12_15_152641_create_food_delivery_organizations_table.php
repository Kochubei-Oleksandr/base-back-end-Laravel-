<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodDeliveryOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_delivery_organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->nullable();
            $table->string('email', 50)->unique();
            $table->string('password', 60);
            $table->boolean('security_policy')->nullable();
            $table->boolean('confirmed')->nullable();
            $table->string('language', 5)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('bank_account', 30)->nullable();
            $table->integer('order_limit')->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_delivery_organizations', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });
        Schema::dropIfExists('food_delivery_organizations');
    }
}
