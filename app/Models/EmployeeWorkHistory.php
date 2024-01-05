<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeWorkHistory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'employee_id',
        'department_id',
        'designation_id',
        'company_name',
        'join_date',
        'leave_date',
        'file',
    ];
}
