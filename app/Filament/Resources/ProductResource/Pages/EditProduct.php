<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Page;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->before(function () {
                $data = $this->form->getState();
                Storage::deleteDirectory(get_tenant_subdomain().'/product/'.$data['slug'].'/');
            }),
        ];
    }

    protected function beforeSave(): void
    {
        $data = $this->form->getState();
        $page_id = Page::where('tenant_id', auth()->user()->tenant_id)->where('type', 'products')->value('id');
        $product = Product::where('page_id', $page_id)->first();

        if($product){
            $img_db = $product->image ?? null;
            $img_form = $data['image'] ?? null;

            if($img_db != $img_form){
                if($img_db != null){
                    Storage::delete($img_db);
                }

            }
        }
        Product::where('id')->update($data);
    }
}
