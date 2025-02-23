<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(PlantSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(DonationTypeSeeder::class);

        $this->call(TestimonySeeder::class);
        $this->call(CampaignSeeder::class);
        $this->call(DonationSeeder::class);
    }
}
