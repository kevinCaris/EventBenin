<x-dashboard-layout>
    <div class="max-w-3xl mx-auto p-6 m-8 bg-white rounded-lg shadow-lg">
        <!-- Entête du chat -->
        <div class="flex items-center justify-between mb-6 bg-primary text-white p-4 rounded-t-lg">
            @php
            $interlocutor = $chat->client_id == auth()->id() ? $chat->owner : $chat->client;
            @endphp
            <div class="flex items-center space-x-4">
                <!-- Avatar -->
                <img class="w-12 h-12 border-2 border-blue-500 rounded-full object-cover"
                     src="{{ $interlocutor->avatar ? asset('storage/' . $interlocutor->avatar) : asset('default-avatar.png') }}"
                     alt="Avatar">

                <div>
                    <p class="text-lg font-semibold flex items-center">
                        {{ $interlocutor->name }}
                    </p>
                </div>
            </div>

            {{-- <h1 class="text-2xl font-semibold text-white-50">Discussion avec {{ $client->name }}</h1> --}}

            {{-- <span class="text-sm text-gray-600">Vous êtes connecté en tant que {{ auth()->user()->name }}</span> --}}
        </div>

        <!-- Zone de messages -->
        <div class="chat-box space-y-4 max-h-96 overflow-y-auto p-4 rounded-lg shadow-md">
            @if($messages->isEmpty())
                <div class="bg-green-100 text-green-700 p-4 rounded-lg text-center">
                    Aucune conversation pour le moment. Commencez à discuter !
                </div>
            @else
                @foreach ($messages as $message)
                    <div class="message-container flex {{ $message->user_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div class="message max-w-xs w-full {{ $message->user_id == auth()->id() ? 'bg-primary text-white' : 'bg-gray-200 text-gray-800' }} p-3 rounded-lg shadow-md">
                            <!-- Affichage du nom de l'utilisateur -->
                            <p class="font-semibold text-sm {{ $message->user_id == auth()->id() ? 'text-right' : 'text-left' }}">
                                {{ $message->user_id == $chat->owner_id ? $owner->name : $message->user->name }}
                            </p>
                            <!-- Message -->
                            <p class="mt-1 text-sm">{{ $message->message }}</p>
                            <!-- Heure du message -->
                            <span class="block text-xs text-right mt-2">{{ $message->created_at->format('H:i') }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Formulaire de saisie de message -->
        @if(auth()->id() == $chat->owner_id || auth()->id() == $chat->client_id)  <!-- Vérification si l'utilisateur est le propriétaire ou le client -->
            <form action="{{ route('chat.sendMessage', $chat->id) }}" method="POST" class="mt-4 flex items-center space-x-4">
                @csrf
                <textarea name="message" placeholder="Écrivez un message..." required class="w-full p-3 border rounded-lg shadow-sm resize-none focus:ring-2 focus:ring-primary" rows="1"></textarea>
                <button type="submit" class="bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary focus:outline-none focus:ring-2 focus:ring-primary">Envoyer</button>
            </form>
        @endif
    </div>

    <style>
        .chat-box::-webkit-scrollbar {
            width: 8px;
        }

        .chat-box::-webkit-scrollbar-thumb {
            background-color:#0891B2,
            ;
            border-radius: 4px;
        }

        .chat-box::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
    </style>

    <script>
        // Scroll to the bottom of the chat when a new message is added
        window.onload = function () {
            var chatBox = document.querySelector('.chat-box');
            chatBox.scrollTop = chatBox.scrollHeight;
        };
    </script>
</x-dashboard-layout>
