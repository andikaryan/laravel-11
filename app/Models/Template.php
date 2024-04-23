<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tenant(): HasMany
    {
        return $this->hasMany(Tenant::class);
    }

    public function industry() : BelongsTo {
        return $this->belongsTo(Industry::class);
    }
}
