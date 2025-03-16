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
            'title' => 'Peduli Ubud: Hilangnya Ekosistem Monyet',
            'image' => 'radoslaw-prekurat-ubud-unsplash.jpg',
            'location' => 'Jakarta, Indonesia',
            'created_by_user_id' => 1,
            'start_date' => now(),
            'end_date' => now()->addDay(13),
            'plant_id' => 1,
            'target_donation' => 10000000,
            'collected_donation' => 5000000,
            'total_trees_donated' => 250,
            'status' => 'active',
        ]);

        Campaign::create([
            'title' => 'Car Free Day: Jakarta Bebas Polusi',
            'image' => 'fikri-rasyid-polusi-unsplash.jpg',
            'location' => 'Bandung, Indonesia',
            'created_by_user_id' => 2,
            'start_date' => now(),
            'end_date' => now()->addDay(23),
            'plant_id' => 2,
            'target_donation' => 50000000,
            'collected_donation' => 15100000,
            'total_trees_donated' => 120,
            'status' => 'active',
        ]);

        Campaign::create([
            'title' => 'Gerakan Mangrove: Selamatkan Masa Depan',
            'image' => 'sutirta-budiman-mangrove-unsplash.jpg',
            'location' => 'Bandung, Indonesia',
            'created_by_user_id' => 2,
            'start_date' => now(),
            'end_date' => now()->addDay(6),
            'plant_id' => 3,
            'target_donation' => 50100000,
            'collected_donation' => 43100000,
            'total_trees_donated' => 570,
            'status' => 'active',
        ]);

        Campaign::create([
            'title' => 'GHxZW: 30 Days Zero Waste Challenge',
            'image' => 'ocg-saving-the-ocean-sampah-unsplash.jpg',
            'location' => 'Bandung, Indonesia',
            'created_by_user_id' => 2,
            'start_date' => now(),
            'end_date' => now()->addDay(2),
            'plant_id' => 4,
            'target_donation' => 22200000,
            'collected_donation' => 12200000,
            'total_trees_donated' => 124,
            'status' => 'active',
        ]);
    }
}
