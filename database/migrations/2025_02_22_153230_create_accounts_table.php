<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
        });

        // Thêm tài khoản mặc định
        DB::table('accounts')->insert([
            [
                'username' => 'Admin1',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Admin2',
                'password' => Hash::make('987654321'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Admin3',
                'password' => Hash::make('888888888'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};