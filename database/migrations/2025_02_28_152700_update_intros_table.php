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

        Schema::table('intros', function (Blueprint $table) {

            $table->renameColumn('title', 'intro_school');

            $table->string('intro_school', 1000)->change();


            $table->renameColumn('description', 'job');

            $table->string('job', 1000)->change();

        });

    }

    public function down()
    {

        Schema::table('intros', function (Blueprint $table) {

            $table->renameColumn('intro_school', 'title');

            $table->string('title')->change();


            $table->renameColumn('job', 'description');

            $table->text('description')->change();

        });

    }
};