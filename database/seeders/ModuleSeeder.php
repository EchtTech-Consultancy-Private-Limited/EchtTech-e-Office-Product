<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        Module::create([
            'module_name' => 'HRMS',
            'title' => 'Human Resources Management System',
            'description' => 'Human Resources Management System',
            'is_active' => true
        ]);
    }
}
