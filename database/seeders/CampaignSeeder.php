<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campaign::create([
            'campaign_title' => 'Kampanye Pohon Hijau',
            'campaign_image' => 'path/to/campaign1_image.jpg',
            'campaign_location' => 'Jakarta, Indonesia',
            'created_by_user_id' => 1,
            'start_date' => now(),
            'end_date' => now()->addMonths(1),
            'plant_type' => 'Pohon Kenari',
            'total_donation' => 500000.00,
            'total_trees_donated' => 100,
            'isactive' => true,
        ]);

        Campaign::create([
            'campaign_title' => 'Kampanye Pohon Mangga',
            'campaign_image' => 'path/to/campaign2_image.jpg',
            'campaign_location' => 'Bandung, Indonesia',
            'created_by_user_id' => 2,
            'start_date' => now(),
            'end_date' => now()->addMonths(2),
            'plant_type' => 'Pohon Mangga',
            'total_donation' => 750000.00,
            'total_trees_donated' => 150,
            'isactive' => true,
        ]);
    }
}
