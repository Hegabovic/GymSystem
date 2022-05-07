<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin= User::UpdateOrCreate(['email'=>'admin@admin.com'],[
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('123456'),
           'avatar_path'=>env('DEFAULT_AVATAR')

        ]);
       $admin->assignRole('Admin');
       User::factory()->times(500)->create();
    }
}
