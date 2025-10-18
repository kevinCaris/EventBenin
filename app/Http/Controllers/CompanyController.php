<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * CompanyController constructor.
     *
     * This constructor initializes the controller and applies the authorization
     * policies for the Company resource, ensuring that all actions within
     * this controller are subject to the appropriate access control checks.
     */

    public function __construct()
    {
        $this->authorizeResource(Company::class, 'company');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        return view('companies.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreCompanyRequest $request)
    // {
    //     try {

    //         $data = $request->validated();
    //         // Gestion de l'avatar
    //         if ($request->hasFile('avatar')) {
    //             $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
    //         }

    //         // Gestion de la couverture
    //         if ($request->hasFile('cover')) {
    //             $data['cover'] = $request->file('cover')->store('covers', 'public');
    //         }
    //         if (auth()->user()->hasRole('owner')) {
    //         $userId = auth()->user()->id;

    //         // Vérifier si l'utilisateur a déjà une compagnie
    //         if (Company::where('user_id', $userId)->exists()) {
    //             return redirect()->route('owner.dashboard')->with('error', 'Vous avez déjà une compagnie enregistrée.');
    //         }

    //         $data['user_id'] = $userId;
    //         // Création de la compagnie
    //         $company = Company::create($data);

    //         // Associer la compagnie à l'utilisateur
    //         $user = auth()->user(); // Récupérer l'utilisateur authentifié
    //         $user->company_id = $company->id; // Associer l'ID de la compagnie à l'utilisateur
    //         $user->save(); // Sauvegarder l'utilisateur avec la compagnie associée

    //         // Redirection selon le rôle de l'utilisateur
    //         // if (auth()->user()->hasRole('owner')) {
    //             return redirect()->route('owner.dashboard', $company)->with('success', 'Company created successfully.');
    //         }
    //         $company = Company::create($data);
    //         Log::info("jnnnn");

    //         return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    //     } catch (\Exception $e) {
    //         Log::error('Erreur lors de la création de la compagnie', [
    //             'error' => $e->getMessage(),
    //             'data' => $request->all()
    //         ]);

    //         return back()->with('error', 'Une erreur est survenue lors de la création de la compagnie.');
    //     }
    // }
    public function store(StoreCompanyRequest $request)
{
    try {
        $data = $request->validated();

        // Gestion des fichiers (avatar & cover)
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        // Vérifier si l'utilisateur authentifié est un 'owner'
        if (auth()->user()->hasRole('owner')) {
            $userId = auth()->id();

            // Vérifier si l'utilisateur possède déjà une compagnie
            if (Company::where('user_id', $userId)->exists()) {
                return redirect()->route('owner.dashboard')->with('error', 'Vous avez déjà une compagnie enregistrée.');
            }

            $data['user_id'] = $userId;
        } else {
            // Si ce n'est pas un 'owner', l'admin doit avoir fourni un user_id
            if (!isset($data['user_id']) || !User::where('id', $data['user_id'])->exists()) {
                return back()->with('error', 'L\'utilisateur sélectionné est invalide.');
            }
        }

        // Création de la compagnie
        $company = Company::create($data);

        // Si c'est un owner, associer la compagnie à son profil
        if (auth()->user()->hasRole('owner')) {
            $user = auth()->user();
            $user->company_id = $company->id;
            $user->save();
            return redirect()->route('owner.dashboard', $company)->with('success', 'Company created successfully.');
        }

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    } catch (\Exception $e) {
        Log::error('Erreur lors de la création de la compagnie', [
            'error' => $e->getMessage(),
            'data' => $request->all()
        ]);

        return back()->with('error', 'Une erreur est survenue lors de la création de la compagnie.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $company = Company::findOrFail($company->id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $company = Company::findOrFail($company->id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        try {
            $data = $request->validated();
            // Gestion de l'avatar
            if ($request->hasFile('avatar')) {
                // Supprimer l'ancien fichier si existe
                if ($company->avatar) {
                    Storage::disk('public')->delete($company->avatar);
                }
                // Stocker le nouveau fichier
                $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
            }

            // Gestion de la couverture
            if ($request->hasFile('cover')) {
                // Supprimer l'ancien fichier si existe
                if ($company->cover) {
                    Storage::disk('public')->delete($company->cover);
                }
                // Stocker le nouveau fichier
                $data['cover'] = $request->file('cover')->store('covers', 'public');
            }

            // Mise à jour de la compagnie
            $company->update($data);

            // Redirection en fonction du rôle
            if (auth()->user()->hasRole('owner')) {
                return redirect()->route('companies.show', $company)->with('success', 'Company updated successfully.');
            }

            return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de la compagnie', [
                'company_id' => $company->id,
                'error' => $e->getMessage()
            ]);

            return back()->with('error', 'une erreur est survenue lors de la mise à jour de la compagnie');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company = Company::findOrFail($company->id);

        if ($company->cover) {
            Storage::delete($company->cover);
        }
        if ($company->avatar) {
            Storage::delete($company->avatar);
        }
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
