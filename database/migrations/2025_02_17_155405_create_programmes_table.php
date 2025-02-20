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
    Schema::create('programmes', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->string('duration');
        $table->string('qualification');
        $table->string('location');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('programmes');
}

};
