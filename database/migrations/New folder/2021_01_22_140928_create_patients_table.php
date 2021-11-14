<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('patient_name');
            $table->date('date_of_birth');
            $table->string('age');
            $table->string('phone_number',15);
            $table->string('email');
            $table->string('gender');
            $table->longText('address');
            $table->string('image')->default('patient_default_photo.jpg');
            $table->string('patient_slug');
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
        Schema::dropIfExists('patients');
    }
}
