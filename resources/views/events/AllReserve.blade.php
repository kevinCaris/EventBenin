<x-dashboard-layout>
    <div class="max-w-8xl mx-auto p-10">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-semibold text-gray-900 mb-6">Mes Réservations</h2>
            <p class="text-lg text-gray-600 mb-6">Retrouvez toutes vos réservations !</p>
        </div>

        <!-- Filtre des événements -->
        <div class="max-w-8xl mx-auto p-3 bg-white mb-5  pt-10 rounded-full align-items-center">
            <!-- Formulaire de recherche -->
            <form method="GET" action="{{ route('events.index') }}" class="flex flex-wrap items-center gap-4 mb-8">
                <!-- Sélecteur de type d'événement -->
                <div class="flex items-center">
                    <label for="event-type" class="text-lg font-medium text-gray-700 mr-2">Filtrer par :</label>
                    <select id="event-type" name="event_type"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Tous les événements</option>
                        <option value="Afterwork">Afterwork</option>
                        <option value="Conférence">Conférence</option>
                        <option value="Séminaire">Séminaire</option>
                    </select>
                </div>

                <!-- Champ de recherche -->
                <div class="flex-grow">
                    <input type="text" name="search" placeholder="Rechercher par nom, lieu, type..."
                        value="{{ request('search') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Bouton de recherche -->
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Rechercher
                </button>
            </form>
        </div>

            {{-- <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-4">
                <div>
                    <label for="event-type" class="text-lg font-medium text-gray-700">Filtrer par :</label>
                    <select id="event-type" name="event_type" class="ml-2 px-4 py-2 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Tous les événements</option>
                        <option value="Afterwork">Afterwork</option>
                        <option value="Conférence">Conférence</option>
                        <option value="Séminaire">Séminaire</option>
                    </select>
                </div>
                <div>
                    <label for="location" class="text-lg font-medium text-gray-700">Lieu :</label>
                    <input type="text" id="location" name="location" placeholder="Paris (75000)" class="ml-2 px-4 py-2 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
            <div>
                <a href="{{ route('events.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                    Créer une nouvelle réservation
                </a>
            </div>
        </div> --}}

            <!-- Séparation entre événements futurs et passés -->
            @if ($events->isEmpty())
                <p class="text-gray-600">Aucun événement en cours.</p>
            @endif
            <div class="space-y-12">
                <!-- Section événements futurs -->
                <div>
                    <!-- Modifié pour une grille plus simple et uniformité des cartes -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($events as $event)
                            <div
                                class="flex flex-col p-6 bg-white border border-gray-300 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                                <div class="flex flex-col sm:flex-row items-center mb-4 sm:mb-0 sm:w-full">
                                    <i class="fas fa-calendar-day text-primary text-3xl mb-4 sm:mb-0"></i>
                                    <div class="ml-4">
                                        <h4 class="text-xl font-semibold text-gray-800">{{ $event->event_type }}</h4>
                                    </div>
                                </div>

                                <div class="sm:w-full mt-8 sm:mt-0 ">
                                    <p class="text-gray-600 mt-2"><strong>Lieu :</strong> {{ $event->hall->city }}</p>
                                    <p class="text-gray-500 mt-2"><strong>Début :</strong>
                                        {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }} à
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}</p>
                                    <p class="text-gray-500 mt-2"><strong>Fin :</strong>
                                        {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }} à
                                        {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}</p>
                                    <p class="text-gray-500 mt-2"><strong>Salle :</strong> {{ $event->hall->title }}</p>
                                    <p class="text-gray-500 mt-2"><strong>Adresse :</strong> {{ $event->hall->address }}
                                    </p>
                                    <p class="text-gray-500 mt-2"><strong>Montant :</strong>
                                        {{ number_format($event->amount, 2) }} FCFA</p>
                                    <p class="text-gray-500 mt-2"><strong>Réservé par :</strong>
                                        {{ $event->user->name }}</p>

                                    <div class="mt-4 flex justify-between items-center">
                                        @if ($event->status == 0)
                                            <span class="bg-yellow-100 text-yellow-600 px-4 py-1 rounded-lg text-lg">En
                                                attente</span>
                                        @elseif($event->status == 1)
                                            <span
                                                class="bg-primary text-white px-4 py-1 rounded-lg text-lg">Réservé</span>
                                        @else
                                            <span
                                                class="bg-red-600 text-white px-4 py-1 rounded-lg text-lg">Annulé</span>
                                        @endif

                                        <a href="{{ route('events.edit', $event->id) }}"
                                            class="text-primary hover:text-blue-700">
                                            <i class="fas fa-edit text-primary"></i> Modifier
                                        </a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pagination -->
                <div class="mt-6 bg-gray-100 p-4">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
</x-dashboard-layout>
