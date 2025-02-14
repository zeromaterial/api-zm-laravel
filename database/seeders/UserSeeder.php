<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin ZeroMaterial',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'profile_image' => 'admin.png',
            'role' => 'admin',
            'isactive' => true,
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('user123'),
            'profile_image' => 'user.png',
            'role' => 'user',
            'isactive' => true,
        ]);





        User::create([
            'name' => 'Ayu Lestari',
            'email' => 'ayu@example.com',
            'password' => Hash::make('ayu123'),
            'profile_image' => 'ayu.png',
            'job' => 'Aktivis Lingkungan',
            'role' => 'user',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Bimo Adi',
            'email' => 'bimo@example.com',
            'password' => Hash::make('bimo123'),
            'profile_image' => 'bimo.png',
            'job' => 'Peneliti Iklim',
            'role' => 'user',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Citra Dewi',
            'email' => 'citra@example.com',
            'password' => Hash::make('citra123'),
            'profile_image' => 'citra.png',
            'job' => 'Aktivis Lingkungan',
            'role' => 'user',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Dimas Pratama',
            'email' => 'dimas@example.com',
            'password' => Hash::make('dimas123'),
            'profile_image' => 'dimas.png',
            'job' => 'Petani',
            'role' => 'user',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Erika Setyawati',
            'email' => 'erika@example.com',
            'password' => Hash::make('erika123'),
            'profile_image' => 'erika.png',
            'job' => 'Seniman',
            'role' => 'user',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Fajar Nugraha',
            'email' => 'fajar@example.com',
            'password' => Hash::make('fajar123'),
            'profile_image' => 'fajar.png',
            'job' => 'Pemandu Wisata',
            'role' => 'user',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Gita Rahmawati',
            'email' => 'gita@example.com',
            'password' => Hash::make('gita123'),
            'profile_image' => 'gita.png',
            'job' => 'Mahasiswa',
            'role' => 'user',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Hendra Wijaya',
            'email' => 'hendra@example.com',
            'password' => Hash::make('hendra123'),
            'profile_image' => 'hendra.png',
            'job' => 'Buruh Bangunan',
            'role' => 'user',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Inayah Putri',
            'email' => 'inayah@example.com',
            'password' => Hash::make('inayah123'),
            'profile_image' => 'inayah.png',
            'job' => 'Guru',
            'role' => 'user',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Joko Supriyanto',
            'email' => 'joko@example.com',
            'password' => Hash::make('joko123'),
            'profile_image' => 'joko.png',
            'job' => 'Nelayan',
            'role' => 'user',
            'isactive' => true,
        ]);
    }
}
