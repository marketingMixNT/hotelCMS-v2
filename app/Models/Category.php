<?php

namespace App\Models;

use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type'=>'array'
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function apartments(): BelongsToMany
    {
        return $this->belongsToMany(Apartment::class,'category_apartment');
    }

    public function getThumbnailUrl()
    {
        return  asset('storage/' . $this->thumbnail);
    }


    public static function getForm() :array{
return [
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

    Select::make('type')
        ->label('Rodzaj')
        ->required()
        ->multiple()
        ->live()
        ->options([
            'apartamenty' => 'apartamenty',
            'posty' => 'posty',
        ])
        ->helperText('Wybierz do czego chcesz przypisać kategorię'),

    FileUpload::make('thumbnail')
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


        ];
    }
}
