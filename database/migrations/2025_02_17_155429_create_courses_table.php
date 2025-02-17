<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();  // Tạo cột `id` tự tăng
            $table->foreignId('programme_id')->constrained()->onDelete('cascade');  // Khóa ngoại tới bảng programmes
            $table->string('course_name');  // Tên khóa học
            $table->text('course_description');  // Mô tả khóa học
            $table->integer('duration');  // Thời gian khóa học (số tuần)
            $table->timestamps();  // Thời gian tạo và cập nhật
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('courses');  // Xóa bảng nếu rollback migration
    }
    
};
