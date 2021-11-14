<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbouttitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouttitles', function (Blueprint $table) {
            $table->id();
            $table->string('about_title');
            $table->string('about_sub_title');
            $table->string('about_desp');
            $table->string('about_image')->default('about_default.jpg');
            $table->string('designation');
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
        Schema::dropIfExists('abouttitles');
    }
}
