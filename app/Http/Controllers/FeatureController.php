<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;

class FeatureController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Feature::class, 'feature');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::paginate(10);
        return view('features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeatureRequest $request)
    {
        try {
            Feature::create($request->validated());
            return redirect()->route('features.index')->with('success', 'Feature créée avec success.');
        } catch (\Exception $e) {
            return back()->with('error', 'une erreur est survenue, veuillez ressayez.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        return view('features.show', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        try {
            $feature->update($request->validated());
            return redirect()->route('features.index')->with('success', 'Feature modifiée avec success.');
        } catch (\Exception $e) {
            return back()->with('error', 'une erreur est survenue, veuillez ressayez.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('features.index')->with('success', 'Feature suprimée avec success.');
    }
}
