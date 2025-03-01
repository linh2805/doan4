<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeQualityTable extends Migration
{
    public function up()
    {
        Schema::create('home_quality', function (Blueprint $table) {
            $table->id();
            $table->string('classroom_system', 500)->default('a');
            $table->string('image1')->default('source/images/home_quality_image1.jpg');
            $table->string('image2')->default('source/images/home_quality_image2.jpg');
            $table->string('image3')->default('source/images/home_quality_image3.jpg');
            $table->string('image4')->default('source/images/home_quality_image4.jpg');
            $table->string('lab_system', 500)->default('a');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_quality');
    }
}