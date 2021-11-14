<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('insurance_name');
            $table->integer('service_tax')->nullable();
            $table->integer('discount')->nullable();
            $table->string('remark')->nullable();
            $table->string('insurance_no');
            $table->string('insurance_code');
            $table->integer('disease_charge');
            $table->integer('hospital_rate')->nullable();
            $table->integer('status')->default(0);
            $table->integer('insurance_rate')->nullable();
           

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
        Schema::dropIfExists('insurances');
    }
}
