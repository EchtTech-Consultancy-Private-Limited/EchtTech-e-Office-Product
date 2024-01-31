<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicensePriceSetting extends Model
{
    use HasFactory;

    protected $fillable = ['per_user_price','per_quarter_price','months'];
}
