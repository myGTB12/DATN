<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(TblAdminsSeeder::class);
        $this->call(SeedDataStationOwner::class);
        // $this->call(SeedDataStation::class);
        // $this->call(SeedDataVehicles::class);
    }
}
