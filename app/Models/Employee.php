<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'created_by',
        'country_id',
        'state_id',
        'city_id',
        'employee_id',
        'name',
        'email',
        'phone_number',
        'gender',
        'date_of_birth',
        'pincode',
        'current_address',
        'permanent_adderss',
        'image',
        'status',
    ];
}
