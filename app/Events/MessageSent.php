<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $user_id;
    public $chat_id;

    public function __construct($message)
    {
        $this->message = $message->message;
        $this->user_id = $message->user_id;
        $this->chat_id = $message->chat_id;
    }

    public function broadcastOn()
    {
        return new Channel('chat.' . $this->chat_id);
    }
}
