<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'coinbase.com',
            'logo' => 'https://www.material-tailwind.com/logos/logo-coinbase.svg',
            'quotes' => 'Innovate and inspire the world.',
        ]);

        Company::create([
            'name' => 'amazon.com',
            'logo' => 'https://www.material-tailwind.com/logos/logo-amazon.svg',
            'quotes' => 'Belanja lebih mudah, lebih cepat, dan lebih hemat.',
        ]);

        Company::create([
            'name' => 'netflix.com',
            'logo' => 'https://www.material-tailwind.com/logos/logo-netflix.svg',
            'quotes' => 'Belanja lebih mudah, lebih cepat, dan lebih hemat.',
        ]);

        Company::create([
            'name' => 'spotify.com',
            'logo' => 'https://www.material-tailwind.com/logos/logo-spotify.svg',
            'quotes' => 'Belanja lebih mudah, lebih cepat, dan lebih hemat.',
        ]);

        Company::create([
            'name' => 'google.com',
            'logo' => 'https://www.material-tailwind.com/logos/logo-google.svg',
            'quotes' => 'Belanja lebih mudah, lebih cepat, dan lebih hemat.',
        ]);
    }
}
