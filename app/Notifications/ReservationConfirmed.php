<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class ReservationConfirmed extends Notification
{
    public $event;

    // Constructeur de la notification
    public function __construct($event)
    {
        $this->event = $event;
    }

    // Spécifier les canaux via lesquels envoyer la notification
    public function via($notifiable)
    {
        // Nous utilisons uniquement le canal "database" pour cette notification
        return ['database'];
    }

    // Envoi de la notification via la base de données
    public function toDatabase($notifiable)
    {
        // Récupérer le message en fonction du statut
        $statusMessage = $this->getStatusMessage($this->event->status);

        return [
            'message' => $statusMessage,
            'event_id' => $this->event->id,
            'hall_name' => $this->event->hall->name,
            'status' => $this->event->status,  // Ajouter le statut de la réservation
        ];
    }

    // Déterminer le message en fonction du statut
    private function getStatusMessage($status)
    {
        switch ($status) {
            case 1: // Réservation confirmée
                return 'Votre réservation pour la salle ' . $this->event->hall->name . ' a été confirmée.';
            case 2: // Réservation annulée
                return 'Votre réservation pour la salle ' . $this->event->hall->name . ' a été annulée.';
            default: // Statut non défini
                return 'Le statut de votre réservation pour la salle ' . $this->event->hall->name . ' a changé.';
        }
    }
}
