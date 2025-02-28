<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**

    * Run the migrations.

    */

    public function up()
    {

        Schema::create('intros', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->text('description');

            $table->string('image1'); // Đường dẫn ảnh mặc định

            $table->string('image2');

            $table->string('image3');

            $table->string('image4');

            $table->string('image5');

            $table->timestamps();

        });

    }

    /**

    * Reverse the migrations.

    */

    public function down(): void
    {

        Schema::dropIfExists('intros');

    }

};