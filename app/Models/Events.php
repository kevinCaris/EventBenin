<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_type',
         'start_date',
          'end_date',
          'start_time',
          'end_time',
          'details',
          'amount',
          'user_id',
          'hall_id',
          'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Relation avec la salle choisie
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class); // Un événement a plusieurs avis
    }
}
