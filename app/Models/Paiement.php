<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'user_id', 'status',
        'amount',
        'payment_method',
        'paid_at',
        'transaction_id'
    ];

    protected $guarded = [];

    protected $casts = [
        'paid_at' => 'datetime',
        'status' => 'enum:App\Enums\StatusPaiementEnum'
    ];

    public function reservation():BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }


}
