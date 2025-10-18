<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Bénin Event Services',
                'address' => 'Rue 210, Cotonou, Bénin',
                'phone' => '+229 97 45 63 21',
                'email' => 'contact@benineventservices.com',
                'description' => 'Spécialisée dans l\'organisation d\'événements et la location de salles.',
                'ville' => 'Cotonou',
                'pays' => 'Bénin',
                'postal_code' => '22901',
                'facebook_url' => 'https://facebook.com/benineventservices',
                'twitter_url' => 'https://twitter.com/beninevent',
                'linkedin_url' => 'https://linkedin.com/company/benineventservices',
                'youtube_url' => 'https://youtube.com/benineventservices',
                'tiktok_url' => 'https://tiktok.com/@benineventservices',
                'instagram_url' => 'https://instagram.com/benineventservices',
                'website_url' => 'https://benineventservices.com',
                'cover' => null,
                'user_id' => 1
            ],
            [
                'name' => 'Espace Élite Bénin',
                'address' => 'Avenue Steinmetz, Porto-Novo, Bénin',
                'phone' => '+229 96 32 58 47',
                'email' => 'info@espaceelitebj.com',
                'description' => 'Location de salles haut de gamme pour conférences et réceptions.',
                'ville' => 'Porto-Novo',
                'pays' => 'Bénin',
                'postal_code' => '22902',
                'facebook_url' => 'https://facebook.com/espaceelitebj',
                'twitter_url' => 'https://twitter.com/espaceelitebj',
                'linkedin_url' => 'https://linkedin.com/company/espaceelitebj',
                'youtube_url' => 'https://youtube.com/espaceelitebj',
                'tiktok_url' => 'https://tiktok.com/@espaceelitebj',
                'instagram_url' => 'https://instagram.com/espaceelitebj',
                'website_url' => 'https://espaceelitebj.com',
                'cover' => null,
                'user_id' => 2
            ],
            [
                'name' => 'Festivity Palace',
                'address' => 'Boulevard des Armées, Parakou, Bénin',
                'phone' => '+229 95 42 67 89',
                'email' => 'contact@festivitypalace.com',
                'description' => 'Cadre prestigieux pour mariages et événements d\'entreprise.',
                'ville' => 'Parakou',
                'pays' => 'Bénin',
                'postal_code' => '22903',
                'facebook_url' => 'https://facebook.com/festivitypalace',
                'twitter_url' => 'https://twitter.com/festivitypalace',
                'linkedin_url' => 'https://linkedin.com/company/festivitypalace',
                'youtube_url' => 'https://youtube.com/festivitypalace',
                'tiktok_url' => 'https://tiktok.com/@festivitypalace',
                'instagram_url' => 'https://instagram.com/festivitypalace',
                'website_url' => 'https://festivitypalace.com',
                'cover' => null,
                'user_id' => 3
            ],
            [
                'name' => 'Horizon Réceptions',
                'address' => 'Quartier Tokpota, Bohicon, Bénin',
                'phone' => '+229 90 78 12 34',
                'email' => 'horizon@receptionsbj.com',
                'description' => 'Organisation complète d\'événements et locations de salles décorées.',
                'ville' => 'Bohicon',
                'pays' => 'Bénin',
                'postal_code' => '22904',
                'facebook_url' => 'https://facebook.com/horizonreceptions',
                'twitter_url' => 'https://twitter.com/horizonreceptions',
                'linkedin_url' => 'https://linkedin.com/company/horizonreceptions',
                'youtube_url' => 'https://youtube.com/horizonreceptions',
                'tiktok_url' => 'https://tiktok.com/@horizonreceptions',
                'instagram_url' => 'https://instagram.com/horizonreceptions',
                'website_url' => 'https://horizonreceptions.com',
                'cover' => null,
                'user_id' => 4
            ],
            [
                'name' => 'Royal Event Center',
                'address' => 'Quartier Dantokpa, Cotonou, Bénin',
                'phone' => '+229 92 45 78 90',
                'email' => 'info@royaleventbj.com',
                'description' => 'Grand centre événementiel avec salles adaptées pour tous types de cérémonies.',
                'ville' => 'Cotonou',
                'pays' => 'Bénin',
                'postal_code' => '22905',
                'facebook_url' => 'https://facebook.com/royaleventbj',
                'twitter_url' => 'https://twitter.com/royaleventbj',
                'linkedin_url' => 'https://linkedin.com/company/royaleventbj',
                'youtube_url' => 'https://youtube.com/royaleventbj',
                'tiktok_url' => 'https://tiktok.com/@royaleventbj',
                'instagram_url' => 'https://instagram.com/royaleventbj',
                'website_url' => 'https://royaleventbj.com',
                'cover' => null,
                'user_id' => 5
            ],
            [
                'name' => 'Oasis Réceptions',
                'address' => 'Quartier Zongo, Abomey, Bénin',
                'phone' => '+229 94 32 58 76',
                'email' => 'contact@oasisreceptions.com',
                'description' => 'Lieu élégant pour célébrer mariages et événements professionnels.',
                'ville' => 'Abomey',
                'pays' => 'Bénin',
                'postal_code' => '22906',
                'facebook_url' => 'https://facebook.com/oasisreceptions',
                'twitter_url' => 'https://twitter.com/oasisreceptions',
                'linkedin_url' => 'https://linkedin.com/company/oasisreceptions',
                'youtube_url' => 'https://youtube.com/oasisreceptions',
                'tiktok_url' => 'https://tiktok.com/@oasisreceptions',
                'instagram_url' => 'https://instagram.com/oasisreceptions',
                'website_url' => 'https://oasisreceptions.com',
                'cover' => null,
                'user_id' => 6
            ],
            [
                'name' => 'Majestic Hall Bénin',
                'address' => 'Boulevard du Port, Cotonou, Bénin',
                'phone' => '+229 98 45 67 32',
                'email' => 'majestic@hallbenin.com',
                'description' => 'Salle de prestige pour cocktails, conférences et séminaires.',
                'ville' => 'Cotonou',
                'pays' => 'Bénin',
                'postal_code' => '22907',
                'facebook_url' => 'https://facebook.com/majestichallbenin',
                'twitter_url' => 'https://twitter.com/majestichallbenin',
                'linkedin_url' => 'https://linkedin.com/company/majestichallbenin',
                'youtube_url' => 'https://youtube.com/majestichallbenin',
                'tiktok_url' => 'https://tiktok.com/@majestichallbenin',
                'instagram_url' => 'https://instagram.com/majestichallbenin',
                'website_url' => 'https://majestichallbenin.com',
                'cover' => null,
                'user_id' => 7
            ],
            [
                'name' => 'Harmonie Events',
                'address' => 'Avenue de la Marina, Ouidah, Bénin',
                'phone' => '+229 97 65 43 21',
                'email' => 'info@harmonieevents.com',
                'description' => 'Organisation clé en main pour tous types d’événements.',
                'ville' => 'Ouidah',
                'pays' => 'Bénin',
                'postal_code' => '22908',
                'facebook_url' => 'https://facebook.com/harmonieevents',
                'twitter_url' => 'https://twitter.com/harmonieevents',
                'linkedin_url' => 'https://linkedin.com/company/harmonieevents',
                'youtube_url' => 'https://youtube.com/harmonieevents',
                'tiktok_url' => 'https://tiktok.com/@harmonieevents',
                'instagram_url' => 'https://instagram.com/harmonieevents',
                'website_url' => 'https://harmonieevents.com',
                'cover' => null,
                'user_id' => 8
            ],
            [
                'name' => 'Détente & Prestige',
                'address' => 'Route de Pahou, Bénin',
                'phone' => '+229 93 78 56 12',
                'email' => 'contact@detenteprestige.com',
                'description' => 'Un cadre somptueux pour vos réceptions et événements privés.',
                'ville' => 'Pahou',
                'pays' => 'Bénin',
                'postal_code' => '22909',
                'facebook_url' => 'https://facebook.com/detenteprestige',
                'twitter_url' => 'https://twitter.com/detenteprestige',
                'linkedin_url' => 'https://linkedin.com/company/detenteprestige',
                'youtube_url' => 'https://youtube.com/detenteprestige',
                'tiktok_url' => 'https://tiktok.com/@detenteprestige',
                'instagram_url' => 'https://instagram.com/detenteprestige',
                'website_url' => 'https://detenteprestige.com',
                'cover' => null,
                'user_id' => 9
            ],
            [
                'name' => 'Golden Palace Bénin',
                'address' => 'Place Goho, Abomey, Bénin',
                'phone' => '+229 95 47 89 65',
                'email' => 'contact@goldenpalacebj.com',
                'description' => 'Salle de prestige pour réceptions haut de gamme.',
                'ville' => 'Abomey',
                'pays' => 'Bénin',
                'postal_code' => '22910',
                'facebook_url' => 'https://facebook.com/goldenpalacebj',
                'twitter_url' => 'https://twitter.com/goldenpalacebj',
                'linkedin_url' => 'https://linkedin.com/company/goldenpalacebj',
                'youtube_url' => 'https://youtube.com/goldenpalacebj',
                'tiktok_url' => 'https://tiktok.com/@goldenpalacebj',
                'instagram_url' => 'https://instagram.com/goldenpalacebj',
                'website_url' => 'https://goldenpalacebj.com',
                'cover' => null,
                'user_id' => 10
            ]
        ];

        foreach ($companies as $companyData) {
            Company::create($companyData);
        }
    }
}
