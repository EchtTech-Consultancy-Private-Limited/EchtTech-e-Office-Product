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
        'created_by',
        'company_type_id',
        'country_id',
        'state_id',
        'city_id',
        'company_name',
        'company_email',
        'logo',
        'logo_path',
        'description',
        'website',
        'company_phone',
        'address_line_1',
        'address_line_2',
        'full_address',
        'pincode','registration_number','gov_tax_number_ein','status'
    ];

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }
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

    public function modules(): HasMany
    {
        return $this->hasMany(CompanyModule::class);
    }

    public function license(): HasOne
    {
        return $this->hasOne(CompanyLicense::class);
    }
}
