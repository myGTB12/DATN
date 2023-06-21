<?php

namespace Database\Seeders;

use App\Models\Station;
use App\Models\StationOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedDataStation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stationOwners = StationOwner::all();
        foreach ($stationOwners as $stationOwner) {
            Station::create([
                "name" => fake()->name(),
                "status" => random_int(0, 1),
                "owner_id" => $stationOwner->id,
                "mail_address" => fake()->unique()->safeEmail(),
                "phone" => fake()->phoneNumber(),
                "start_business_time" => fake()->time(),
                "end_business_time" => fake()->time(),
                "always_open" => random_int(0, 1),
            ]);
        }
    }
}
