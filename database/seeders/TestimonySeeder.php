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
            'user_id' => 3,
            'quotes' => 'Semoga kita bisa kembali merasakan udara segar tanpa polusi, hutan-hutan yang hijau kembali rimbun, dan laut yang bersih dari sampah plastik. Mari kita bersama-sama menjaga Bumi kita untuk generasi mendatang.',
        ]);

        Testimony::create([
            'user_id' => 4,
            'quotes' => 'Saya berharap suatu hari nanti, kita bisa hidup berdampingan dengan alam tanpa khawatir akan bencana alam yang disebabkan oleh perubahan iklim. Mari kita kurangi emisi karbon dan lestarikan sumber daya alam.',
        ]);

        Testimony::create([
            'user_id' => 5,
            'quotes' => 'Mari kita jadikan kebiasaan untuk mengurangi, menggunakan kembali, dan mendaur ulang sampah. Dengan begitu, kita bisa mengurangi timbunan sampah di bumi dan menjaga lingkungan tetap bersih.',
        ]);

        Testimony::create([
            'user_id' => 6,
            'quotes' => 'Saya bermimpi melihat pertanian organik semakin berkembang dan menjadi pilihan utama masyarakat. Dengan pertanian organik, kita bisa menjaga kesuburan tanah dan menghasilkan pangan yang sehat dan aman.',
        ]);

        Testimony::create([
            'user_id' => 7,
            'quotes' => 'Saya ingin melihat seni menjadi alat untuk menginspirasi masyarakat agar lebih peduli terhadap lingkungan. Melalui karya seni, kita bisa menyampaikan pesan tentang pentingnya menjaga alam.',
        ]);

        Testimony::create([
            'user_id' => 8,
            'quotes' => 'Semoga pariwisata berkelanjutan semakin populer dan memberikan manfaat bagi masyarakat sekitar serta melestarikan alam. Mari kita nikmati keindahan alam sambil tetap bertanggung jawab.',
        ]);

        Testimony::create([
            'user_id' => 9,
            'quotes' => 'Saya berharap penelitian tentang lingkungan semakin berkembang dan menghasilkan solusi inovatif untuk mengatasi masalah lingkungan. Mari kita dukung para ilmuwan yang berjuang untuk masa depan bumi.',
        ]);

        Testimony::create([
            'user_id' => 10,
            'quotes' => 'Saya ingin membuat furnitur dari kayu bekas dan limbah kayu untuk mengurangi penebangan hutan. Mari kita manfaatkan sumber daya alam secara bijak.',
        ]);

        Testimony::create([
            'user_id' => 11,
            'quotes' => 'Saya berharap anak-anak kita tumbuh menjadi generasi yang peduli lingkungan. Mari kita tanamkan kesadaran akan pentingnya menjaga alam sejak dini.',
        ]);

        Testimony::create([
            'user_id' => 12,
            'quotes' => 'Saya berharap laut kita tetap kaya akan ikan dan sumber daya laut lainnya. Mari kita bersama-sama menjaga kebersihan laut dan mengurangi penggunaan alat tangkap yang merusak.',
        ]);
    }
}
