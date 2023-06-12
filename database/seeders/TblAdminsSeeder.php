<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admins;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class TblAdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admins::create([
            'email' => "admin1201@admin.com",
            'name' => 'admin',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
            'status' => 1
        ]);
    }
}
