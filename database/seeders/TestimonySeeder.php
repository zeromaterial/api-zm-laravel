<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimony::create([
            'user_id' => 1,
            'testimony_quotes' => 'Sangat puas dengan layanan ini!',
        ]);

        Testimony::create([
            'user_id' => 2,
            'testimony_quotes' => 'Terima kasih atas bantuan yang diberikan.',
        ]);
    }
}
