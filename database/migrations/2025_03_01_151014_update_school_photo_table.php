<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSchoolPhotoTable extends Migration
{
    public function up()
    {
        Schema::table('school_photo', function (Blueprint $table) {
            // Thay đổi các cột để thêm giá trị mặc định
            $table->string('image1')->default('storage/photos/school_photo_image1.jpg')->change();
            $table->string('image2')->default('storage/photos/school_photo_image2.jpg')->change();
            $table->string('image3')->default('storage/photos/school_photo_image3.jpg')->change();
            $table->string('image4')->default('storage/photos/school_photo_image4.jpg')->change();
            $table->string('image5')->default('storage/photos/school_photo_image5.jpg')->change();
            $table->string('image6')->default('storage/photos/school_photo_image6.jpg')->change();
            $table->string('image7')->default('storage/photos/school_photo_image7.jpg')->change();
        });
    }

    public function down()
    {
        Schema::table('school_photo', function (Blueprint $table) {
            // Đặt lại các giá trị mặc định nếu cần
            $table->string('image1')->default(null)->change();
            $table->string('image2')->default(null)->change();
            $table->string('image3')->default(null)->change();
            $table->string('image4')->default(null)->change();
            $table->string('image5')->default(null)->change();
            $table->string('image6')->default(null)->change();
            $table->string('image7')->default(null)->change();
        });
    }
}