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
            'title' => 'Potret Kampung Terapung di Sumedang',
            'image' => 'dhiemas-afif-febriyan-4-unsplash.jpg',
            'description' => 'Artikel tentang Google dan misinya.',
            'publication_date' => '2024-02-28',
            'created_by_user_id' => 1,
            'read_count' => 2900,
        ]);

        Article::create([
            'title' => 'Hari Peduli Sampah Nasional: Banten Pride',
            'image' => 'ocg-saving-the-ocean-2-unsplash.jpg',
            'description' => 'Artikel tentang Tokopedia dan layanan yang ditawarkannya.',
            'publication_date' => '2024-03-12',
            'created_by_user_id' => 1,
            'read_count' => 1200,
        ]);

        Article::create([
            'title' => 'Bukan Sekedar Tukang Sampah',
            'image' => 'refhad-1-unsplash.jpg',
            'description' => 'Artikel tentang Tokopedia dan layanan yang ditawarkannya.',
            'publication_date' => '2024-04-29',
            'created_by_user_id' => 1,
            'read_count' => 2300,
        ]);

        Article::create([
            'title' => 'Hari Peduli Sampah Nasional: Banten Pride',
            'image' => 'alvian-hasby-3-unsplash.jpg',
            'description' => 'Artikel tentang Tokopedia dan layanan yang ditawarkannya.',
            'publication_date' => '2024-05-29',
            'created_by_user_id' => 1,
            'read_count' => 1300,
        ]);
    }
}
