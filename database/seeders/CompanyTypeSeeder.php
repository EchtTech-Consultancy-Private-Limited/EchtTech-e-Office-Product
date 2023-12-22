<?php

namespace Database\Seeders;

use App\Models\CompanyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyType::create([
            'name' => 'Corporation',
            'is_active' => true,
        ]);

        CompanyType::create([
            'name' => 'Exempt Organization',
            'is_active' => true,
        ]);

        CompanyType::create([
            'name' => 'Partnership',
            'is_active' => true,
        ]);

        CompanyType::create([
            'name' => 'Private Foundation',
            'is_active' => true,
        ]);

        CompanyType::create([
            'name' => 'Limited Liability Company',
            'is_active' => true,
        ]);
    }
}
