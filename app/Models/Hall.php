<?php

namespace App\Models;

use App\Enums\StatusHallEnum;
use file;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function isActive(): bool
    {
        return $this->status === StatusHallEnum::AVAILABLE;
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function pictures(): HasMany
    {
        return $this->hasMany(HallPictures::class);
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
        return $this->belongsToMany(EventType::class, 'event_type_halls');
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'feature_halls');
    }



}
