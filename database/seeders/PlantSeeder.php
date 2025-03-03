<?php

namespace Database\Seeders;

use App\Models\Plant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plant::create([
            'name' => 'Mangrove Rhizophora (Bakau)',
            'species' => 'Rhizophora mucronata',
            'image' => 'Rhizophora mucronata.jpg',
            'description' => 'Rhizopora aalah satu jenis tumbuhan mangrove, yaitu kelompok tanaman tropis yang bersifat halophytic atau toleran terhadap garam . Di Jawa seringkali ditanam di pinggiran tambak untuk melindungi pematang. Kegunaan dari hutan bakau yang paling besar adalah sebagai penyeimbang ekologis dan sumber (langsung atau tidak langsung) pendapatan masyarakat pesisir, di mana peran pemerintah untuk pengaturannya masih sangat minim.',
            'growing_conditions' => 'Ketinggian (mdpl) : 0-50, pH : 7.5-7.9, Suhu (oC) : 19-40, Curah Hujan (mm/tahun) : 1500-3000',
            'benefit' => 'Ekologi: tanaman penghijau ,Ekonomi: kayu dimanfaatkan untuk bahan bangunan, kayu bakar dan arang. Kulit kayu berisi hingga 30% tanin (per sen berat kering). Cabang akar dapat digunakan sebagai jangkar dengan diberati batu. ,Sosial: penyerap karbon yang baik',
            'price' => 25000.00,
        ]);

        Plant::create([
            'name' => 'Dadap',
            'species' => 'Erythrina variegata',
            'image' => 'Erythrina variegata.jpg',
            'description' => 'Dadap serep merupakan tanaman dengan bentuk batang tegak, berkayu, licin dan berwarna hijau berbintik-bintik putih. Tumbuhan berupa pohon yang ukurannya cukup besar dengan tinggi yang dapat mencapai 22 m dan berdiameter 50-60 cm. Dadap serep biasanya berbunga pada musim hujan, yaitu antara bulan Oktober sampai Desember.',
            'growing_conditions' => 'Ketinggian (mdpl) : 0-1500, pH : 4.5-8, Suhu (oC) : 20-28, Curah Hujan (mm/tahun) : 800-1500',
            'benefit' => 'Ekologi : Sebagai pohon peneduh, pohon rambat uuntuk tumbuhan lain, tanaman pembatas atau pagar, meningkatkan kesuburan tanah dan penahan angin., Ekonomi : dimanfaatkan sebagai pupuk hijau dan insektisida., Sosial : sebagai obat demam bagi wanita (demam nifas), pelancar ASI, perdarahan bagian dalam, sakit perut, mencegah keguguran, serta kulit batang digunakan sebagai pengencer dahak. Selain itu juga sebagai pakan ternak',
            'price' => 75000.00,
        ]);

        Plant::create([
            'name' => 'Matoa',
            'species' => 'Pometia pinnata',
            'image' => 'Pometia pinnata.jpg',
            'description' => 'Matoa adalah tanaman buah khas Papua, umumnya berbuah sekali dalam setahun. Pada tahun 2012 nama matoa mulai mencuat dan mendadak jadi buah bibir dengan hadirnya eco watch dan menyeret nama Matoa sebagai nama brand produk lifestyle asli. Jam tangan kayu itu memanfaatkan hasil limbah kayu matoa.',
            'growing_conditions' => 'Ketinggian (mdpl) : 100-1700, pH : 5-7, Suhu (oC) : 30-35, Curah Hujan (mm/tahun) : 1200',
            'benefit' => 'Ekologi: baik untuk penghijauan, Ekonomi: buah yang dapat dikonsumsi, menghasilkan kayu, limbah kayu untuk produk ecowatch, Sosial: kandungan antioksidan pada buah baik bagi tubuh',
            'price' => 25000.00,
        ]);

        Plant::create([
            'name' => 'Pinus',
            'species' => 'Pinus merkusii',
            'image' => 'Pinus merkusii.jpg',
            'description' => 'Pinus merupakan pohon asli Indonesia. Tanaman ini ditemukan pertama kali di Sipirok, Tapanuli Selatan. Pohon ini cukup kuat dan dapat bertahan hidup di segala jenis tanah. Pinus butuh banyak cahaya untuk subur. Biasanya tumbuh bergerombol.',
            'growing_conditions' => 'Ketinggian: 400-2000 mdpl, pH: 5-7, Suhu: 19-28°C, Curah Hujan: 1200-3000 mm/tahun',
            'benefit' => 'Ekologi: gerombolan pinus membentuk penutupan vegetasi permanen yang mendukung fungsi hidrologi dan konservasi tanah., Ekonomi: sebagai tempat wisata alam, getah pinus untuk dijual,, Sosial: meningkatkan perekonomian masyarakat sekitar, mencegah erosi, kulit dan daun mengandung vit C, flavonol, bioflavonoid.',
            'price' => 45000.00,
        ]);

        Plant::create([
            'name' => 'Trembesi',
            'species' => 'Samanea saman',
            'image' => 'Samanea saman.jpg',
            'description' => 'Trembesi merupakan pohon peneduh yang dapat tumbuh besar dan cepat, lebih cepat daripada pohon jati. Pohon trembesi dikenal juga sebagai pohon hujan. Usia pohon trembesi dapat mencapai 600 tahun.',
            'growing_conditions' => 'Ketinggian: 0-1.300 mdpl, pH: 4.6-7, Suhu: 20 - 35°c, Curah hujan: 600 - 3,000mm',
            'benefit' => 'Ekologi: Pohon sebagai penaung pada perkebunan teh, kopi, dan kokoa. Akar mendukung persediaan cadangan air tanah., Ekonomi: Polong dimakan. Getah digunakan sebagai pengganti getah Arab., Sosial: Kulit kayu dan daun untuk mengobati diare. Biji untuk mengobati radang tenggorokan.',
            'price' => 50000.00,
        ]);
    }
}
