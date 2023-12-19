<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Silber\Bouncer\Bouncer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'mobile' => '9876543211',
                'email_verified_at' => '2022-05-23 00:00:00',
                'password' => Hash::make('password'),
                'is_active' => 1,
            ]);

       $admin->assign('admin');

        $employee = User::create(
        [
                'name' => 'Employee',
                'email' => 'employee@gmail.com',
                'mobile' => '9876543212',
                'email_verified_at' => '2022-05-23 00:00:00',
                'password' => Hash::make('password'),
                'is_active' => 1,
            ]);

        $employee->assign('employee');

    }
}
