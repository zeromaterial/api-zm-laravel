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
            'role' => 'superadmin',
            'isactive' => true,
        ]);

        User::create([
            'name' => 'penggerak',
            'email' => 'penggerak@example.com',
            'password' => Hash::make('penggerak123'),
            'role' => 'penggerak',
            'isactive' => true,
        ]);

        User::create([
            'name' => 'pendukung',
            'email' => 'pendukung@example.com',
            'password' => Hash::make('pendukung123'),
            'role' => 'pendukung',
            'isactive' => true,
        ]);





        User::create([
            'name' => 'Ayu Lestari',
            'email' => 'ayu@example.com',
            'password' => Hash::make('ayu123'),
            'job' => 'Aktivis Lingkungan',
            'role' => 'pendukung',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Bimo Adi',
            'email' => 'bimo@example.com',
            'password' => Hash::make('bimo123'),
            'job' => 'Peneliti Iklim',
            'role' => 'pendukung',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Citra Dewi',
            'email' => 'citra@example.com',
            'password' => Hash::make('citra123'),
            'job' => 'Aktivis Lingkungan',
            'role' => 'pendukung',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Dimas Pratama',
            'email' => 'dimas@example.com',
            'password' => Hash::make('dimas123'),
            'job' => 'Petani',
            'role' => 'pendukung',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Erika Setyawati',
            'email' => 'erika@example.com',
            'password' => Hash::make('erika123'),
            'job' => 'Seniman',
            'role' => 'pendukung',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Fajar Nugraha',
            'email' => 'fajar@example.com',
            'password' => Hash::make('fajar123'),
            'job' => 'Pemandu Wisata',
            'role' => 'pendukung',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Gita Rahmawati',
            'email' => 'gita@example.com',
            'password' => Hash::make('gita123'),
            'job' => 'Mahasiswa',
            'role' => 'pendukung',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Hendra Wijaya',
            'email' => 'hendra@example.com',
            'password' => Hash::make('hendra123'),
            'job' => 'Buruh Bangunan',
            'role' => 'pendukung',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Inayah Putri',
            'email' => 'inayah@example.com',
            'password' => Hash::make('inayah123'),
            'job' => 'Guru',
            'role' => 'pendukung',
            'isactive' => true,
        ]);
        User::create([
            'name' => 'Joko Supriyanto',
            'email' => 'joko@example.com',
            'password' => Hash::make('joko123'),
            'job' => 'Nelayan',
            'role' => 'pendukung',
            'isactive' => true,
        ]);
    }
}
