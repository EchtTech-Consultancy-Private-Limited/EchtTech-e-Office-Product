<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'role_id' => Role::where('name', 'admin')->first()->id,
                'name' => 'Admin',
                'email' => 'admin@yopmail.com',
                'mobile' => '9876543211',
                'email_verified_at' => '2022-05-23 00:00:00',
                'password' => Hash::make('password'),
                'is_active' => 1,
            ]);


        User::create(
            [
                'role_id' => Role::where('name', 'employee')->first()->id,
                'name' => 'Employee',
                'email' => 'employee@gmail.com',
                'mobile' => '9876543212',
                'email_verified_at' => '2022-05-23 00:00:00',
                'password' => Hash::make('password'),
                'is_active' => 1,
            ]);


    }
}
