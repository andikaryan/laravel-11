<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Page;
use App\Models\Template;
use App\Models\Tenant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $template = Template::create(
            [
                'name' => "Tech",
            ]
        );

        $name = "admin";

        $slug = str_replace(' ', '-', $name);

        $tenant = Tenant::create(
            [
                'slug' =>  strtolower($slug . "-" .Str::random(6).date("smd")),
                'template_id' => 1,
                'account_plan' => Tenant::FREE,
            ]
        );

        $page = Page::create([
            'tenant_id' => $tenant->id,
            'type'=>'content',
        ]
        );

        $content = Content::create([
            'page_id' => $page->id,
        ]);

        $page = Page::create([
            'tenant_id' => $tenant->id,
            'type'=>'products',
        ]
        );

        $centralDomain = config('app.central_domain');
        $domain = $tenant->domains()->create([
            'domain' => $tenant->slug . '.' . $centralDomain,
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$1.3BKkOnt5k5clksgR5eS.XidXptjmWL4JAqIFK09MVIhfwDkeRd.',
            'tenant_id' => $tenant->id,
        ]);
    }
}
