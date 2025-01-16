<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
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
        // Crée 10 utilisateurs clients
        User::factory()->count(10)->create(['role' => 'client']);

        // Créer un utilisateur 'owner' avec une compagnie associée
        $users = User::factory(10)->create([
            'role' => 'owner',
            'status_proprietor' => 'pending',
        ]);

        // Créer des compagnies et associer chaque utilisateur 'owner' à une compagnie
        $users->each(function ($user) {
            $company = Company::factory()->create();
            // Associer l'ID de la compagnie à l'utilisateur
            $user->company_id = $company->id;
            $user->save();
        });

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
