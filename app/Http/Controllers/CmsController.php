<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index()
    {
        return redirect()->route('filament.admin.pages.content');
    }

    public function show()
    {
        $slug = Tenant::where('id', auth()->user()->tenant_id)->value('slug');
        $centralDomain = config('app.central_domain');
        $url = request()->getScheme() . '://' . $slug . '.' . $centralDomain;

        return redirect()->away($url);
    }
}
