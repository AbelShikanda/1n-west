<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Property extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'categories_id',
        'types_id',
        'price',
        'name',
        'slug',
        'rooms',
        'baths',
        'living_rooms',
        'kitchens',
        'country',
        'county',
        'town',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'parking',
        'whatsapp',
        'telegram',
        'website',
        'promotion',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected $casts = [
        'parking' => 'boolean',
        'whatsapp' => 'boolean',
        'telegram' => 'boolean',
        'website' => 'boolean',
        'promotion' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(PropertyCategories::class, 'categories_id');
    }

    public function type()
    {
        return $this->belongsTo(PropertyTypes::class, 'types_id');
    }

    public function images()
    {
        return $this->hasMany(PropertyImages::class, 'property_id');
    }

    public function primaryImage()
    {
        return $this->hasOne(PropertyImages::class, 'property_id')->where('is_primary', true);
    }
}
