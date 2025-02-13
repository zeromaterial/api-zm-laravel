<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'campaign_id' => 1,
            'user_id' => 1,
            'comment_text' => 'Kampanye ini sangat menarik!',
            'comment_date' => now(),
        ]);

        Comment::create([
            'campaign_id' => 1,
            'user_id' => 2,
            'comment_text' => 'Saya setuju, mari kita bantu!',
            'comment_date' => now(),
        ]);
    }
}
