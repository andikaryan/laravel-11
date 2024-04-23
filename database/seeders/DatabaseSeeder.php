<?php

namespace Database\Seeders;

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
        $name = "admin";

        $slug = str_replace(' ', '-', $name);

        $tenant = Tenant::create(
            [
                'slug' =>  strtolower($slug . "-" .Str::random(6).date("smd")),
            ]
        );

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$1.3BKkOnt5k5clksgR5eS.XidXptjmWL4JAqIFK09MVIhfwDkeRd.',
            'tenant_id' => $tenant->id,
        ]);
    }
}
