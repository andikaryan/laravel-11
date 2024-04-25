<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Page;
use App\Models\Product;
use App\Models\Template;
use App\Models\Tenant;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(Request $request){
        $tenant = Tenant::where('id', tenant('id'))->first();
        $template_id = Tenant::where('id', tenant('id'))->value('template_id');
        $template_name = Template::where('id', $template_id)->value('name');
        $hero = Content::where('page_id', $tenant->id)->value('hero');
        $overview = Content::where('page_id', $tenant->id)->value('overview');
        $contact_us = Content::where('page_id', $tenant->id)->value('contact_us');
        $page = Page::where('tenant_id', $tenant->id)->where('type', 'product')->value('id');
        dd($page);
        $product = Product::where('page_id', $page->id);

        return view($template_name.'.pages.landing', compact('hero', 'overview', 'contact_us', 'product'));
    }

    public function show(Product $product_id){
        $template_id = Tenant::where('id', tenant('id'))->value('template_id');
        $template_name = Template::where('id', $template_id)->value('name');
        $product = Product::where('id', $product_id)->first();
        return view($template_name.'.pages.detail', compact('product'));
    }
}
