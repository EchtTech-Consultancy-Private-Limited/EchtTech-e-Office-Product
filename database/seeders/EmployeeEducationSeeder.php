<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeeEducation;
use Carbon\Carbon;

class EmployeeEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        $employeeEducationArray = [
            [
                'employee_id' => '1',
                'name' => 'Graduation',
                'title' => 'B.sc (IT)',
                'start_date' => Carbon::createFromFormat('m/d/Y', '12/05/2017')->format('Y-m-d'),
                'end_date' => Carbon::createFromFormat('m/d/Y', '12/05/2020')->format('Y-m-d'),
                'file' => 'bsc.png', 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'employee_id' => '1',
                'name' => 'Post Graduate',
                'title' => 'MCA',
                'start_date' => Carbon::createFromFormat('m/d/Y', '12/05/2020')->format('Y-m-d'),
                'end_date' => Carbon::createFromFormat('m/d/Y', '12/05/2022')->format('Y-m-d'),
                'file' => 'mca.png',                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];
        EmployeeEducation::insert(
            $employeeEducationArray
        );
    }
}
