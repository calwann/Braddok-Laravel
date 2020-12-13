<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConciergeVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concierge_visitors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('visitor_id')->unsigned();
            $table->foreign('visitor_id')->references('id')->on('visitor')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('concierge_visitors');
    }
}
