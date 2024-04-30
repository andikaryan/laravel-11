<?php

namespace App;

use App\Models\Domain;
use App\Models\Page;
use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class productScopes extends Model
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('product', function (Builder $builder, Model $model, Product $product) {
            $domain = Domain::where('domain', request()->getHost())->first();
            $tenant = Tenant::find($domain->tenant_id);
            $page = Page::where('tenant_id', $tenant->id)->where('type', 'product')->value('id');
            $product->where('page_id', $page->id)->value('id');
        });
    }
}
