<?php

namespace Database\Seeders;

use App\Models\Admins;
use App\Models\StationOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class SeedDataStationOwner extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admins::first();
        for($i = 0; $i < 10; $i++){
            StationOwner::create([
                "status" => 1,
                "admin_id" => $admin->id,
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                "phone" => fake()->phoneNumber(),
                "password" => "password",
                "email_verified_at" => now(),
            ]);
        }
    }
}
