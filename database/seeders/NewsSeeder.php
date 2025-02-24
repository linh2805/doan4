<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run()
    {
        News::create([
            'title' => 'Lịch Nghỉ Tết 2024',
            'content' => 'Thông báo lịch nghỉ Tết Dương lịch năm 2024.',
            'image' => 'news1.jpg',
        ]);
    }
}