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
            'member_name' => 'John Doe',
            'member_role' => 'CEO',
        ]);

        Team::create([
            'member_name' => 'Jane Smith',
            'member_role' => 'CTO',
        ]);
        
        Team::create([
            'member_name' => 'Jane Smith',
            'member_role' => 'CTO',
        ]);

        Team::create([
            'member_name' => 'Jane Smith',
            'member_role' => 'CTO',
        ]);

        Team::create([
            'member_name' => 'Jane Smith',
            'member_role' => 'CTO',
        ]);
    }
}
