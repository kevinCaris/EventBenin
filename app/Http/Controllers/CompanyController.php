<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
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
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        try {
            $data = $request->validated();
            // Gestion de l'avatar
            if ($request->hasFile('avatar')) {
                $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
            }

            // Gestion de la couverture
            if ($request->hasFile('cover')) {
                $data['cover'] = $request->file('cover')->store('covers', 'public');
            }

            $company = Company::create($data);
            if(auth()->user()->hasRole('owner')) {
                return redirect()->route('companies.show', $company)->with('success', 'Company created successfully.');
            }
            return redirect()->route('companies.index')->with('success', 'Company created successfully.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la compagnie', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);

            return back()->with('error', 'An error occurred while creating the company. Please try again.');
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

            return back()->with('error', 'An error occurred while updating the company. Please try again.');
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
