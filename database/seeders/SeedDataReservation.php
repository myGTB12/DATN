<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\Station;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeedDataReservation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = Station::all();
        $user = User::first();
        $vehicles = Vehicle::all();

        foreach ($stations as $station) {
            for ($i = 0; $i < 20; $i++) {
                Reservation::create([
                    "user_id" => $user->id,
                    "vehicle_id" => $vehicles[$i + 1]->id,
                    "station_start_id" => $station->id,
                    "station_end_id" => $station->id,
                    "start_time" => fake()->dateTimeThisYear(),
                    "end_time" => fake()->dateTimeThisYear(),
                    "status" => random_int(0, 2),
                    "unit_price" => random_int(100000, 1000000),
                    "usage_fee" => random_int(100000, 1000000),
                    "insurance_fee" => random_int(100000, 1000000),
                    "total_amount" => random_int(1000000, 10000000),
                    "per_night_price" => random_int(100000, 1000000),
                    "count_day" => random_int(1, 30),
                    "unit_over_time" => random_int(100000, 1000000),
                    "over_time_price" => random_int(100000, 1000000),
                ]);
            }
        }
    }
}
