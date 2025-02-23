<?php

namespace Database\Seeders;

use App\Models\DonationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DonationType::create([
            'name' => 'Tunai',
            'description' => 'Sumbangan dalam bentuk uang untuk mendukung program dan kegiatan.',
        ]);

        DonationType::create([
            'name' => 'Pohon',
            'description' => 'Sumbangan berupa penanaman pohon untuk menjaga lingkungan.',
        ]);

        DonationType::create([
            'name' => 'Sarana Prasarana',
            'description' => 'Sumbangan untuk pengadaan sarana dan prasarana yang diperlukan.',
        ]);

        DonationType::create([
            'name' => 'Operasional',
            'description' => 'Sumbangan untuk mendukung biaya operasional kegiatan.',
        ]);

        DonationType::create([
            'name' => 'Barang',
            'description' => 'Sumbangan berupa barang yang dapat digunakan untuk kegiatan sosial.',
        ]);
    }
}
