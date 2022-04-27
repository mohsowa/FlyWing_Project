<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('plane_id');
            $table->foreign('plane_id')->references('id')->on('planes');

            $table->string('status');
            $table->date('date');
            $table->string('origin');
            $table->string('destination');

            $table->time('departure_time');
            $table->time('arrival_time');



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
        Schema::dropIfExists('flights');
    }
}
