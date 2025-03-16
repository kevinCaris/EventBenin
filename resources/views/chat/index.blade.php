<x-dashboard-layout>
    <div class="max-w-4xl mx-auto p-6 m-8 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold text-gray-700 mb-4 flex items-center">
            <i class="fas fa-comments mr-2 text-primary"></i> Mes Discussions
        </h1>

        @if ($chats->isEmpty())
            <p class="text-gray-500 flex items-center">
                <svg class="w-5 h-5 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                Vous n'avez aucune discussion pour le moment.
            </p>
        @else
            <ul class="space-y-4">
                @foreach ($chats as $chat)
                    @php
                        $interlocutor = $chat->client_id == auth()->id() ? $chat->owner : $chat->client;
                    @endphp
                    <li class="p-4 bg-gray-100 rounded-lg shadow hover:bg-gray-200 transition">
                        <a href="{{ route('chat.show', $chat->id) }}" class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <!-- Avatar -->
                                <img class="w-12 h-12 border-2 border-blue-500 rounded-full object-cover"
                                     src="{{ $interlocutor->avatar ? asset('storage/' . $interlocutor->avatar) : asset('default-avatar.png') }}"
                                     alt="Avatar">

                                <div>
                                    <p class="text-lg font-semibold flex items-center">
                                        👤 Discussion avec {{ $interlocutor->name }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        💬 Dernier message :
                                        {{ $chat->messages->last()?->message ?? 'Aucun message' }}
                                    </p>
                                </div>
                            </div>

                            <!-- Date du dernier message -->
                            <span class="text-sm text-gray-500 flex items-center">
                                ⏳ {{ $chat->updated_at->diffForHumans() }}
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-dashboard-layout>
