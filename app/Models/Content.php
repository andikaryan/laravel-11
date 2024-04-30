<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'hero',
        'overview',
        'contact_us'
    ];
    protected $casts = [
        'hero' => 'json',
        'overview' => 'json',
        'contact_us' => 'json'
    ];

    public function page():BelongsTo {
        return $this->belongsTo(Page::class);
    }
}
