<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Industry extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function template() : HasMany
    {
        return $this->hasMany(Template::class);
    }
}
