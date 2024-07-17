<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CategoryResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Tytuł')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->live(debounce: 1000)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->readonly()
                    ->label('Slug')
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->helperText('Przyjazny adres url który wygeneruje się automatycznie na podstawie nazwy apartamentu.'),

                Forms\Components\Select::make('type')
                    ->label('Rodzaj')
                    ->required()
                    ->multiple()
                    ->live()
                    ->options([
                        'apartamenty' => 'apartamenty',
                        'posty' => 'posty',
                    ])
                    ->helperText('Wybierz do czego chcesz przypisać kategorię'),

                Forms\Components\FileUpload::make('thumbnail')
                    ->visible(fn (Get $get) => in_array('apartamenty', $get('type') ?? []))
                    ->label('Miniaturka')
                    ->directory('category-images')
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => 'category-images-' . now()->format('Ymd_His') . '.' . $file->getClientOriginalExtension()
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
                    ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                ->label('Miniaturka'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Tytuł')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Rodzaj')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return ('Kategorie');
    }
    public static function getPluralLabel(): string
    {
        return ('Kategorie');
    }

    public static function getLabel(): string
    {
        return ('Kategoria');
    }
}
