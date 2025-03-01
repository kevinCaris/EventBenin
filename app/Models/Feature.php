<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    public function halls():BelongsToMany
    {
        return $this->belongsToMany(Hall::class, 'feature_halls');
    }
}
