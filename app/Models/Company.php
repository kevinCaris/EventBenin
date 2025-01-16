<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'ville',
        'pays',
        'description',
        'avatar',
        'cover',
        'postal_code',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'website_url',
        'linkedin_url',
        'youtube_url',
        'tiktok_url',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function halls():HasMany
    {
        return $this->hasMany(Hall::class);
    }
}
