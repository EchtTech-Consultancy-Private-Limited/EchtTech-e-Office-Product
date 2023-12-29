<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCompany extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','user_id'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,"company_id");
    }
}