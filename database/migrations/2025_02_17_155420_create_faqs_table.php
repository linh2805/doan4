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
    Schema::create('faqs', function (Blueprint $table) {
        $table->id();  // Tạo cột `id` tự tăng
        $table->string('question');  // Câu hỏi
        $table->text('answer');  // Câu trả lời
        $table->timestamps();  // Thời gian tạo và cập nhật
    });
}

public function down()
{
    Schema::dropIfExists('faqs');  // Xóa bảng nếu rollback migration
}

};
