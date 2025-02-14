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
            'gallery_image' => 'alvian-hasby-3-unsplash.jpg',
        ]);

        Gallery::create([
            'campaign_id' => 1,
            'gallery_image' => 'dhiemas-afif-febriyan-4-unsplash.jpg',
        ]);

        Gallery::create([
            'campaign_id' => 1,
            'gallery_image' => 'ocg-saving-the-ocean-2-unsplash.jpg',
        ]);

        Gallery::create([
            'campaign_id' => 1,
            'gallery_image' => 'refhad-1-unsplash.jpg',
        ]);
    }
}
