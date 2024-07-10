<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use FilamentTiptapEditor\TiptapEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Tytuł oraz treść')
                    ->icon('heroicon-o-pencil')
                    ->collapsible()
                    ->collapsed()
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Tytuł')
                            ->unique(ignoreRecord: true)
                            ->required()
                            ->minLength(3)
                            ->maxLength(255)
                            ->live(debounce: 1000)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->readonly()
                            ->label('Slug')
                            ->required()
                            ->minLength(3)
                            ->maxLength(255)
                            ->helperText('Przyjazny adres url który wygeneruje się automatycznie na podstawie nazwy apartamentu.'),

                        RichEditor::make('content')
                            ->label('Treść posta')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Section::make('Miniaturka oraz kategoria')
                    ->icon('heroicon-o-photo')
                    ->collapsible()
                    ->collapsed()
                    ->columns(2)
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->columns(1)
                            ->label('Miniaturka')
                            ->directory('blog-thumbnails')
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string => 'podaj-lapsie-' . now()->format('Ymd_His') . '.' . $file->getClientOriginalExtension()
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
                        Select::make('category_id')

                            ->columns(1)
                            ->label('Kategoria')
                            ->hint('Możesz wybrać kilka kategorii')
                            ->multiple()
                            ->preload()
                            ->relationship('categories', 'title', function ($query) {
                                return $query->whereJsonContains('type', 'posty');
                            })
                            ->required(),
                    ]),
                Section::make('Publikacja')
                    ->icon('heroicon-o-clock')
                    ->collapsible()
                    ->collapsed()
                    ->columns(3)
                    ->schema([
                        DateTimePicker::make('published_at')
                            ->label('Data publikacji')
                            ->columns(1)
                            ->default(now())
                            ->required(),
                        Toggle::make('featured')->label('Polecany')->columnSpanFull()->onIcon('heroicon-o-star'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('published_at', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Miniaturka'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Tytuł')
                    ->searchable()
                    ->sortable()
                    ->description(function (Post $record) {
                        return Str::limit(strip_tags($record->content), 40);
                    }),

                    Tables\Columns\TextColumn::make('categories.title')
                    ->label('Kategorie'),

               
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Data publikacji')
                    ->badge()
                    ->dateTime()
                    ->formatStateUsing(function ($state) {
                        return Carbon::parse($state)->format('d-m-Y H:i');
                    })
                    ->color(function ($state) {
                        if ($state <= Carbon::now()) {
                            return 'success';
                        } else {
                            return 'danger';
                        }
                    })
                    ->sortable(),
                Tables\Columns\IconColumn::make('featured')
                    ->label('Polecony')
                    ->boolean(),





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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
