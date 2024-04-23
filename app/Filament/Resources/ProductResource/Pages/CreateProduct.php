<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Page;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $page_id= Page::where('tenant_id', auth()->user()->tenant_id)->where('type','products')->value('id');

        $data['page_id'] = $page_id;
        return $data;
    }
    public static function canCreateAnother(): bool
    {
        return false;
    }
}
