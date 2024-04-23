<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Template;
use App\Models\Tenant;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(Tenant $tenant, Template $template){
        $template_id = Tenant::where('id', auth()->user()->tenant_id)->value('template_id');
        $template_name = Template::where('id', $template_id)->value('name');
        $hero = Content::where('page_id', $tenant->id)->value('hero');
        $overview = Content::where('page_id', $tenant->id)->value('overview');
        $contact_us = Content::where('page_id', $tenant->id)->value('contact_us');

        return view($template_name.'.index', compact('hero', 'overview', 'contact_us'));
    }
}
