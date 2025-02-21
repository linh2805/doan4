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
    Schema::create('registrations', function (Blueprint $table) {
        $table->id();
        $table->string('full_name');
        $table->string('phone_number');
        $table->string('email');
        $table->string('school');
        $table->string('residence');
        $table->string('major');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
