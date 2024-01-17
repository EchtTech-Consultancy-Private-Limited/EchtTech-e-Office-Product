<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'state_id',
        'city_id',
        'company_name',
        'company_email',
        'logo',
        'logo_path',
        'description',
        'website',
        'phone',
        'address_line_1',
        'address_line_2',
        'full_address',
        'pincode',
    ];
    public function certificates(): HasMany
    {
        return $this->hasMany(CompanyCertificate::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function contactDetails(): HasOne
    {
        return $this->hasOne(ContactDetail::class);
    }

    public function databaseDetails(): BelongsTo
    {
        return $this->belongsTo(CompanyDatabase::class,'company_database_id');
    }
}
