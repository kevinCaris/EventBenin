<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventType>
 */
class EventTypeFactory extends Factory
{
       /**
     * Liste des types d'événements disponibles
     */
    protected static array $eventTypes = [
        'Conférence',
        'Séminaire',
        'Formation',
        'Workshop',
        'Afterwork',
        'Lancement de produit',
        'Réunion d\'entreprise',
        'Mariage',
        'Anniversaire',
        'Baptême',
        'Réunion de famille',
        'Baby shower',
        'Concert',
        'Exposition d\'art',
        'Projection de film',
        'Spectacle de théâtre',
        'Soirée à thème',
        'Collecte de fonds',
        'Assemblée générale',
        'Cours de danse / sport',
        'Rencontre networking',
    ];

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->randomElement(self::$eventTypes),
        ];
    }
}
