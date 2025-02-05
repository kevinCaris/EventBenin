<?php

namespace App\Http\Controllers;

use App\Models\HallAvailability;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHallAvailabilityRequest;
use App\Http\Requests\UpdateHallAvailabilityRequest;
use App\Models\Hall;

class HallAvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Hall $hall)
    {
        $availabilities = $hall->availabilities()->orderBy('start_date')->get();
        return view('availabilities.index', compact('availabilities'));
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
        $hall->availabilities()->create($request->validated());
        return redirect()->back()->with('success', 'Disponibilité ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HallAvailability $hallAvailability)
    {

    }

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
        return redirect()->back()->with('success', 'Disponibilité mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HallAvailability $hallAvailability)
    {
        $hallAvailability->delete();
        return redirect()->back()->with('success', 'Disponibilité supprimée.');
    }
}
