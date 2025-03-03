<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Seeder;

class CollegeSeeder extends Seeder
{
    public function run()
    {
        College::create([
            'introductory_photo' => 'source/images/2.png',
            'introduce' => 'a',
            'time' => 'a',
            'location' => 'a',
            'curriculum_content' => json_encode(['a', 'b', 'c', 'd']), // Chuyển đổi thành JSON
        ]);
    }
}