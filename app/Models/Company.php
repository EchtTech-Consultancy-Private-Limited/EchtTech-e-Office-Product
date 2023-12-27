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
        'company_database_id',
        'company_name',
        'app_name',
        'logo',
        'logo_path',
        'gov_tax_number_ein',
        'legal_trading_name',
        'registration_number',
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
}
