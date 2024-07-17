<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Apartment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'short_desc',
        'desc',
        'persons',
        'region',
        'price',
        'link',
        'gallery',
        'google_maps_link',
        'thumbnail',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'gallery' => 'array'
    ];

  

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_apartment');
    }
    public function advantages(): BelongsToMany
    {
        return $this->belongsToMany(Advantage::class,);
    }

    public function benefits(): HasMany
    {
        return $this->hasMany(Benefit::class);
    }


    public function getThumbnailUrl() :string
    {
        return  asset('storage/' . $this->thumbnail);
    }

}
