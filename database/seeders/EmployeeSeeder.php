<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        $employeeArray = [
            [
                'created_by' => '1',
                'country_id' => '1',
                'state_id' => '26',
                'city_id' => '934',
                'employee_id' => 'ET0001',
                'name' => 'Employee Test',
                'email' => 'employee@gmail.com',
                'phone_number' => '9876543212',
                'gender' => 'male',
                'date_of_birth' => Carbon::createFromFormat('m/d/Y', '11/08/1998')->format('Y-m-d'),
                'pincode' => '274305',
                'current_address' => "NX IT Park Noida Uttar Pradesh",
                'permanent_adderss' => 'Noida Uttar Pradesh',
                'image' => 'testimg.png',
                'status' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'created_by' => '1',
                'country_id' => '1',
                'state_id' => '26',
                'city_id' => '934',
                'employee_id' => 'ET0002',
                'name' => 'Tester Employee',
                'email' => 'testemployee@gmail.com',
                'phone_number' => '9876543211',
                'gender' => 'female',
                'date_of_birth' => Carbon::createFromFormat('m/d/Y', '11/08/1998')->format('Y-m-d'),
                'pincode' => '274305',
                'current_address' => "NX IT Park Noida Uttar Pradesh",
                'permanent_adderss' => 'Noida Uttar Pradesh',
                'image' => 'test.png',
                'status' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];
        Employee::insert(
            $employeeArray
        );
    }
}
