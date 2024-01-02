<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyModule extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','module_id'];
}
