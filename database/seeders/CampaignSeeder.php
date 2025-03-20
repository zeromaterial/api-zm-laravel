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
            'created_by_user_id' => 4,
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
            'created_by_user_id' => 5,
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
            'created_by_user_id' => 6,
            'start_date' => now(),
            'end_date' => now()->addDay(2),
            'plant_id' => 4,
            'target_donation' => 22200000,
            'collected_donation' => 12200000,
            'total_trees_donated' => 124,
            'status' => 'active',
        ]);





        Campaign::create([
            'title' => 'Reboisasi Hutan: Tanam Pohon Bersama',
            'image' => 'tanam-pohon-bersama-unsplash.jpg',
            'location' => 'Jakarta, Indonesia',
            'created_by_user_id' => 7,
            'start_date' => now(),
            'end_date' => now()->addDays(14),
            'plant_id' => 5,
            'target_donation' => 15000000,
            'collected_donation' => 10000000,
        ]);

        Campaign::create([
            'title' => 'Save Our Reefs: Coral Planting',
            'image' => 'coral-planting-unsplash.jpg',
            'location' => 'Bali, Indonesia',
            'created_by_user_id' => 8,
            'start_date' => now()->subDays(5),
            'end_date' => now()->addDays(10),
            'plant_id' => 2,
            'target_donation' => 20000000,
            'collected_donation' => 18000000,
        ]);

        Campaign::create([
            'title' => 'Go Green: Urban Farming Workshop',
            'image' => 'urban-farming-unsplash.jpg',
            'location' => 'Surabaya, Indonesia',
            'created_by_user_id' => 9,
            'start_date' => now()->addDays(7),
            'end_date' => now()->addDays(21),
            'plant_id' => 1,
            'target_donation' => 8000000,
            'collected_donation' => 5000000,
        ]);

        Campaign::create([
            'title' => 'Reduce, Reuse, Recycle: Community Cleanup',
            'image' => 'community-cleanup-unsplash.jpg',
            'location' => 'Yogyakarta, Indonesia',
            'created_by_user_id' => 10,
            'start_date' => now()->subDays(10),
            'end_date' => now(),
            'plant_id' => 3,
            'target_donation' => 12000000,
            'collected_donation' => 12000000,
        ]);

        Campaign::create([
            'title' => 'Green Future: School Tree Planting',
            'image' => 'school-tree-planting-unsplash.jpg',
            'location' => 'Bandung, Indonesia',
            'created_by_user_id' => 1,
            'start_date' => now()->addDays(15),
            'end_date' => now()->addDays(30),
            'plant_id' => 4,
            'target_donation' => 10000000,
            'collected_donation' => 0,
        ]);

        Campaign::create([
            'title' => 'Protect Our Forests: Reforestation Project',
            'image' => 'reforestation-unsplash.jpg',
            'location' => 'Sumatra, Indonesia',
            'created_by_user_id' => 4,
            'start_date' => now()->subMonth(),
            'end_date' => now()->addMonth(),
            'plant_id' => 5,
            'target_donation' => 50000000,
            'collected_donation' => 35000000,
        ]);

        Campaign::create([
            'title' => 'Water is Life: Water Conservation Campaign',
            'image' => 'water-conservation-unsplash.jpg',
            'location' => 'Jakarta, Indonesia',
            'created_by_user_id' => 5,
            'start_date' => now(),
            'end_date' => now()->addDays(7),
            'plant_id' => 1,
            'target_donation' => 7000000,
            'collected_donation' => 2000000,
        ]);

        Campaign::create([
            'title' => 'Hutan Hijau: Pembersihan Pantai',
            'image' => 'pembersihan-pantai-unsplash.jpg',
            'location' => 'Malang, Indonesia',
            'created_by_user_id' => 6,
            'start_date' => now()->addDays(3),
            'end_date' => now()->addDays(20),
            'plant_id' => 5,
            'target_donation' => 9000000,
            'collected_donation' => 7000000,
        ]);

        Campaign::create([
            'title' => 'Edukasi Lingkungan: Workshop Daur Ulang',
            'image' => 'workshop-daur-ulang-unsplash.jpg',
            'location' => 'Surabaya, Indonesia',
            'created_by_user_id' => 7,
            'start_date' => now()->subDays(5),
            'end_date' => now()->addDays(10),
            'plant_id' => 2,
            'target_donation' => 12000000,
            'collected_donation' => 10000000,
        ]);

        Campaign::create([
            'title' => 'Festival Lingkungan: Pemberdayaan Sumber Daya Alam',
            'image' => 'festival-lingkungan-unsplash.jpg',
            'location' => 'Bandung, Indonesia',
            'created_by_user_id' => 1,
            'start_date' => now()->addDays(7),
            'end_date' => now()->addDays(21),
            'plant_id' => 3,
            'target_donation' => 8000000,
            'collected_donation' => 6000000,
        ]);
    }
}
