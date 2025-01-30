<?php

namespace Database\Factories;

use App\Models\EventType;
use App\Models\EventTypeHall;
use App\Models\Hall;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventTypeHall>
 */
class EventTypeHallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $combinations = []; // Stocker les associations déjà générées

        // Récupérer tous les IDs disponibles
        $eventTypeIds = EventType::pluck('id')->toArray();
        $hallIds = Hall::pluck('id')->toArray();

        if (empty($eventTypeIds) || empty($hallIds)) {
            throw new \Exception("⚠️ Il faut d'abord avoir des EventTypes et des Halls en base.");
        }

        // Générer une combinaison unique
        do {
            $eventTypeId = $eventTypeIds[array_rand($eventTypeIds)];
            $hallId = $hallIds[array_rand($hallIds)];
            $key = "$eventTypeId-$hallId";
        } while (isset($combinations[$key]) || EventTypeHall::where('event_type_id', $eventTypeId)
            ->where('hall_id', $hallId)
            ->exists());

        $combinations[$key] = true; // Marquer comme utilisé

        return [
            'event_type_id' => $eventTypeId,
            'hall_id' => $hallId,
        ];
    }
}
