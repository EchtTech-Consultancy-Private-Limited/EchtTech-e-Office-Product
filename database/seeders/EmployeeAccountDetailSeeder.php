<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeeAccountDetail;
use Carbon\Carbon;

class EmployeeAccountDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        $employeeAccountDetailArray = [
            [
                'employee_id' => '1',
                'account_type' => 'pf',
                'account_number' => '42443242312222',
                'bank_name' => 'State Bank Of India',
                'ifsc_code' => 'SBIN0004122',
                'branch_address' => 'Noida',
                'passbook_file' => 'passbook.png',
                'doc_file' => 'first.png',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'employee_id' => '1',
                'account_type' => 'bank',
                'account_number' => '9876554432234',
                'bank_name' => 'ICICI',
                'ifsc_code' => 'ICICI009812',
                'branch_address' => 'Delhi',
                'passbook_file' => 'passbook.png',
                'doc_file' => 'first.png',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];
        EmployeeAccountDetail::insert(
            $employeeAccountDetailArray
        );
    }
}
