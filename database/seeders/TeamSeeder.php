<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            'name' => 'Fakhirul Akmal',
            'image' => 'https://www.material-tailwind.com/img/avatar1.jpg',
            'role' => 'CEO',
        ]);

        Team::create([
            'name' => 'Ryan Samuel',
            'image' => 'https://www.material-tailwind.com/img/avatar2.jpg',
            'role' => 'CTO',
        ]);

        Team::create([
            'name' => 'Nora Hazel',
            'image' => 'https://www.material-tailwind.com/img/avatar5.jpg',
            'role' => 'UI/UX Designer',
        ]);

        Team::create([
            'name' => 'Otto Gonzalez',
            'image' => 'https://www.material-tailwind.com/img/avatar4.jpg',
            'role' => 'Marketing Specialist',
        ]);
    }
}
