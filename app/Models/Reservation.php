<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_id',
        'user_id',
        'date',
        'start_time',
        'end_time',
        'total_price',
    ];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paiement():HasOne
    {
        return $this->hasOne(Paiement::class);
    }

    public function reviews():HasOne
    {
        return $this->hasMany(Review::class);
    }
}
