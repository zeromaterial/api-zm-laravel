<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CompanySeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(TestimonySeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(CampaignSeeder::class);
    }
}
