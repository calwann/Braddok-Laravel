<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConciergeVisitorVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concierge_visitor_vehicles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vehicle_visitor_id')->unsigned();
            $table->foreign('vehicle_visitor_id')->references('id')->on('vehicle_visitors')->onDelete('cascade')->onUpdate('cascade');
            $table->char('register_type');
            $table->dateTime('date_time');
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
        Schema::dropIfExists('concierge_visitor_vehicles');
    }
}
