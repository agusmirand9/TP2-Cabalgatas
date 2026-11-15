<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/**
 * representa la reserva de un usuario a la cabalgata
 */

class Booking extends Model
{
    protected $primaryKey = 'booking_id';

    /**
     * conversion automatica del tipo para los atributos
     */

    protected function casts(): array
    {
        return [
            'ride_date' => 'date',
        ];
    }

    /**
     * precio total de la reserva, se guarda en la base x100, y se lee /100
     */

    public function totalPrice(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value / 100,
            set: fn($value) => $value * 100,
        );
    }

    /**
     * usuario que hizo la reserva
     */
    public function ride(): BelongsTo
    {
        return $this->belongsTo(Ride::class, 'ride_fk', 'ride_id');
    }
}
