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
            'plant_type' => 'Pohon Kenari',
            'total_donation' => 50000,
            'total_trees_donated' => 250,
            'isactive' => true,
        ]);

        Campaign::create([
            'title' => 'Car Free Day: Jakarta Bebas Polusi',
            'image' => 'fikri-rasyid-polusi-unsplash.jpg',
            'location' => 'Bandung, Indonesia',
            'created_by_user_id' => 2,
            'start_date' => now(),
            'end_date' => now()->addDay(23),
            'plant_type' => 'Pohon Mangga',
            'total_donation' => 1100000,
            'total_trees_donated' => 120,
            'isactive' => true,
        ]);

        Campaign::create([
            'title' => 'Gerakan Mangrove: Selamatkan Masa Depan',
            'image' => 'sutirta-budiman-mangrove-unsplash.jpg',
            'location' => 'Bandung, Indonesia',
            'created_by_user_id' => 2,
            'start_date' => now(),
            'end_date' => now()->addDay(6),
            'plant_type' => 'Pohon Mangga',
            'total_donation' => 43100000,
            'total_trees_donated' => 570,
            'isactive' => true,
        ]);

        Campaign::create([
            'title' => 'GHxZW: 30 Days Zero Waste Challenge',
            'image' => 'ocg-saving-the-ocean-sampah-unsplash.jpg',
            'location' => 'Bandung, Indonesia',
            'created_by_user_id' => 2,
            'start_date' => now(),
            'end_date' => now()->addDay(2),
            'plant_type' => 'Pohon Mangga',
            'total_donation' => 12200000,
            'total_trees_donated' => 124,
            'isactive' => true,
        ]);
    }
}
