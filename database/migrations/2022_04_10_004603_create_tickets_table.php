<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('passenger_id');
            $table->foreign('passenger_id')->references('id')->on('passengers')->onDelete('cascade');

            $table->unsignedInteger('flight_id');



            $table->string('Fname');
            $table->string('Lname');
            $table->string('status');
            $table->date('date_of_birth');
            $table->string('sex');

            $table->string('phone');
            $table->integer('gov_id');
            $table->string('passport_no')->nullable();

            $table->string('class_type');
            $table->boolean('incl_food');
            $table->boolean('incl_wifi');
            $table->boolean('incl_phone_calls');


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
        Schema::dropIfExists('tickets');
    }
}
