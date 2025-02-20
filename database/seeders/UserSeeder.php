<?php

namespace Database\Seeders;

use App\Enums\GenderEnum;
use App\Enums\RoleEnum;
use App\Enums\StatusProprietorEnum;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Crée 10 utilisateurs clients
        // User::factory()->count(10)->create(['role' => 'client']);
        // Création des 10 utilisateurs clients réalistes
       // Création des 10 utilisateurs clients réalistes avec `firstname`, `lastname` et `name`
$clients = [
    [
        'firstname' => 'Pierre',
        'lastname' => 'Ahouéfa',
        'email' => 'pierre.ahouefa@example.com',
        'phone' => '+229 62 55 10 10',
        'address' => 'Aïdjèdo, Cotonou, Bénin',
        'birthday' => '1988-07-20',
        'gender' => GenderEnum::MALE->value,
    ],
    [
        'firstname' => 'Marie',
        'lastname' => 'Aïda Akpovi',
        'email' => 'marie.akpovi@example.com',
        'phone' => '+229 62 50 00 00',
        'address' => 'Quartier Vèdoko, Cotonou, Bénin',
        'birthday' => '1995-08-14',
        'gender' => GenderEnum::FEMALE->value,
    ],
    [
        'firstname' => 'Jean-Claude',
        'lastname' => 'Hounkponou',
        'email' => 'jeanclaude.hounkponou@example.com',
        'phone' => '+229 65 45 20 15',
        'address' => 'Cadjèhoun, Cotonou, Bénin',
        'birthday' => '1992-12-01',
        'gender' => GenderEnum::MALE->value,
    ],
    [
        'firstname' => 'Amina',
        'lastname' => 'Gbédji',
        'email' => 'amina.gbedji@example.com',
        'phone' => '+229 62 35 90 25',
        'address' => 'Zogbo, Cotonou, Bénin',
        'birthday' => '1994-02-28',
        'gender' => GenderEnum::FEMALE->value,
    ],
    [
        'firstname' => 'Koffi',
        'lastname' => 'Dossou',
        'email' => 'koffi.dossou@example.com',
        'phone' => '+229 67 55 99 11',
        'address' => 'Agla, Cotonou, Bénin',
        'birthday' => '1985-05-15',
        'gender' => GenderEnum::MALE->value,
    ],
    [
        'firstname' => 'Lola',
        'lastname' => 'Béhanzin',
        'email' => 'lola.behanzin@example.com',
        'phone' => '+229 63 70 14 20',
        'address' => 'Kpota, Cotonou, Bénin',
        'birthday' => '1993-11-03',
        'gender' => GenderEnum::FEMALE->value,
    ],
    [
        'firstname' => 'Roch',
        'lastname' => 'Koudan',
        'email' => 'roch.koudan@example.com',
        'phone' => '+229 65 35 48 30',
        'address' => 'Djidja, Cotonou, Bénin',
        'birthday' => '1989-04-09',
        'gender' => GenderEnum::MALE->value,
    ],
    [
        'firstname' => 'Nadia',
        'lastname' => 'Yèkou',
        'email' => 'nadia.yekou@example.com',
        'phone' => '+229 61 52 67 89',
        'address' => 'Pahou, Cotonou, Bénin',
        'birthday' => '1990-10-10',
        'gender' => GenderEnum::FEMALE->value,
    ],
    [
        'firstname' => 'Michel',
        'lastname' => 'Adéyemi',
        'email' => 'michel.adeyemi@example.com',
        'phone' => '+229 68 23 94 14',
        'address' => 'Houssou, Cotonou, Bénin',
        'birthday' => '1996-06-30',
        'gender' => GenderEnum::MALE->value,
    ],
    [
        'firstname' => 'Solange',
        'lastname' => 'Assogba',
        'email' => 'solange.assogba@example.com',
        'phone' => '+229 62 80 45 60',
        'address' => 'Cotonou, Bénin',
        'birthday' => '1991-09-17',
        'gender' => GenderEnum::FEMALE->value,
    ],
];

