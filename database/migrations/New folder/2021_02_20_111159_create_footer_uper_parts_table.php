<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterUperPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_uper_parts', function (Blueprint $table) {
            $table->id();
            $table->longText('paragraph');
            $table->string('icon')->nullable();
            $table->string('phone');
            $table->string('button_color')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('image')->default('default_photo.jpg');
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
        Schema::dropIfExists('footer_uper_parts');
    }
}
