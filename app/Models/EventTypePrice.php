<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTypePrice extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['hall_id', 'event_type_id', 'price'];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }
}
