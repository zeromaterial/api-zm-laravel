<?php

namespace Database\Seeders;

use App\Models\Donation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donation::create([
            'campaign_id' => 1,
            'user_id' => 3,
            'payment_method_id' => 1,
            'donation_type_id' => 1,
            'donation_code' => 'DN-0001',
            'amount' => 1000000.00,
            'status' => 'confirmed'
        ]);

        Donation::create([
            'campaign_id' => 2,
            'user_id' => 3,
            'payment_method_id' => 2,
            'donation_type_id' => 2,
            'donation_code' => 'DN-0002',
            'amount' => 2000000.00,
            'status' => 'failed'
        ]);

        Donation::create([
            'campaign_id' => 3,
            'user_id' => 3,
            'payment_method_id' => 3,
            'donation_type_id' => 3,
            'donation_code' => 'DN-0003',
            'amount' => 300000.00,
            'status' => 'pending'
        ]);
    }
}
