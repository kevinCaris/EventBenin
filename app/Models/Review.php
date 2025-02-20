<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_id', 'nom', 'email', 'user_id', 'commentaire', 'note'
    ];

    /**
     * La salle li e  ce commentaire
     *
     * @return BelongsTo
     */
    public function hall()
    {
        return $this->belongsTo(Salle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
