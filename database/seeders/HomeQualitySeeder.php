<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeQuality;


class HomeQualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    HomeQuality::create([
        'classroom_system' => 'a', // hoặc giá trị khác nếu cần
        'image1' => 'source/images/home_quality_image1.jpg',
        'image2' => 'source/images/home_quality_image2.jpg',
        'image3' => 'source/images/home_quality_image3.jpg',
        'image4' => 'source/images/home_quality_image4.jpg',
        'lab_system' => 'a', // hoặc giá trị khác nếu cần
    ]);
}
}
