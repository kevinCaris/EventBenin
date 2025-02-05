<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallAvailability extends Model
{
    use HasFactory;
    protected $fillable = [
        'hall_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

}
