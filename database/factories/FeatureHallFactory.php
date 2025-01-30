<?php

namespace Database\Factories;

use App\Models\Feature;
use App\Models\FeatureHall;
use App\Models\Hall;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeatureHall>
 */
class FeatureHallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $combinations = []; // Stocker les combinaisons déjà générées

        // Récupérer les IDs des features et des halls
        $featureIds = Feature::pluck('id')->toArray();
        $hallIds = Hall::pluck('id')->toArray();

        if (empty($featureIds) || empty($hallIds)) {
            throw new \Exception("⚠️ Il faut d'abord avoir des Features et des Halls en base.");
        }

        // Générer une combinaison unique entre feature et hall
        do {
            $featureId = $featureIds[array_rand($featureIds)];
            $hallId = $hallIds[array_rand($hallIds)];
            $key = "$featureId-$hallId"; // Créer une clé unique pour chaque combinaison
        } while (isset($combinations[$key]) || FeatureHall::where('feature_id', $featureId)
            ->where('hall_id', $hallId)
            ->exists()); // Vérifier si la combinaison existe déjà en base

        $combinations[$key] = true; // Marquer la combinaison comme utilisée

        return [
            'feature_id' => $featureId,
            'hall_id' => $hallId,
        ];

    }
}
