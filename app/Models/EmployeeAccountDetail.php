<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeAccountDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'employee_id',
        'account_type',
        'account_number',
        'bank_name',
        'ifsc_code',
        'branch_address',
        'passbook_file',
        'doc_file',
    ];
}
