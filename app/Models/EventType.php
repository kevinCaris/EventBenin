<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EventType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];
    public function eventTypePrices()
    {
        return $this->hasMany(EventTypePrice::class);
    }

    public function halls():BelongsToMany
    {
        return $this->belongsToMany(Hall::class, 'event_type_halls');
    }
}
