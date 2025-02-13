<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::create([
            'campaign_id' => 1,
            'image_path' => 'path/to/campaign1_image1.jpg',
            'gallery_image' => 'campaign1_image1.jpg',
        ]);

        Gallery::create([
            'campaign_id' => 1,
            'image_path' => 'path/to/campaign1_image2.jpg',
            'gallery_image' => 'campaign1_image2.jpg',
        ]);
    }
}
