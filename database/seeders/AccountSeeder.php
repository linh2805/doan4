<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accounts;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accounts::create([
            'username' => 'Admin1',
            'password' => Hash::make('123456789'),
        ]);

        Accounts::create([
            'username' => 'Admin2',
            'password' => Hash::make('987654321'),
        ]);

        Accounts::create([
            'username' => 'Admin3',
            'password' => Hash::make('888888888'),
        ]);
    }
}