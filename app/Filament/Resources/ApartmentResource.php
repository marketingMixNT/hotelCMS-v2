<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use App\Models\Advantage;
use App\Models\Apartment;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ApartmentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ApartmentResource\RelationManagers;
use App\Models\Benefit;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ApartmentResource extends Resource
{
    protected static ?string $model = Apartment::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                //INFO
                Section::make('Główne informacje')
                    ->icon('heroicon-o-information-circle')
                    ->columns(2)
                    ->collapsible()
                    ->collapsed()
                    ->description('Podaj nazwę aparamentu, kluczowe informacje oraz przypisz kategorie')
                    ->schema([

                        Forms\Components\TextInput::make('name')
                            ->label('Nazwa apartamentu')
                            ->minLength(3)
                            ->maxLength(255)
                            ->required()
                            ->live(debounce: 1000)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->placeholder('Przyjazny adres url który wygeneruje się automatycznie')
                            ->readOnly(),



                        Fieldset::make('Info')
                            ->schema([
                                Forms\Components\TextInput::make('persons')
                                    ->label('Max. liczba osób')
                                    ->placeholder('np. 5')
                                    ->required()
                                    ->numeric()
                                    ->columns(1),

                                Forms\Components\TextInput::make('price')
                                    ->label('Minimalna cena za noc')
                                    ->required()
                                    ->placeholder('np. 250')
                                    ->numeric()
                                    ->suffix('zł')
                                    ->columns(1),
                                Forms\Components\TextInput::make('link')
                                    ->label('Link do strony apartamentu')
                                    ->url()
                                    ->required()
                                    ->columns(1),
                            ])



                    ]),
                //DESCRIPTION
                Section::make('Kategorie oraz zalety')
                    ->icon('heroicon-o-tag')
                    ->columns(2)
                    ->collapsible()
                    ->collapsed()
                    ->description('Przypisz kategorię oraz zalety')
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->placeholder('Mozesz wybrac kilka')
                            ->multiple()
                            ->searchable()

                            ->createOptionForm(Category::getForm())
                            ->preload()
                            ->label('Kategoria')
                            ->relationship('categories', 'title', function ($query) {
                                $query->whereJsonContains('type', 'apartamenty');
                            })
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Select::make('advantage_id')
                            ->placeholder('Mozesz wybrac kilka')
                            ->multiple()
                            ->searchable()

                            ->createOptionForm(Advantage::getForm())
                            ->preload()
                            ->label('Zalety')
                            ->relationship('advantages', 'title',)
                            ->required()
                            ->columnSpanFull(),
                    ]),

                //ADDRESS
                Section::make('Adres')
                    ->icon('heroicon-o-map')
                    ->columns(2)
                    ->collapsible()
                    ->collapsed()
                    ->description('Podaj adres oraz link do mapy google')
                    ->schema([
                        Forms\Components\TextInput::make('region')
                            ->label('Adres')
                            ->placeholder('np. Skólavörðustígur 101, Reykjavík, Iceland')
                            ->required()
                            ->columns(1),
                        Forms\Components\TextInput::make('google_maps_link')
                            ->label('Link do mapy google')
                            ->placeholder('np. https://maps.app.goo.gl/6mVWwduHMxm2pEKP8')
                            ->url()
                            ->columns(1),
                    ]),

                //CONTENT
                Section::make('Treści')
                    ->icon('heroicon-o-pencil-square')
                    ->columns(2)
                    ->collapsible()
                    ->collapsed()
                    ->description('Treści na stronę apartamentu')
                    ->schema([
                        Forms\Components\RichEditor::make('short_desc')
                            ->label('Krótki opis')
                            ->required()
                            ->toolbarButtons([
                                'bold', 'italic',
                            ])
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('desc')
                            ->label('Główny opis')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                     //BENEFITS
                    Section::make('Benefity')
                    ->icon('heroicon-o-hand-thumb-up')
                    ->columns(2)
                    ->collapsible()
                    ->collapsed()
                    ->description('Dodaj benefity')
                    ->schema([

                        Repeater::make('benefits')
                            ->label('Benefity')
                            ->relationship()
                            ->schema(Benefit::getForm())
                            ->columnSpanFull()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                            ->addActionLabel('Dodaj benefit')
                            ->collapsed()
                            ->cloneable()
                            ->grid(2)

                    ]),
                //IMAGES
                Section::make('Zdjęcia')
                    ->icon('heroicon-o-photo')
                    ->columns(2)
                    ->collapsible()
                    ->collapsed()
                    ->description('Dodaj zdjęcie oraz galerię')
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('Miniaturka')
                            ->directory('apartments-thumbnails')
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string => 'apartament' . now()->format('H-i-s') . '-' . str_replace([' ', '.'], '', microtime()) . '.' . $file->getClientOriginalExtension()
                            )
                            ->image()
                            ->maxSize(4096)
                            ->optimize('webp')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('gallery')
                            ->label('Galeria')
                            ->directory('apartments-galleries')
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string => 'galeria' . now()->format('H-i-s') . '-' . str_replace([' ', '.'], '', microtime()) . '.' . $file->getClientOriginalExtension()
                            )
                            ->multiple()
                            ->appendFiles()
                            ->image()
                            ->maxSize(4096)
                            ->optimize('webp')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->required()
                            ->columnSpanFull(),
                    ]),
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Miniaturka'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nazwa')
                    ->description(function (Apartment $record) {
                        return Str::limit(strip_tags($record->short_desc), 40);
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('categories.title')
                    ->label('Kategorie')
                    ->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListApartments::route('/'),
            'create' => Pages\CreateApartment::route('/create'),
            'edit' => Pages\EditApartment::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return ('Apartamenty');
    }
    public static function getPluralLabel(): string
    {
        return ('Apartament');
    }

    public static function getLabel(): string
    {
        return __('Apartamenty');
    }
}
