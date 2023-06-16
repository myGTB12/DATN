<?php

namespace Database\Seeders;

use App\Models\Station;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedDataVehicles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = Station::all();
        foreach($stations as $station){
            for($i = 0; $i < 10; $i++){
                Vehicle::create([
                    "station_id" => $station->id,
                    "status" => random_int(0, 1),
                    "vehicle_inspection_exp_date" => fake()->dateTimeThisYear(),
                ]);
            }
        }
    }
}
