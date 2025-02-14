<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Models\EventType;
use App\Models\Feature;
use App\Models\HallPictures;
use Illuminate\Http\Request;
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

    public function home()
    {
        $halls = Hall::take(8)->get(); // ou Hall::paginate(6);

        return view('pages.home', compact('halls'));
    }
    public function showGuest($id)
    {
        Log::info($id);
        // Récupérer la salle avec ses relations
        $hall = Hall::with(['pictures', 'features', 'availabilities', 'company', 'events'])->findOrFail($id);

        // Retourner la vue avec les informations de la salle
        return view('pages.details', compact('hall'));
    }

    public function showForGuests(Request $request)
    {
        // Créer la requête de base pour récupérer les salles
        $hallsQuery = Hall::query();

        // Appliquer les filtres s'ils sont présents dans la requête

        // Filtrer par ville si la ville est spécifiée
        if ($request->has('city') && $request->city != '') {
            $hallsQuery->where('city', $request->city);
        }

        // Filtrer par capacité si la capacité est spécifiée
        if ($request->has('capacity') && $request->capacity != '') {
            $hallsQuery->where('capacity_max', '>=', $request->capacity);
        }

        // Filtrer par prix si le prix minimum est spécifié
        if ($request->has('price') && $request->price != '') {
            $hallsQuery->where('price_min', '>=', $request->price);
        }

        $search = trim($request->search);
        if (!empty($search)) {
            $hallsQuery->where(function ($query) use ($search) {
                $query->whereRaw("COALESCE(title, '') LIKE ?", ["%{$search}%"])
                      ->orWhereRaw("COALESCE(description, '') LIKE ?", ["%{$search}%"])
                      ->orWhereRaw("COALESCE(address, '') LIKE ?", ["%{$search}%"])
                      ->orWhereRaw("COALESCE(city, '') LIKE ?", ["%{$search}%"])
                      ->orWhereRaw("COALESCE(country, '') LIKE ?", ["%{$search}%"]);
            });
        }

        // Filtrer par statut si le statut est spécifié (disponible / indisponible)
        if ($request->has('status') && $request->status != '') {
            $hallsQuery->where('status', $request->status);
        }


        // Appliquer la pagination
        $halls = $hallsQuery->paginate(10);

        // Récupérer les villes distinctes pour le filtre de ville
        $cities = Hall::distinct()->pluck('city');

        // Retourner la vue avec les salles et les villes
        return view('pages.halls', compact('halls', 'cities'));
    }

    public function __construct()
    {
        $this->authorizeResource(Hall::class, 'hall');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $halls = Hall::paginate(10);
            return view('halls.index', compact('halls'));
        } else {
            $company = auth()->user()->company_id;
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
            $data = $request->validated();

            $data['company_id'] = auth()->user()->company_id;

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('halls', 'public');
            }
            if ($request->status == 1) {
                $data['status'] = StatusHallEnum::AVAILABLE;
            } else {
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
        $hall->load(['pictures', 'features', 'availabilities', 'company', 'events', 'eventTypePrices']);
        Log::info($hall);
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
            $data = $request->validated();

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($hall->image);
                $data['image'] = $request->file('image')->store('halls', 'public');
            }
            if ($request->status == 1) {
                $data['status'] = StatusHallEnum::AVAILABLE;
            } else {
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
