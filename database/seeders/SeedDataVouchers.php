<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Seeder;

class SeedDataVouchers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            Voucher::create([
                'start_time' => fake()->dateTimeThisYear(),
                'expire_time' => fake()->dateTimeThisYear(),
                'percent' => random_int(5, 50),
                'amount' => random_int(10000, 50000),
                'img' => env('STORAGE_PATH') . 'voucher' . $i . '.jpg',
                "name" => "Voucher " . $i,
                "description" => fake()->sentence(12, true),
                "code" => "VC_" . random_int(1000, 9999),
            ]);
        }
    }
}
