<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Models\EventType;
use App\Models\Feature;
use App\Models\HallPictures;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class HallController extends Controller
{

    /**
     * Authorize the resource
     *
     * @return void
     */
    public function __construct(){
        $this->authorizeResource(Hall::class, 'hall');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->isAdmin()){
            $halls = Hall::paginate(10);
            return view('halls.index', compact('halls'));
        }else{
            $company= auth()->user()->company_id;
            $halls = Hall::where('company_id', $company)->paginate(10);
            return view('halls.index', compact('halls'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $features = Feature::all();
        $eventTypes = EventType::all();
        return view('halls.create', compact('features', 'eventTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHallRequest $request)
    {
        try {
        $data=$request->validated();

        $data['company_id'] = auth()->user()->company_id;

        if($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('halls', 'public');
        }
        if($request->status == 1) {
            $data['status'] = StatusHallEnum::AVAILABLE;
        }else{
            $data['status'] = StatusHallEnum::UNAVAILABLE;
        }
        Hall::create($data);

        return redirect()->route('halls.index')->with('success', 'salle crée avec success.');
        } catch (\Exception $e) {

            return redirect()->route('halls.index')->with('error', 'Une erreur est survenue lors de la création de la salle.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        $hall = Hall::with('pictures')->findOrFail($hall->id);
        return view('halls.show', compact('hall'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall)
    {
        $hall = Hall::findOrFail($hall->id);
        return view('halls.edit', compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHallRequest $request, Hall $hall)
    {
        try {
        $data=$request->validated();

        if($request->hasFile('image')) {
            Storage::disk('public')->delete($hall->image);
            $data['image'] = $request->file('image')->store('halls', 'public');
        }
        if($request->status == 1) {
            $data['status'] = StatusHallEnum::AVAILABLE;
        }else{
            $data['status'] = StatusHallEnum::UNAVAILABLE;
        }

        $hall->update($data);
        return redirect()->route('halls.index')->with('success', 'salle mise à jour avec success.');
        } catch (\Exception $e) {
            return redirect()->route('halls.index')->with('error', 'Une erreur est survenue lors de la mise à jour de la salle.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        Storage::disk('public')->delete($hall->image);
        $hall->delete();
        return redirect()->route('halls.index')->with('success', 'salle suprimée avec success.');
    }
}
