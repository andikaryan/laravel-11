<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Page;
use App\Models\Product;
use App\Models\Template;
use App\Models\Tenant;
use App\Models\Testimony;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(Request $request){
        $tenant = Tenant::where('id', tenant('id'))->first();
        $template_id = Tenant::where('id', tenant('id'))->value('template_id');
        $template_name = Template::where('id', $template_id)->value('name');
        $page = Page::where('tenant_id', $tenant->id)->where('type', 'content')->value('id');
        $hero = Content::where('page_id', $page)->value('hero');
        $overview = Content::where('page_id', $page)->value('overview');
        $contact_us = Content::where('page_id', $page)->value('contact_us');
        $product_page = Page::where('tenant_id', $tenant->id)->where('type', 'products')->value('id');
        $products = Product::where('page_id', $product_page)->get();
        $testimony_page = Page::where('tenant_id', $tenant->id)->where('type', 'testimony')->value('id');
        $testimonies = Testimony::where('page_id', $testimony_page)->get();
        // dd($testimonies);

        return view($template_name.'.pages.landing', compact('hero', 'overview', 'contact_us', 'products', 'testimonies'));
    }

    public function show($id):View
    {
        $template_id = Tenant::where('id', tenant('id'))->value('template_id');
        $template_name = Template::where('id', $template_id)->value('name');
        $product = Product::find($id);

        return view($template_name.'.pages.detail', [
            'product' => $product,
        ]);
    }
}
