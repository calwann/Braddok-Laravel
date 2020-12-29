<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConciergeVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concierge_vehicles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('user_id_boss')->unsigned();
            $table->foreign('user_id_boss')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('user_id_driver')->unsigned();
            $table->foreign('user_id_driver')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->char('register_type');
            $table->dateTime('date_time');
            $table->bigInteger('odometer');
            $table->char('_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concierge_vehicles');
    }
}
