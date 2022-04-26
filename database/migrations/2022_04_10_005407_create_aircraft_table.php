<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAircraftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aircraft', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('plane_id');
            $table->foreign('plane_id')->references('id')->on('planes')->onDelete('cascade');

            $table->integer('num_first_class');
            $table->float('price_first_class');

            $table->integer('num_bus_class');
            $table->float('price_bus_class');

            $table->integer('num_econ_class');
            $table->float('price_econ_class');

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
        Schema::dropIfExists('aircraft');
    }
}
