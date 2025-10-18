<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    /**
     * Liste des équipements disponibles
     */
    protected static array $features = [
        'Climatisation',
        'Chauffage',
        'Accès PMR',
        'Parking privé',
        'Vestiaire',
        'Tables rectangulaires',
        'Tables rondes',
        'Chaises rembourrées',
        'Canapés / Lounge',
        'Scène ou estrade',
        'Système de sonorisation',
        'Microphones',
        'Vidéoprojecteur',
        'Écran de projection',
        'Télévision grand écran',
        'Wi-Fi haut débit',
        'Prises électriques et USB',
        'Éclairage ajustable',
        'Cuisine équipée',
        'Réfrigérateur',
        'Four / Micro-ondes',
        'Machine à café',
        'Vaisselle et couverts',
        'Extincteurs',
        'Sorties de secours',
        'Caméras de surveillance',
        'Gardiennage / Sécurité privée',
    ];

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->randomElement(self::$features),
            'description' => $this->faker->sentence(),
        ];
    }
}
