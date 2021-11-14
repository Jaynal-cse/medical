<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendTrippleLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_tripple_logos', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('logo1')->nullable();
            $table->string('logo2')->nullable();
            $table->string('logo3')->nullable();
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
        Schema::dropIfExists('frontend_tripple_logos');
    }
}
