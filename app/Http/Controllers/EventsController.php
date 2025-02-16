<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Models\Hall;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isOwner()) {
            // Récupérer les événements des salles qui appartiennent à la compagnie du propriétaire connecté
            $events = Events::whereHas('hall', function ($query) use ($user) {
                // Filtrer les événements pour ne récupérer que ceux dont la salle appartient à la compagnie du propriétaire
                $query->where('company_id', $user->company_id); // Assurez-vous que company_id dans Hall est correct
            })->paginate(15); // Pagination à 15 événements par page

            return view('events.AllReserve', compact('events'));
        } elseif ($user->isAdmin()) {
            // Récupérer tous les événements pour un administrateur
            $events = Events::paginate(15);
            return view('events.AllReserve', compact('events'));
        } elseif ($user->isClient()) {
            // Récupérer les événements réservés par le client (utilisateur)
            $events = Events::where('user_id', Auth::id())
                ->with('hall') // Charger la relation avec la salle
                ->orderBy('created_at', 'desc') // Trier les événements par date de création
                ->paginate(8); // Pagination à 8 événements par page

            return view('events.index', compact('events'));
        }
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventsRequest $request)
    {
        // Valider les données du formulaire
        $data = $request->validated();
        Log::info($data);

        try {
            // Récupérer la salle (Hall)
            $hall = Hall::findOrFail($data['hall_id']); // Si hall_id n'existe pas, il y a une exception

            // Calcul de la durée en heures
            $startDateTime = Carbon::parse("{$data['start_date']} {$data['start_time']}");
            $endDateTime = Carbon::parse("{$data['end_date']} {$data['end_time']}");

            // Vérifier que la date de fin est après la date de début
            if ($startDateTime->greaterThanOrEqualTo($endDateTime)) {
                return redirect()->back()->withErrors(['end_date' => 'La date de fin doit être après la date de début.']);
            }

            $durationInHours = $startDateTime->diffInHours($endDateTime);

            // Calcul du montant total en fonction du tarif horaire de la salle
            $amount = $durationInHours * $hall->price;

            // Créer l'événement
            $event = Events::create([
                'event_type' => $data['event_type'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'start_time' => $data['start_time'],
                'end_time' => $data['end_time'],
                'details' => $data['details'],
                'status' => false, // Par défaut, l'événement est en attente de confirmation
                'amount' => $amount, // Utiliser le calcul du montant au lieu du montant soumis
                'user_id' => Auth::id(), // L'utilisateur connecté
                'hall_id' => $data['hall_id'],
            ]);

            // Rediriger vers la page de l'index des événements avec un message de succès
            return redirect()->route('events.index')->with('success', 'Réservation créé avec succès !');
        } catch (\Exception $e) {
            // En cas d'erreur, rediriger en arrière avec un message d'erreur généra
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la création de la réservation.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $events)
    {
        // Vérifier que l'utilisateur est le créateur de l'événement
        if ($events->user_id !== Auth::id()) {
            return redirect()->route('events.index')->with('error', 'Vous ne pouvez pas voir cette réservation.');
        }

        return view('events.show', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Events $event)
    {

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventsRequest $request, Events $event)
    {

        try {

            // Valider les données du formulaire
            $data = $request->validated();
           Log::info("data",$data);

            // Récupérer l'événement existant
            $event = Events::findOrFail($event->id);

            // Mettre à jour uniquement les champs fournis sans écraser les autres
            if (isset($data['event_type'])) {
                $event->event_type = $data['event_type'];
            }

            if (isset($data['start_date']) && isset($data['start_time'])) {
                $event->start_date = $data['start_date'];
                $event->start_time = $data['start_time'];
            }

            if (isset($data['end_date']) && isset($data['end_time'])) {
                // Vérifier que la date de fin est après la date de début
                $startDateTime = Carbon::parse("{$event->start_date} {$event->start_time}");
                $endDateTime = Carbon::parse("{$data['end_date']} {$data['end_time']}");

                if ($startDateTime->greaterThanOrEqualTo($endDateTime)) {
                    return redirect()->back()->withErrors(['end_date' => 'La date de fin doit être après la date de début.']);
                }

                $event->end_date = $data['end_date'];
                $event->end_time = $data['end_time'];
            }

            if (isset($data['details'])) {
                $event->details = $data['details'];
            }

            if (isset($data['hall_id'])) {
                $hall = Hall::findOrFail($data['hall_id']); // Vérifier que la salle existe
                $event->hall_id = $data['hall_id'];

                // Recalcul du montant en fonction de la nouvelle salle et durée
                $startDateTime = Carbon::parse("{$event->start_date} {$event->start_time}");
                $endDateTime = Carbon::parse("{$event->end_date} {$event->end_time}");
                $durationInHours = $startDateTime->diffInHours($endDateTime);
                $event->amount = $durationInHours * $hall->price;
            }
            if (isset($data['amount'])) {
                $event->amount = $data['amount'];
            }

            if (isset($data['status'])) {
                $event->status = $data['status'];
            }

            $event->save();

            return redirect()->route('events.index')->with('success', 'Événement mis à jour avec succès !');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour de l\'événement.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $events)
    {
        // Vérifier que l'utilisateur est le créateur de l'événement
        if ($events->user_id !== Auth::id()) {
            return redirect()->route('events.index')->with('error', 'Vous ne pouvez pas supprimer cet événement.');
        }

        // Supprimer l'événement
        $events->delete();
        return redirect()->route('events.index')->with('success', 'Événement supprimé avec succès !');
    }
}
