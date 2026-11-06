<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorData extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'country',
        'region',
        'city',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'referrer',
        'device',
        'browser',
    ];

    public function journeys()
    {
        return $this->hasMany(VisitorJourney::class, 'visitor_data_id');
    }
}
