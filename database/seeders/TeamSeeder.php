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
            'member_name' => 'Fakhirul Akmal',
            'member_image' => 'https://www.material-tailwind.com/img/avatar1.jpg',
            'member_role' => 'CEO',
        ]);

        Team::create([
            'member_name' => 'Ryan Samuel',
            'member_image' => 'https://www.material-tailwind.com/img/avatar2.jpg',
            'member_role' => 'CTO',
        ]);

        Team::create([
            'member_name' => 'Nora Hazel',
            'member_image' => 'https://www.material-tailwind.com/img/avatar5.jpg',
            'member_role' => 'UI/UX Designer',
        ]);

        Team::create([
            'member_name' => 'Otto Gonzalez',
            'member_image' => 'https://www.material-tailwind.com/img/avatar4.jpg',
            'member_role' => 'Marketing Specialist',
        ]);
    }
}
