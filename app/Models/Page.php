<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'type'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function content():HasOne {
        return $this->hasOne(Content::class);
    }
}
