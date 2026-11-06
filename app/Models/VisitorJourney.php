<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorJourney extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_data_id',
        'page_url',
        'event_type',
        'visited_at',
    ];

    public function visitorData()
    {
        return $this->belongsTo(VisitorData::class, 'visitor_data_id');
    }
}
