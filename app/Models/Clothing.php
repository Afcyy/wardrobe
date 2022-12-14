<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class Clothing extends Model implements HasMedia
{
    use HasFactory, HasTags, InteractsWithMedia;

    protected $fillable = [
        'category_id', 'tags', 'image_url'
    ];

    protected $appends = [
        'image'
    ];

    public function seasons(): BelongsToMany
    {
        return $this->belongsToMany(Season::class, 'clothing_seasons')->withTimestamps();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function outfit(): BelongsTo
    {
        return $this->belongsTo(Outfit::class);
    }

    public function getImageAttribute(){
        return $this->attributes['image_url'] ?? $this->getFirstMediaUrl('outfits');
    }

//    /**
//     * @throws InvalidManipulation
//     */
//    public function registerMediaConversions(Media $media = null): void
//    {
//        $this
//            ->addMediaConversion('outfits')
//            ->fit(Manipulations::FIT_CROP, 300, 300)
//            ->queued();
//    }
}
