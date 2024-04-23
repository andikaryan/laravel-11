<?php

declare(strict_types=1);

use App\Models\Tenant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->foreignId('template_id')->constrained('templates')->nullOnDelete();
            $table->string('name')->nullable();
            $table->integer('account_plan')->default(Tenant::FREE);
            $table->boolean('is_active')->default(true);
            $table->integer('max_product')->default(5);
            $table->integer('max_testimony')->default(5);
            $table->timestamps();
            $table->json('data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
}
