<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeedDataUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => "user@user.com",
            'first_name' => 'user1',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);
    }
}
