<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{

    public function run(): void
    {
        Banner::create([
            'id' => 1,
            'banner_name' => 'banner-1',
            'banner_image_url' => 'img/banners/banner-1.jpg',
            'active' => '1',
            'created_at' => '2025-01-01 00:00:00',
            'updated_at' => '2025-01-01 00:00:00'
        ]);

        Banner::create([
            'id' => 2,
            'banner_name' => 'banner-2',
            'banner_image_url' => 'img/banners/banner-2.jpg',
            'active' => '1',
            'created_at' => '2025-01-01 00:00:00',
            'updated_at' => '2025-01-01 00:00:00'
        ]);

        Banner::create([
            'id' => 3,
            'banner_name' => 'banner-3',
            'banner_image_url' => 'img/banners/banner-3.jpg',
            'active' => '1',
            'created_at' => '2025-01-01 00:00:00',
            'updated_at' => '2025-01-01 00:00:00'
        ]);

        Banner::create([
            'id' => 4,
            'banner_name' => 'banner-4',
            'banner_image_url' => 'img/banners/banner-4.jpg',
            'active' => '1',
            'created_at' => '2025-01-01 00:00:00',
            'updated_at' => '2025-01-01 00:00:00'
        ]);
    }
}
