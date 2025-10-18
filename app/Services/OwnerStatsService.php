<?php

namespace App\Services;

use App\Models\Events;
use App\Models\Reservation;
use App\Models\Hall;
use Illuminate\Support\Facades\Auth;

class OwnerStatsService
{
    public static function getStats()
    {
        $owner = Auth::user(); // Récupérer l'utilisateur connecté

        if (!$owner) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        // Récupérer toutes les salles du propriétaire
        $halls = Hall::where('company_id', $owner->company_id)->get();

        // Compter les salles
        $totalHalls = $halls->count();

        // Compter les réservations totales
        $totalReservations =Events::whereHas('hall', function ($query) use ($owner) {
            // Filtrer les événements pour ne récupérer que ceux dont la salle appartient à la compagnie du propriétaire
            $query->where('company_id', $owner->company_id); // Assurez-vous que company_id dans Hall est correct
        })->where('status', 1)->count();

        // Compter les réservations non confirmées
        $notConfirmedReservations =Events::whereHas('hall', function ($query) use ($owner) {
            // Filtrer les événements pour ne récupérer que ceux dont la salle appartient à la compagnie du propriétaire
            $query->where('company_id', $owner->company_id); // Assurez-vous que company_id dans Hall est correct
        })->where('status', 0)->count();


        // Calculer les revenus totaux (réservations confirmées)
        $totalRevenue = Events::whereHas('hall', function ($query) use ($owner) {
            $query->where('company_id', $owner->company_id);
        })->where('status', 1)->sum('amount');

        // Compter les salles disponibles (aucune réservation en cours)
        $availableHalls = Hall::where('company_id', $owner->company_id)
            ->whereDoesntHave('reservations', function ($query) {
                $query->where('status', '!=', 2); // Exclure les annulées
            })
            ->count();

        return [
            'totalHalls' => $totalHalls,
            'totalReservations' => $totalReservations,
            'notConfirmedReservations' => $notConfirmedReservations,
            'totalRevenue' => $totalRevenue,
            'availableHalls' => $availableHalls,
        ];
    }
}
