<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyLicense extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'license_id',
        'license_key',
        'started_at',
        'expired_at',
        'status',
        'is_expired',
    ];

}
