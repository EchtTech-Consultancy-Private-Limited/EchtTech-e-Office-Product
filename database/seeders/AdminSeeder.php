<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        // Using firstOrCreate to handle duplicates
        Admin::firstOrCreate([
            'username' => 'superAdminOffice',
        ], [
            'name' => 'Superadmin',
            'email' => 'superadmin@yopmail.com',
            'mobile' => '9876543210',
            'email_verified_at' => '2022-05-23 00:00:00',
            'password' => Hash::make('password'),
            'is_active' => 1,
        ]);

        Admin::firstOrCreate([
            'username' => 'adminOffice',
        ], [
            'name' => 'Admin',
            'email' => 'admin@yopmail.com',
            'mobile' => '9876543211',
            'email_verified_at' => '2022-05-23 00:00:00',
            'password' => Hash::make('password'),
            'is_active' => 1,
        ]);
    }
}
