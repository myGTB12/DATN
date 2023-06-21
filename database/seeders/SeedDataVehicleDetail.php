<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\VehicleDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class SeedDataVehicleDetail extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = Vehicle::all();
        foreach ($vehicles as $vehicle) {
            VehicleDetail::create([
                "vehicle_id" => $vehicle->id,
                "img" => fake()->imageUrl(640, 480, 'car'),
                "img2" => fake()->imageUrl(640, 480, 'car'),
                "img3" => fake()->imageUrl(640, 480, 'car'),
                "img4" => fake()->imageUrl(640, 480, 'car'),
                "fuel" => fake()->randomNumber(2),
                "vehicle_number" => fake()->randomNumber(8),
                "color" => fake()->colorName(),
            ]);
        }
    }
}
