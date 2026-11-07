<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPropertyTypes extends Model
{
    use HasFactory;

    protected $table = 'property_property_types';

    protected $fillable = [
        'property_id',
        'property_type_id',
    ];
}
