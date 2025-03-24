<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

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

    public function category()
    {
        return $this->belongsTo(PropertyCategories::class, 'categories_id');
    }

    public function type()
    {
        return $this->belongsTo(PropertyTypes::class, 'types_id');
    }
}
