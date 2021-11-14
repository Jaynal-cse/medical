<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePercenticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percentices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('percent_one');
            $table->string('percent_two');
            $table->string('percent_three');
            $table->string('percent_four')->nullable();
            $table->string('progress_name_one');
            $table->string('progress_name_two');
            $table->string('progress_name_three');
            $table->string('progress_name_four')->nullable();
            $table->integer('image')->default('default_image.jpg');
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
        Schema::dropIfExists('percentices');
    }
}
