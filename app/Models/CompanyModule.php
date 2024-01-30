<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CompanyModule extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','module_id'];

    public function moduleDetail(): BelongsToMany
    {
        return $this->belongsToMany(Module::class,'company_modules','module_id');
    }
}
