<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChatsRequest;
use App\Http\Requests\UpdateChatsRequest;
use App\Models\Chats;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Récupérer les chats où l'utilisateur est impliqué
        $chats = Chats::where('client_id', $user->id)
                      ->orWhere('owner_id', $user->id)
                      ->get();
        // Récupérer les chats où l'utilisateur est soit le client, soit le propriétaire
                // $chats = Chats::where('client_id', Auth::id())->orWhere('owner_id', Auth::id())->get();
            // Vérifier si l'utilisateur est un propriétaire ou un client
        if ($chats->contains('owner_id', $user->id)) {
            return view('chat.index', compact('chats'));
        } else {
            return view('chat.all', compact('chats'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatsRequest $request)
    {
        // Ajouter la logique de stockage si nécessaire
    }

    /**
     * Display the specified resource.
     */
    public function show(Chats $chat)
    {
        Log::info('Affichage de la discussion', ['chat_id' => $chat->id, 'user_id' => Auth::id(), 'client_id' => $chat->client_id, 'owner_id' => $chat->owner_id]);

        if ($chat->client_id !== Auth::id() && $chat->owner_id !== Auth::id()) {
            abort(403);
        }
        $messages = $chat->messages()->with('user')->get();
        $owner = User::find($chat->owner_id);
        $client = User::find($chat->client_id);

        if (Auth::id() === $chat->owner_id) {
            return view('chat.showOwner', compact('chat', 'messages', 'owner', 'client'));
        } elseif (Auth::id() === $chat->client_id) {
            return view('chat.show', compact('chat', 'messages', 'owner', 'client'));
        }
        return view('chat.show', compact('chat', 'messages', 'owner', 'client'));
    }


    /**
     * Start a new chat between client and owner.
     */
    public function startChat($ownerId)
    {
        $clientId = Auth::id();

        // Vérifier si l'utilisateur tente de démarrer une discussion avec lui-même
        if ($clientId == $ownerId) {
            return redirect()->route('home')->withErrors('Vous ne pouvez pas discuter avec vous-même.');
        }

        // Vérifier si le propriétaire existe
        $owner = User::find($ownerId);
        if (!$owner) {
            return redirect()->route('home')->withErrors('Propriétaire introuvable.');
        }

        // Vérifier si une discussion existe déjà entre le client et le propriétaire
        $chat = Chats::where(function ($query) use ($ownerId, $clientId) {
            $query->where('owner_id', $ownerId)->where('client_id', $clientId);
        })->orWhere(function ($query) use ($ownerId, $clientId) {
            $query->where('owner_id', $clientId)->where('client_id', $ownerId);
        })->first();

        if (!$chat) {
            // Créer une nouvelle discussion si elle n'existe pas
            $chat = Chats::create([
                'client_id' => $clientId,
                'owner_id' => $ownerId,
            ]);

            // Ajouter un premier message automatique du propriétaire
            $chat->messages()->create([
                'user_id' => $ownerId,
                'message' => 'Bonjour, comment puis-je vous aider ?',
            ]);
        }

        // Rediriger vers la discussion existante ou nouvellement créée
        return redirect()->route('chat.show', ['chat' => $chat->id]);
    }

    /**
     * Send a message in the chat.
     */
    public function sendMessage(Request $request, Chats $chat)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // Ajouter un nouveau message au chat
        $chat->messages()->create([
            'user_id' => Auth::id(), // L'utilisateur qui envoie le message
            'message' => $request->message,
        ]);

        // Rediriger vers la même discussion après envoi du message
        return redirect()->route('chat.show', $chat->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chats $chat)
    {
        // Logique d'édition
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatsRequest $request, Chats $chat)
    {
        // Logique de mise à jour
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chats $chat)
    {
        // Logique de suppression
    }
}
