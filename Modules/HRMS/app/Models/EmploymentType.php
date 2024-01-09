<?php

namespace Modules\HRMS\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\HRMS\Database\factories\EmploymentTypeFactory;

class EmploymentType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): EmploymentTypeFactory
    {
        //return EmploymentTypeFactory::new();
    }
}
