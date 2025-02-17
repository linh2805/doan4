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
    Schema::create('testimonials', function (Blueprint $table) {
        $table->id();  // Tạo cột `id` tự tăng
        $table->string('full_name');  // Họ tên người cung cấp lời chứng thực
        $table->text('testimonial');  // Nội dung lời chứng thực
        $table->string('image')->nullable();  // Đường dẫn ảnh (nếu có)
        $table->timestamps();  // Thời gian tạo và cập nhật
    });
}

public function down()
{
    Schema::dropIfExists('testimonials');  // Xóa bảng nếu rollback migration
}

};
