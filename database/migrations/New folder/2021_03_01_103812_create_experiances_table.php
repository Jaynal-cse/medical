<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiances', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_id');
            $table->integer('department_id');
            $table->string('exp_year')->nullable();
            $table->string('exp_department')->nullable();
            $table->string('exp_position')->nullable();
            $table->string('exp_hospital')->nullable();
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
        Schema::dropIfExists('experiances');
    }
}
