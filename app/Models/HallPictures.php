<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallPictures extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'hall_id',
    ];

    public function hall():BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }
}
