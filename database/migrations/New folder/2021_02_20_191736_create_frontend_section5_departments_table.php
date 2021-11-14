<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendSection5DepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_section5_departments', function (Blueprint $table) {
            $table->id();
            $table->integer('heading_id');
            $table->string('department_name');
            $table->string('icon')->nullable();
            $table->string('image')->default('default_photo.jpg');
            $table->string('sub_title')->nullable();
            $table->string('in_picture_button_text')->nullable();
            $table->string('in_picture_button_link')->nullable();
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
        Schema::dropIfExists('frontend_section5_departments');
    }
}
