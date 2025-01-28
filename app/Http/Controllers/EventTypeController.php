<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventTypeRequest;
use App\Http\Requests\UpdateEventTypeRequest;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventTypes = EventType::paginate(10);
        return view('eventTypes.index', compact('eventTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eventTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventTypeRequest $request)
    {
        try {
        $eventType = EventType::create($request->validated());
        return redirect()->route('eventTypes.index')->with('success', 'Type d\'evenement ajoutée avec success.');
        } catch (\Exception $e) {
            return redirect()->route('eventTypes.index')->with('error', 'une erreur est survenue lors de la création du type d\'evenement.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(EventType $eventType)
    {
        return view('eventTypes.show', compact('eventType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventType $eventType)
    {
        return view('eventTypes.edit', compact('eventType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventTypeRequest $request, EventType $eventType)
    {
        try {
        $eventType->update($request->validated());
        return redirect()->route('eventTypes.index')->with('success', 'Type d\'evenement mise à jour avec success.');
        } catch (\Exception $e) {
            return redirect()->route('eventTypes.index')->with('error', 'une erreur est survenue lors de la mise à jour du type d\'evenement.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventType $eventType)
    {
        $eventType->delete();
        return redirect()->route('eventTypes.index')->with('success', 'Type d\'evenement suprimée avec success.');
    }
}
