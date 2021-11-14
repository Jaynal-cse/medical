<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('room_no')->nullable();
            $table->string('consultant_name')->nullable();
            $table->string('policy_name')->nullable();
            $table->string('policy_no')->nullable();
            $table->string('policy_holder_name')->nullable();
            $table->string('insurance_name');
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
        Schema::dropIfExists('approvals');
    }
}
