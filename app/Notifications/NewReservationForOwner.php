<?php

// app/Notifications/NewReservationForOwner.php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewReservationForOwner extends Notification
{
    public $event;

    public function __construct($event)
    {
        $this->event = $event;
    }

    public function via($notifiable)
    {
        // Nous utilisons uniquement le canal "database" pour cette notification
        return ['database'];
    }
    // Envoie la notification via la base de données
    public function toDatabase($notifiable)
    {
        return new DatabaseMessage([
            'message' => 'Vous avez une nouvelle réservation pour la salle ' . $this->event->hall->title . '.',
            'event_id' => $this->event->id,
            'hall_name' => $this->event->hall->name,
        ]);
    }
}
