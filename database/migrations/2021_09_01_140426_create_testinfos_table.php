<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testinfos', function (Blueprint $table) {
            $table->id();
            $table->string('test_id');
            $table->string('patient_id');
            $table->integer('test_name');
            $table->integer('phone_no');
            $table->date('deliver_date');
            $table->integer('amount');
            $table->integer('advance');
            $table->integer('discount');
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
        Schema::dropIfExists('testinfos');
    }
}
