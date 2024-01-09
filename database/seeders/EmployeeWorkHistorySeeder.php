<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeeWorkHistory;
use Carbon\Carbon;

class EmployeeWorkHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        $employeeWorkHistoryArray = [
            [
                'employee_id' => '1',
                'department_id' => '1',
                'designation_id' => '1',
                'company_name' => 'EchtTech Pvt. Ltd. Noida',
                'join_date' => Carbon::createFromFormat('m/d/Y', '12/05/2017')->format('Y-m-d'),
                'leave_date' => Carbon::createFromFormat('m/d/Y', '12/05/2020')->format('Y-m-d'),
                'file' => 'bsc.png', 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'employee_id' => '1',
                'department_id' => '1',
                'designation_id' => '1',
                'company_name' => 'Xeam venture Mohali',
                'join_date' => Carbon::createFromFormat('m/d/Y', '12/05/2020')->format('Y-m-d'),
                'leave_date' => Carbon::createFromFormat('m/d/Y', '12/05/2022')->format('Y-m-d'),
                'file' => 'bsc.png', 
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];
        EmployeeWorkHistory::insert(
            $employeeWorkHistoryArray
        );
    }
}
