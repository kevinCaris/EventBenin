<?php

namespace App\Models;

use App\Enums\StatusHallEnum;
use file;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'capacity',
        'price',
        'image',
        'address',
        'status',
        'company_id',

    ];

    protected $casts = [
        'status' => StatusHallEnum::class,
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function pictures(): HasMany
    {
        return $this->hasMany(HallPicture::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(EventType::class);
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class);
    }



}
