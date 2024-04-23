<?php

namespace App\Filament\Pages;

use App\Models\Content as ModelsContent;
use App\Models\Page as ModelsPage;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\Storage;

class Content extends Page
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.content';

    public function mount(): void
    {
        $page_id= ModelsPage::where('tenant_id', auth()->user()->tenant_id)->where('type','content')->value('id');
        $content = ModelsContent::where('page_id', $page_id)->first()->toArray();
        $this->form->fill($content);

    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Hero')
                    ->statePath('hero')
                    ->schema([
                        FileUpload::make('image')
                        ->directory( get_tenant_subdomain().'/hero')
                        ->image()
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            null,
                            '16:9',
                            '4:3',
                            '1:1',
                        ]),
                        TextInput::make('title'),
                        Textarea::make('description')
                    ])
                    ->collapsed()
                    ->footerActions([
                        Action::make('save')
                            ->action(function (){
                                try {
                                    $data = $this->form->getState();
                                    $data_hero = $data['hero'];
                                    $save = [
                                        'hero'=>json_encode($data['hero'])
                                    ];

                                    $page_id= ModelsPage::where('tenant_id', auth()->user()->tenant_id)->where('type','content')->value('id');

                                    // Delete Old Hero Image

                                    // Get image path from db
                                    $content = ModelsContent::where('page_id', $page_id)->select('hero')->first();

                                    if ($content) {
                                        // Hero image handling
                                        $hero_db_path = $content->hero['image'] ?? null;
                                        $hero_form_path = $data_hero['image'] ?? null;

                                        if ($hero_db_path !== $hero_form_path) {
                                            // dd("True");
                                            if($hero_db_path!==null){
                                                Storage::delete($hero_db_path);
                                            }
                                        }

                                    }
                                    ModelsContent::where('page_id', $page_id)->update($save);
                                } catch (Halt $exception) {
                                    return;
                                }
                                Notification::make()
                                    ->success()
                                    ->title(__('New Hero Data Saved'))
                                    ->send();
                            }),
                    ]),
                Section::make('Overview')
                    ->statePath('overview')
                    ->schema([
                        FileUpload::make('image')
                        ->directory( get_tenant_subdomain().'/overview')
                        ->image()
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            null,
                            '16:9',
                            '4:3',
                            '1:1',
                        ]),
                        TextInput::make('title'),
                        Textarea::make('description')
                    ])
                    ->collapsed()
                    ->footerActions([
                        Action::make('save')
                            ->action(function (){
                                try {
                                    $data = $this->form->getState();
                                    $data_overview = $data['overview'];
                                    $save = [
                                        'overview'=>json_encode($data['overview'])
                                    ];

                                    $page_id= ModelsPage::where('tenant_id', auth()->user()->tenant_id)->where('type','content')->value('id');

                                    // Delete Old Overview Image

                                    // Get image path from db
                                    $content = ModelsContent::where('page_id', $page_id)->select('overview')->first();

                                    if ($content) {
                                        // Overview image handling
                                        $overview_db_path = $content->overview['image'] ?? null;
                                        $overview_form_path = $data_overview['image'] ?? null;

                                        if ($overview_db_path !== $overview_form_path) {

                                            if($overview_db_path!==null){
                                                Storage::delete($overview_db_path);
                                            }
                                        }

                                    }
                                    ModelsContent::where('page_id', $page_id)->update($save);
                                } catch (Halt $exception) {
                                    return;
                                }
                                Notification::make()
                                    ->success()
                                    ->title(__('New Overview Data Saved'))
                                    ->send();
                            }),
                    ]),
                Section::make('Contact Us')
                    ->statePath('contact_us')
                    ->schema([
                        TextInput::make('email')
                        ->email(),
                        TextInput::make('phone'),
                        TextInput::make('address'),
                        TextInput::make('map_coordinate')
                        ->label("Map Coordinate"),
                        TextInput::make('ig_link')
                        ->label('Instagram')
                        ->prefix('https://www.instagram.com/')
                        ->suffixAction(
                            Action::make('openInstagram')
                                ->icon('heroicon-m-arrow-top-right-on-square')
                                ->url(fn(Get $get) => 'https://www.instagram.com/'.$get('ig_link'))
                                ->openUrlInNewTab()
                        ),
                        TextInput::make('wa_link'),
                    ])
                    ->collapsed()
                    ->footerActions([
                        Action::make('save')
                            ->action(function (){
                                try {
                                    $data = $this->form->getState();
                                    $save = [
                                        'contact_us'=>json_encode($data['contact_us'])
                                    ];

                                    $page_id= ModelsPage::where('tenant_id', auth()->user()->tenant_id)->where('type','content')->value('id');


                                    ModelsContent::where('page_id', $page_id)->update($save);
                                } catch (Halt $exception) {
                                    return;
                                }
                                Notification::make()
                                    ->success()
                                    ->title(__('New Contact Us Data Saved'))
                                    ->send();
                            }),
                    ]),

            ])
            ->statePath('data');
    }
}
