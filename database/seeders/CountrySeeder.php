<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::updateOrCreate(
        ['iso_code' => 'IND'],
        [
            'name' => 'India',
            'currency' => 'INR',
            'is_active' => true,
        ]
    );
    }
}
