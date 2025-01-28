<?php

namespace App\Http\Controllers;

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
            $data = $request->validated();
            $user->update($data);
            return redirect()->route('users.index', $user)->with('success', 'utilisateur modifié avec success ');
        } catch (\Exception $e) {
            return back()->with('error', 'une erreur est survenue, veuillez ressayez.');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec success.');
    }
}
