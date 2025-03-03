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
        Schema::create('intermediates', function (Blueprint $table) {
            $table->id();
            $table->string('introductory_photo')->default('source/images/introductory_photo2_jpg'); // Giá trị mặc định
            $table->text('introduce')->default('ac'); // Giá trị mặc định
            $table->string('time')->default('a'); // Giá trị mặc định
            $table->string('location', 500)->default('a'); // Giá trị mặc định
            $table->text('curriculum_content')->default(json_encode(['a', 'b', 'c', 'd'])); // Giá trị mặc định với nội dung
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('intermediates');
    }
};
