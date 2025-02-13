<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'article_title' => 'Pengenalan Google',
            'article_image' => 'path/to/article1_image.jpg',
            'article_description' => 'Artikel tentang Google dan misinya.',
            'publication_date' => now(),
            'created_by_user_id' => 1,
            'read_count' => 100,
        ]);

        Article::create([
            'article_title' => 'Pengenalan Tokopedia',
            'article_image' => 'path/to/article2_image.jpg',
            'article_description' => 'Artikel tentang Tokopedia dan layanan yang ditawarkannya.',
            'publication_date' => now(),
            'created_by_user_id' => 2,
            'read_count' => 150,
        ]);
    }
}
