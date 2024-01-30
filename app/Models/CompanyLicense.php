<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyLicense extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'company_id',
        'license_id',
        'license_key',
        'started_at',
        'expired_at',
        'status',
        'is_expired',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

}
