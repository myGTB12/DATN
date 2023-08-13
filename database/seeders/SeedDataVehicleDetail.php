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

    private $brand = [
        "Toyota",
        "Honda",
        "Ford",
        "Mazda",
        "Hyundai",
        "Kia",
        "Mitsubishi",
        "Chevrolet",
        "Nissan",
        "Suzuki",
    ];

    private $name = [
        "Honda CR-V",
        "Ford Ranger",
        "Mazda CX-5",
        "Hyundai Tucson",
        "Kia Cerato",
        "Mitsubishi Triton",
        "Chevrolet Cruze",
        "Nissan Terra",
        "Suzuki Ertiga",
        "Honda City",
        "Ford EcoSport",
        "Toyota Fortuner",
        "Mitsubishi Xpander",
        "Hyundai Grand i10",
        "Kia Seltos",
        "Mazda3",
        "Nissan Navara",
        "Chevrolet Trailblazer",
        "Suzuki Swift",
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = Vehicle::all();
        foreach ($vehicles as $vehicle) {
            VehicleDetail::create([
                "vehicle_id" => $vehicle->id,
                "brand" => $this->brand[random_int(0, 9)],
                "car_name" => $this->name[random_int(0, 18)],
                "capacity" => random_int(4, 16),
                "insurance_fee" => random_int(100000, 1000000),
                "per_night_price" => random_int(500000, 5000000),
                "over_time_price" => random_int(500000, 5000000),
                "usage_fee" => random_int(100000, 1000000),
                "img" => env('STORAGE_PATH') . "car" . random_int(1, 16) . ".jpg",
                "img2" => env('STORAGE_PATH') . "car" . random_int(1, 16) . ".jpg",
                "img3" => env('STORAGE_PATH') . "car" . random_int(1, 16) . ".jpg",
                "img4" => env('STORAGE_PATH') . "car" . random_int(1, 16) . ".jpg",
                "fuel" => random_int(0, 1),
                "engine" => random_int(0, 1),
                "vehicle_number" => random_int(10000, 99999),
                "color" => fake()->colorName(),
                "width" => fake()->randomFloat(2, 0, 2),
                "height" => fake()->randomFloat(2, 0, 2),
                "length" => fake()->randomFloat(2, 0, 4),
            ]);
        }
    }
}
