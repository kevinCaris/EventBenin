<?php

namespace App\Http\Controllers;

use App\Enums\StatusHallEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Hall;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Models\EventType;
use App\Models\Feature;
use App\Models\HallPictures;
use Illuminate\Http\Request;
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
        // Récupérer la salle avec ses relations
        $hall = Hall::with(['pictures', 'features', 'availabilities', 'company', 'events', 'reviews'])->findOrFail($id);
        $pictures = $hall->pictures;

        $reviews = $hall->reviews()->latest()->paginate(5); // 10 avis par page
        $hall = Hall::with(['reservations' => function ($query) {
            $query->where('status', 1);  // Filtrer par statut 1 (réservé)
        }])->findOrFail($id);

        // Récupérer les réservations filtrées
        $events = $hall->reservations;  // Ce sera une collection d'événements avec le statut 1

        // Retourner la vue avec les informations de la salle
        return view('pages.details', compact('hall', 'pictures', 'events', 'reviews'));
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
            $hallsQuery->where('capacity', '>=', $request->capacity);
        }

        // Filtrer par prix si le prix minimum est spécifié
        if ($request->has('price') && $request->price != '') {
            $hallsQuery->where('price', '>=', $request->price);
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

        $halls = $hallsQuery->with('reviews')->paginate(9);

        // Appliquer la pagination
        $halls = $hallsQuery->with('pictures')->paginate(9);

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
            $halls = Hall::where('company_id', $company)->paginate(9);
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
        DB::beginTransaction(); // Démarre une transaction

        try {
            // Valider les données de la requête
            $data = $request->validated();

            // Assigner le company_id de l'utilisateur authentifié
            $data['company_id'] = auth()->user()->company_id;

            // Gestion de l'image principale
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('halls', 'public');
                $data['image'] = asset("storage/{$imagePath}");
            }

            // Créer la salle
            $hall = Hall::create($data);

            // Gérer l'upload des images supplémentaires (plusieurs fichiers)
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('hall_pictures', 'public');

                    $hall->pictures()->create([
                        'path' => "storage/{$path}",
                    ]);
                }
            }

            // Associer les équipements (features)
            if ($request->has('features')) {
                $hall->features()->sync($request->input('features', []));
            }

            // Associer les types d’événements
            if ($request->has('event_types')) {
                $hall->events()->sync($request->input('event_types', []));
            }

            DB::commit(); // Valide la transaction

            return redirect()->route('halls.index')->with('success', 'Salle créée avec succès.');
        } catch (\Exception $e) {
            DB::rollBack(); // Annule la transaction en cas d'erreur
            Log::error("Erreur lors de la création de la salle: " . $e->getMessage());

            return redirect()->route('halls.index')->with('error', 'Une erreur est survenue lors de la création de la salle.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        $hall->load(['pictures', 'features', 'availabilities', 'company', 'events', 'eventTypePrices']);
        $pictures = $hall->pictures;
        return view('halls.show', compact('hall', 'pictures'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall)
    {
        $features = Feature::all();
        $eventTypes = EventType::all();
        $hall = Hall::findOrFail($hall->id);
        return view('halls.edit', compact('hall', 'features', 'eventTypes'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(UpdateHallRequest $request, Hall $hall)
    {
        DB::beginTransaction(); // Démarre une transaction

        try {
            $data = $request->validated();

            // Gestion de l'image principale
            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image si elle existe
                if ($hall->image) {
                    $oldImagePath = str_replace(asset('storage/'), '', $hall->image);
                    if (Storage::disk('public')->exists($oldImagePath)) {
                        Storage::disk('public')->delete($oldImagePath);
                    }
                }

                // Stocker la nouvelle image et récupérer son chemin
                $imagePath = $request->file('image')->store('halls', 'public');
                $data['image'] = asset("storage/{$imagePath}");
            }

            $hall->update($data);

            // Gestion des images supplémentaires
            if ($request->hasFile('images')) {
                // Supprimer les anciennes images
                $hall->pictures()->each(function ($picture) {
                    $path = str_replace('storage/', 'public/', $picture->path);
                    if (Storage::exists($path)) {
                        Storage::delete($path);
                    }
                    $picture->delete();
                });

                // Ajouter les nouvelles images
                foreach ($request->file('images') as $image) {
                    $path = $image->store('hall_pictures', 'public');

                    $hall->pictures()->create([
                        'path' => "storage/{$path}",
                    ]);
                }
            }

            // Assigner les nouvelles fonctionnalités à la salle
            if ($request->has('features')) {
                $hall->features()->sync($request->input('features', []));
            }

            // Assigner les types d'événements à la salle
            if ($request->has('event_types')) {
                $hall->events()->sync($request->input('event_types', []));
            }

            DB::commit(); // Valide la transaction

            return redirect()->route('halls.index')->with('success', 'Salle mise à jour avec succès.');
        } catch (\Exception $e) {
            DB::rollBack(); // Annule la transaction en cas d'erreur
            Log::error('Erreur lors de la mise à jour de la salle : ' . $e->getMessage());

            return redirect()->route('halls.index')->with('error', 'Une erreur est survenue lors de la mise à jour de la salle.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        if ($hall->image) {
            Storage::delete($hall->image);
        }
        $hall->delete();
        return redirect()->route('halls.index')->with('success', 'salle suprimée avec success.');
    }
}