$owners = [
    [
        'firstname' => 'Adjoua',
        'lastname' => 'Kouassi',
        'email' => 'adjoua.kouassi@example.com',
        'phone' => '+229 97 25 36 14',
        'address' => 'Cotonou, Bénin',
        'birthday' => '1985-07-12',
        'gender' => GenderEnum::FEMALE->value,
    ],
    [
        'firstname' => 'Salomon',
        'lastname' => 'Zinsou',
        'email' => 'salomon.zinsou@example.com',
        'phone' => '+229 96 45 78 12',
        'address' => 'Porto-Novo, Bénin',
        'birthday' => '1988-05-23',
        'gender' => GenderEnum::MALE->value,
    ],
    [
        'firstname' => 'Bertille',
        'lastname' => 'Hounkpè',
        'email' => 'bertille.hounkpe@example.com',
        'phone' => '+229 90 12 65 48',
        'address' => 'Abomey, Bénin',
        'birthday' => '1990-11-15',
        'gender' => GenderEnum::FEMALE->value,
    ],
    [
        'firstname' => 'Rodrigue',
        'lastname' => 'Dossou',
        'email' => 'rodrigue.dossou@example.com',
        'phone' => '+229 91 85 74 36',
        'address' => 'Parakou, Bénin',
        'birthday' => '1983-02-05',
        'gender' => GenderEnum::MALE->value,
    ],
    [
        'firstname' => 'Gisèle',
        'lastname' => 'Agbodjan',
        'email' => 'gisele.agbodjan@example.com',
        'phone' => '+229 98 34 52 78',
        'address' => 'Bohicon, Bénin',
        'birthday' => '1992-04-08',
        'gender' => GenderEnum::FEMALE->value,
    ],
    [
        'firstname' => 'Ibrahim',
        'lastname' => 'Tchobo',
        'email' => 'ibrahim.tchobo@example.com',
        'phone' => '+229 95 12 36 48',
        'address' => 'Natitingou, Bénin',
        'birthday' => '1987-09-30',
        'gender' => GenderEnum::MALE->value,
    ],
    [
        'firstname' => 'Mariam',
        'lastname' => 'Alassane',
        'email' => 'mariam.alassane@example.com',
        'phone' => '+229 94 75 63 22',
        'address' => 'Djougou, Bénin',
        'birthday' => '1989-06-14',
        'gender' => GenderEnum::FEMALE->value,
    ],
    [
        'firstname' => 'Christian',
        'lastname' => 'Gbaguidi',
        'email' => 'christian.gbaguidi@example.com',
        'phone' => '+229 99 23 51 47',
        'address' => 'Ouidah, Bénin',
        'birthday' => '1984-12-18',
        'gender' => GenderEnum::MALE->value,
    ],
    [
        'firstname' => 'Brigitte',
        'lastname' => 'Codjo',
        'email' => 'brigitte.codjo@example.com',
        'phone' => '+229 92 85 47 36',
        'address' => 'Lokossa, Bénin',
        'birthday' => '1993-03-21',
        'gender' => GenderEnum::FEMALE->value,
    ],
    [
        'firstname' => 'Félix',
        'lastname' => 'Ahouansou',
        'email' => 'felix.ahouansou@example.com',
        'phone' => '+229 91 36 75 48',
        'address' => 'Savalou, Bénin',
        'birthday' => '1986-08-09',
        'gender' => GenderEnum::MALE->value,
    ],
];

// Création des clients avec `firstname`, `lastname` et `name`
foreach ($clients as $clientData) {
    User::create([
        'firstname' => $clientData['firstname'],
        'lastname' => $clientData['lastname'],
        'name' => $clientData['firstname'] . ' ' . $clientData['lastname'], // Combinaison de firstname et lastname pour le champ name
        'email' => $clientData['email'],
        'email_verified_at' => now(),
        'phone' => $clientData['phone'],
        'address' => $clientData['address'],
        'gender' => $clientData['gender'],
        'birthday' => $clientData['birthday'],
        'role' => RoleEnum::CLIENT->value,
        'password' => Hash::make('password123'), // Mot de passe
        'company_id' => null, // Pas de compagnie associée pour ces clients
    ]);
}

foreach ($owners as $ownerData) {
    User::create([
        'firstname' => $ownerData['firstname'],
        'lastname' => $ownerData['lastname'],
        'name' => $ownerData['firstname'] . ' ' . $ownerData['lastname'], // Combinaison de firstname et lastname pour le champ name
        'email' => $ownerData['email'],
        'email_verified_at' => now(),
        'phone' => $ownerData['phone'],
        'address' => $ownerData['address'],
        'gender' => $ownerData['gender'],
        'birthday' => $ownerData['birthday'],
        'role' => RoleEnum::OWNER->value, // Rôle défini comme propriétaire
        'password' => Hash::make('password123'), // Mot de passe sécurité
        'status_proprietor' => StatusProprietorEnum::PENDING->value, // Statut en attente par défaut
        'company_id' => null, // Clé de compagnie générée aléatoirement
    ]);
}


        // Créer un utilisateur 'owner' avec une compagnie associée
        $users = User::factory(10)->create([
            'role' => RoleEnum::OWNER->value,
            'status_proprietor' => StatusProprietorEnum::PENDING->value,
        ]);

        // // Créer des compagnies et associer chaque utilisateur 'owner' à une compagnie
        // $users->each(function ($user) {
        //     $company = Company::factory()->create([
        //         'user_id' => $user->id, // Associe l'utilisateur à la compagnie
        //     ]);

        //     // Associer l'ID de la compagnie à l'utilisateur (si nécessaire)
        //     $user->company_id = $company->id;
        //     $user->save();
        // });


        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Vérifie si l'administrateur existe déjà par son email
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'role' => 'admin', // Rôle administrateur
                'password' => Hash::make('admin123'), // Mot de passe sécurisé
            ]
        );
    }
}
