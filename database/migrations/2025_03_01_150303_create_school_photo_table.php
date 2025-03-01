<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolPhotoTable extends Migration
{
    public function up()
    {
        Schema::create('school_photo', function (Blueprint $table) {
            $table->id();
            $table->string('image1')->default('storage/photos/school_photo_image1.jpg');
            $table->string('image2')->default('storage/photos/school_photo_image2.jpg');
            $table->string('image3')->default('storage/photos/school_photo_image3.jpg');
            $table->string('image4')->default('storage/photos/school_photo_image4.jpg');
            $table->string('image5')->default('storage/photos/school_photo_image5.jpg');
            $table->string('image6')->default('storage/photos/school_photo_image6.jpg');
            $table->string('image7')->default('storage/photos/school_photo_image7.jpg');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('school_photo');
    }
}