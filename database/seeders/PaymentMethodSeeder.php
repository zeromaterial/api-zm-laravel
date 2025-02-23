<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::create([
            'name' => 'Bank Transfer',
            'account_number' => '3270001201',
        ]);

        PaymentMethod::create([
            'name' => 'E-Wallet',
            'account_number' => '0012890114',
        ]);

        PaymentMethod::create([
            'name' => 'QRIS',
            'account_number' => 'QR00271546',
        ]);
    }
}
