<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineappointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Onlineappointments', function (Blueprint $table) {
            $table->id();
            $table->integer('appointment_id');
            $table->integer('department_id');
            $table->integer('doctor_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('date');
            $table->string('time');
            $table->string('problem');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('Onlineappointments');
    }
}
