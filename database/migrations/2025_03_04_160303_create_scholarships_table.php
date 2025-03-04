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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('criteria'); 
            $table->string('type')->default('general'); // Thêm giá trị mặc định
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};