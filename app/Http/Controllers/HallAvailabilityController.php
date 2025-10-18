<?php

namespace App\Http\Controllers;

use App\Models\HallAvailability;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHallAvailabilityRequest;
use App\Http\Requests\UpdateHallAvailabilityRequest;
use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HallAvailabilityController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(HallAvailability::class, 'availability');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Récupérer toutes les salles pour afficher dans le menu déroulant
        $halls = Hall::where('company_id', auth()->user()->company_id)->get();
        // Vérifier si l'utilisateur a sélectionné une salle
        $hall = Hall::find($request->hall_id);
        // Récupérer les disponibilités de la salle sélectionnée (si une salle est choisie)
        $availabilities = $hall ? $hall->availabilities()->orderBy('start_date')->get() : collect();

        return view('availabilities.index', compact('availabilities', 'hall', 'halls'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHallAvailabilityRequest $request, Hall $hall)
    {
        try {
            Log::info("information".$request->validated());
            $hall->availabilities()->create($request->validated());
            return redirect(route('availabilities.index'))->with('success', 'Disponibilité ajoutée avec succès.');
        } catch (\Exception $e) {
            Log::error('Error storing availability: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout de la disponibilité.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(HallAvailability $hallAvailability) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HallAvailability $hallAvailability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHallAvailabilityRequest $request, HallAvailability $hallAvailability)
    {
        $hallAvailability->update($request->validated());
        return redirect(route('availabilities.index'))->back()->with('success', 'Disponibilité mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HallAvailability $hallAvailability)
    {

        // Vérifier si l'élément existe
    if (!$hallAvailability) {
        return redirect(route('availabilities.index'))->with('error', 'Disponibilité non trouvée.');
    }

    // Supprimer la disponibilité
    try {
        $hallAvailability->delete();
        return redirect(route('availabilities.index'))->with('success', 'Disponibilité supprimée.');
    } catch (\Exception $e) {
        // Si une erreur survient lors de la suppression
        return redirect(route('availabilities.index'))->with('error', 'Erreur lors de la suppression de la disponibilité.');
    }
    }
}
