<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();
        // \App\Models\User::factory(10)->create();
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(CompanyTypeSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DesignationSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(EmployeeEducationSeeder::class);
        $this->call(EmployeeWorkHistorySeeder::class);
        $this->call(EmployeeAccountDetailSeeder::class);
    }
}
