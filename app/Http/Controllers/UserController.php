<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        try {
            // Validation des données
            $data = $request->validated();

            // Ajouter un mot de passe par défaut ou généré
            $data['password'] = bcrypt('password'); // Définit un mot de passe temporaire

            // Création de l'utilisateur
            $user = User::create($data);

            if ($user) {
                // Redirection avec succès
                return redirect()
                    ->route('users.index')
                    ->with('success', 'Utilisateur créé avec succès.');
            } else {
                return back()
                    ->withInput()
                    ->with('error', 'Une erreur est survenue, veuillez réessayer.');
            }
        } catch (\Exception $e) {
            // Retour en arrière avec un message d'erreur
            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue, veuillez réessayer.');
        }
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            // Récupérer les données validées
            $data = $request->validated();

            // Vérifier si le rôle a été modifié et si c'est le cas, le mettre à jour
            if ($request->has('role') && in_array($request->role, array_column(RoleEnum::cases(), 'value'))) {
                $user->role = $request->role;
            }

            // Si un mot de passe a été fourni, le crypter avant de le sauvegarder
            if ($request->has('password') && $request->password) {
                $data['password'] = bcrypt($data['password']);
            }
            if($request->hasFile('avatar')) {
                $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
            }

            // Mettre à jour l'utilisateur
            $user->update($data);

            // Vérifier si l'utilisateur est un admin pour rediriger en conséquence
            if ($user->isAdmin()) {
                return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succès');
            }

            // Redirection vers la page de profil de l'utilisateur
            return redirect()->route('users.show', $user)->with('success', 'Utilisateur modifié avec succès');
        } catch (\Exception $e) {
            // Log de l'exception pour un débogage plus facile
            Log::error('Erreur lors de la mise à jour de l\'utilisateur: ' . $e->getMessage());

            // Retour à la page précédente avec un message d'erreur
            return back()->with('error', 'Une erreur est survenue, veuillez réessayer.');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec success.');
    }
}
