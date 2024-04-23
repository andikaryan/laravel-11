<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Page as ModelPage;
use App\Models\Tenant;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Get;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $page_id= ModelPage::where('tenant_id', auth()->user()->tenant_id)->value('id');
        $product = Product::where('page_id', $page_id)->value('image');
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('slug', Str::slug($state.'-'.str::random(6)));
                    }),
                TextInput::make('slug')
                    ->required()
                    ->readOnly(),
                FileUpload::make('image')
                    ->required()
                    ->directory(function (Get $get){
                        return get_tenant_subdomain().'/product/'.$get('slug');
                    })
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ]),
                TextInput::make('description'),
                TextInput::make('price')
                ->prefix('Rp')
                ->suffixAction(
                    Action::make('copyCostToPrice')
                        ->icon('heroicon-m-clipboard')
                        ->requiresConfirmation()
                        ->action(function (Set $set, $state) {
                            $set('price', $state);
                        })
                    ),
            ]);
    }

    public static function table(Table $table): Table
    {
        $page_id = ModelPage::where('tenant_id', auth()->user()->tenant_id)->where('type', 'products')->value('id');
        return $table
            ->query(Product::query()->where('page_id', $page_id))
            ->columns([
                TextColumn::make('title'),
                ImageColumn::make('image'),
                TextColumn::make('price'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool{
        $max = auth()->user()->tenant->max_product;
        $page_id= ModelPage::where('tenant_id', auth()->user()->tenant_id)->where('type', 'products')->value('id');
        $count_product = Product::where('page_id', $page_id)->count();
        if($max == $count_product){
            return false;
        }
        return true;
    }
}
