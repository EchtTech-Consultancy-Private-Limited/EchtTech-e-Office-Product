<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $adminRole = Role::where('name', 'admin')->first();
        $employeeRole = Role::where('name', 'employee')->first();

        // Using firstOrCreate to handle duplicates
        User::firstOrCreate([
            'mobile' => '9876543211',
        ], [
            'role_id' => $adminRole->id,
            'name' => 'Admin',
            'email' => 'admin@yopmail.com',
            'email_verified_at' => '2022-05-23 00:00:00',
            'password' => Hash::make('password'),
            'is_active' => 1,
        ]);

        User::firstOrCreate([
            'mobile' => '9876543212',
        ], [
            'role_id' => $employeeRole->id,
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'username' => 'employee',
            'email_verified_at' => '2022-05-23 00:00:00',
            'password' => Hash::make('password'),
            'is_active' => 1,
        ]);
    }
}
