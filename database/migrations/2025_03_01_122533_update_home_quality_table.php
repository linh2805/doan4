<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHomeQualityTable extends Migration
{
    public function up()
    {
        Schema::table('home_quality', function (Blueprint $table) {
            // Thay đổi các cột để thêm giá trị mặc định
            $table->string('classroom_system', 500)->default('a')->change();
            $table->string('image1')->default('source/images/home_quality_image1.jpg')->change();
            $table->string('image2')->default('source/images/home_quality_image2.jpg')->change();
            $table->string('image3')->default('source/images/home_quality_image3.jpg')->change();
            $table->string('image4')->default('source/images/home_quality_image4.jpg')->change();
            $table->string('lab_system', 500)->default('a')->change();
        });
    }

    public function down()
    {
        Schema::table('home_quality', function (Blueprint $table) {
            // Đặt lại các giá trị mặc định nếu cần
            $table->string('classroom_system', 500)->default(null)->change();
            $table->string('image1')->default(null)->change();
            $table->string('image2')->default(null)->change();
            $table->string('image3')->default(null)->change();
            $table->string('image4')->default(null)->change();
            $table->string('lab_system', 500)->default(null)->change();
        });
    }
}