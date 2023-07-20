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
        for($i = 0; $i < 10; $i++){
            Voucher::create([
                'start_time' => fake()->dateTimeThisYear(),
                'expire_time' => fake()->dateTimeThisYear(),
                'percent' => random_int(5, 50),
                'amount' => random_int(10000, 50000),
            ]);
        }
    }
}
