<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id(); // auto-increment id
            $table->string('full_name'); // student name
            $table->string('phone'); // phone number
            $table->string('email'); // email address
            $table->string('high_school'); // high school name
            $table->string('residence'); // current residence
            $table->string('major'); // selected major
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
}
