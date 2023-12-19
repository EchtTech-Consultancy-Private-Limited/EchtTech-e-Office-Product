<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Silber\Bouncer\Bouncer;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Bouncer $bouncer): void
    {
        $bouncer->role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);

        $bouncer->role()->firstOrCreate([
            'name' => 'employee',
            'title' => 'Employee',
        ]);
    }
}
