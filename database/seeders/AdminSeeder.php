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
                'name' => 'Superadmin',
                'username' => 'superAdminOffice',
                'email' => 'superadmin@yopmail.com',
                'mobile' => '9876543210',
                'email_verified_at' => '2022-05-23 00:00:00',
                'password' => Hash::make('password'),
                'is_active' => 1,
            ],
            [
                'name' => 'Admin',
                'username' => 'adminOffice',
                'email' => 'admin@yopmail.com',
                'mobile' => '9876543211',
                'email_verified_at' => '2022-05-23 00:00:00',
                'password' => Hash::make('password'),
                'is_active' => 1,
            ],
        ];
        Admin::insert(
            $userArray
        );
    }
}
