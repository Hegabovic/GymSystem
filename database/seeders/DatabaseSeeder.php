<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Customer;
use App\Models\Gym;
use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(GymSeeder::class);
        $this->call(TrainingSessionSeeder::class);
        $this->call(AttendanceSeeder::class);
        $this->call(CoachSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(CityManagerSeeder::class);
    }
}
