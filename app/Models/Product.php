<?php

namespace App\Models;

use App\productScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_id',
        'slug',
        'title',
        'image',
        'description',
        'price'
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('product', function ($builder) {
            $domain = Domain::where('domain', get_tenant_subdomain().'.'.config('app.central_domain'))->first();
            dd(get_tenant_subdomain().'.'.config('app.central_domain'));
            $tenant = Tenant::find($domain->tenant_id);
            $page = Page::where('tenant_id', $tenant->id)->where('type', 'product')->value('id');
            $builder->where('page_id', $page);
        });
    }
}
