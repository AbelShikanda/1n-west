<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPropertyCategories extends Model
{
    use HasFactory;

    protected $table = 'property_property_categories';

    protected $fillable = [
        'property_id',
        'property_category_id',
    ];
}
