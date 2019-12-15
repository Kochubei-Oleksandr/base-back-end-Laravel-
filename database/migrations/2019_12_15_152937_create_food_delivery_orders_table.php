<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodDeliveryOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_delivery_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_name', 20);
            $table->string('client_mobile', 20);
            $table->string('client_email', 50);
            $table->string('delivery_address', 100);
            $table->time('time_delivery');
            $table->date('start_date');
            $table->integer('number_delivery_days');
            $table->float('cost_delivery', 5,2);
            $table->float('cost_dishes', 5,2);
            $table->boolean('paid');
            $table->integer('food_delivery_organization_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('food_delivery_organization_id')->references('id')->on('food_delivery_organizations');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_delivery_orders', function (Blueprint $table) {
            $table->dropForeign(['food_delivery_organization_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('food_delivery_orders');
    }
}
