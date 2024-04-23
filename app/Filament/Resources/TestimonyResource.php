<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonyResource\Pages;
use App\Filament\Resources\TestimonyResource\RelationManagers;
use App\Models\Page;
use App\Models\Tenant;
use App\Models\Testimony;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonyResource extends Resource
{
    protected static ?string $model = Testimony::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                Textarea::make('content')
            ]);
    }

    public static function table(Table $table): Table
    {
        $page_id = Page::where('tenant_id', auth()->user()->tenant_id)->where('type', 'testimony')->value('id');
        return $table
        ->query(Testimony::query()->where('page_id', $page_id))
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('content')
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

    public static function canViewAny(): bool
    {
        $page_type= Page::where('tenant_id', auth()->user()->tenant_id)->where('type', 'testimony')->value('type');
        if ($page_type=='testimony') {
            return true;
        }
        return false;
    }

    public static function canCreate(): bool
    {
        $plan = auth()->user()->tenant->account_plan;
        $page_id= Page::where('tenant_id', auth()->user()->tenant_id)->where('type', 'testimony')->value('id');
        $count_testimony= Testimony::where('page_id',$page_id)->count();
        $max_testimony = Tenant::where('id', auth()->user()->tenant_id)->value('max_testimony');
        if ($max_testimony && $count_testimony == 5) {
            return false;
        }

        return true;
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
            'index' => Pages\ListTestimonies::route('/'),
            'create' => Pages\CreateTestimony::route('/create'),
            'edit' => Pages\EditTestimony::route('/{record}/edit'),
        ];
    }
}
