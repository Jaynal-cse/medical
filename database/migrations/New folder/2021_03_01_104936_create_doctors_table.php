<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name');     
            $table->string('email');
            $table->string('designation');
            $table->string('department');
            $table->longText('address')->nullable();
            $table->string('phone_no');
            $table->string('short_biography')->nullable();
            $table->string('specialist')->nullable();
            $table->string('sex')->nullable();
            $table->string('blood_group')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('status')->default('inactive');
            $table->string('image')->default('doctor_default_photo.jpg');
            $table->string('doctor_slug');
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
        Schema::dropIfExists('doctors');
    }
}
