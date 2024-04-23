<?php

namespace App\Filament\Resources\TestimonyResource\Pages;

use App\Filament\Resources\TestimonyResource;
use App\Models\Page;
use App\Models\Tenant;
use App\Models\Testimony;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTestimony extends CreateRecord
{
    protected static string $resource = TestimonyResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $page_id= Page::where('tenant_id', auth()->user()->tenant_id)->where('type', 'testimony')->value('id');
        $data['page_id'] = $page_id;
        return $data;
    }

    public static function canCreateAnother(): bool
    {
        return false;
    }
}
