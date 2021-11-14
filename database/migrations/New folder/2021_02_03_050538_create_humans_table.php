<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('humans', function (Blueprint $table) {
            $table->id();
            $table->integer('designation_id');
            $table->string('fname');
            $table->string('lname')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->unique();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('picture')->default('default_employee.jpg');
            $table->string('status');
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
        Schema::dropIfExists('humans');
    }
}
