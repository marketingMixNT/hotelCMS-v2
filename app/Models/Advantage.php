<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Advantage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'thumbnail',
        'order',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function getThumbnailUrl()
    {
        return  asset('storage/' . $this->thumbnail);
    }

    public function apartments(): BelongsToMany
    {
        return $this->belongsToMany(Apartment::class);
    }

    public static function getForm():array{
return [
    FileUpload::make('thumbnail')
    ->label('Ikonka')
    ->directory('advantages-images')
    ->getUploadedFileNameForStorageUsing(
        fn (TemporaryUploadedFile $file): string => 'advantages-images-' . now()->format('Ymd_His') . '.' . $file->getClientOriginalExtension()
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

TextInput::make('title')
    ->label('Tytuł')
    ->required()
    ->minLength(3)
    ->maxLength(255),
    ];
    
}}