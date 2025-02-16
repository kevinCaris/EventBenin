<?php

namespace App\Models;

use App\Enums\StatusHallEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'capacity',
        'image',
        'address',
        'city',
        'country',
        'latitude',
        'longitude',
        'website',
        'capacity_min',
        'capacity_max',
        'price',
        'tarification',
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

    public function eventTypePrices()
    {
        return $this->hasMany(EventTypePrice::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
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

    public function availabilities(): HasMany
    {
        return $this->hasMany(HallAvailability::class, 'hall_id');
    }

    public function isavailable(){
        $this ->status = StatusHallEnum::AVAILABLE;
    }

    public function isunavailable(){
        $this ->status = StatusHallEnum::UNAVAILABLE;
    }
}
