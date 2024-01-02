<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'lin_number',
        'cin_number',
        'tan_number',
        'esic_number',
        'epf_number',
        'aadhar_udhyam',
        'aadhar_udhyam_type',
        'dpiit_certificate_number',
        'cmmi_level',
        'iso_certification_file',
        'ministry_name',
        'registered_address',
        'corporate_office_address',
        'billing_address',
    ];
}
