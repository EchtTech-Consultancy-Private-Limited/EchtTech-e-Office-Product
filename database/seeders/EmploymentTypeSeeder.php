<?php

namespace Database\Seeders;

use App\Models\EmploymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employmentTypes = [
            ['name' => 'onsite'],
            ['name' => 'offsite'],
            ['name' => 'permanent'],
            ['name' => 'freelance'],
        ];

        EmploymentType::insert($employmentTypes);
    }
}
