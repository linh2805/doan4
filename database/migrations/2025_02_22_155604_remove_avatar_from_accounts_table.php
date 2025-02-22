<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveAvatarFromAccountsTable extends Migration
{
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn('avatar');
        });
    }

    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('avatar')->nullable(); // Khôi phục lại cột nếu cần
        });
    }
}