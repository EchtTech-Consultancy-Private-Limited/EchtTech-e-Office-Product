<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $userArray = [
            [
                'full_name' => 'Superadmin',
                'user_name' => 'superAdminOffice',
                'email' => 'superadmin@gmail.com',
                'mobile_number' => '9876543210',
                'email_verified_at' => '2022-05-23 00:00:00',
                'password' => Hash::make('superadmin@123'),
                'role' => 'superadmin',
                'status' => 'active',
            ],
            [
                'full_name' => 'Admin',
                'user_name' => 'adminOffice',
                'email' => 'admin@gmail.com',
                'mobile_number' => '9876543211',
                'email_verified_at' => '2022-05-23 00:00:00',
                'password' => Hash::make('admin@123'),
                'role' => 'admin',
                'status' => 'active',
            ],
        ];
        Admin::insert(
            $userArray
        );
    }
}
