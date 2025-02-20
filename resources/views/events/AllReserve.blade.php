<x-dashboard-layout>
    <div class="max-w-8xl mx-auto p-10">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-semibold text-gray-900 mb-6">Mes Réservations</h2>
            <p class="text-lg text-gray-600 mb-6">Retrouvez toutes vos réservations !</p>
        </div>

        <!-- Filtre des événements -->
        <div class="max-w-8xl mx-auto p-3 bg-white mb-5 pt-10 rounded-lg">
            <form method="GET" action="" class="flex flex-wrap items-center gap-4 mb-8">
                <h3 class="text-lg font-medium text-gray-700 mr-2">Filtrer</h3>
                <!-- Champ de recherche dynamique -->
                <div class="flex-grow">
                    <input type="text" id="search-input" placeholder="Rechercher par nom, lieu, type..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>


            </form>
        </div>

        <!-- Liste des événements -->
        @if ($events->isEmpty())
            <p class="text-gray-600 text-center">Aucun événement en cours.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="events-container">
                @foreach ($events as $event)
                    <div class="event-card flex flex-col p-6 bg-white border border-gray-300 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300"
                        data-type="{{ $event->event_type }}" data-location="{{ $event->hall->city }}">
                        <h4 class="text-xl font-semibold text-gray-800">{{ $event->event_type }}</h4>
                        <p class="text-gray-600"><strong>Lieu :</strong> {{ $event->hall->city }}</p>
                        <p class="text-gray-500"><strong>Début :</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }} à {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}</p>
                        <p class="text-gray-500"><strong>Fin :</strong> {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }} à {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}</p>
                        <p class="text-gray-500"><strong>Salle :</strong> {{ $event->hall->title }}</p>
                        <p class="text-gray-500"><strong>Adresse :</strong> {{ $event->hall->address }}</p>
                        <p class="text-gray-500"><strong>Montant :</strong> {{ number_format($event->amount, 2) }} FCFA</p>
                        <p class="text-gray-500"><strong>Réservé par :</strong> {{ $event->user->name }}</p>

                        <div class="mt-4 flex justify-between items-center">
                            @if ($event->status == 0)
                                <span class="bg-yellow-100 text-yellow-600 px-2 py-1 rounded-lg text-lg">En attente</span>
                            @elseif($event->status == 1)
                                <span class="bg-primary text-white px-4 py-1 rounded-lg text-lg">Réservé</span>
                            @else
                                <span class="bg-red-600 text-white px-4 py-1 rounded-lg text-lg">Annulé</span>
                            @endif
                            <a href="{{ route('events.downloadInvoice', $event->id) }}" class="bg-green-600 text-white px-2 py-1 rounded-lg hover:bg-green-700">
                                <i class="fas fa-download"></i>
                            </a>

                            <a href="{{ route('events.edit', $event->id) }}" class="text-primary hover:text-blue-700">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6 bg-gray-100 p-4">
                {{ $events->links() }}
            </div>
        @endif
    </div>

    <!-- Script JavaScript pour la recherche dynamique -->
    <script>
        document.getElementById("search-input").addEventListener("input", function() {
            let filter = this.value.toLowerCase();
            let eventCards = document.querySelectorAll(".event-card");

            eventCards.forEach(function(card) {
                let type = card.getAttribute("data-type").toLowerCase();
                let location = card.getAttribute("data-location").toLowerCase();
                let textContent = card.textContent.toLowerCase();

                if (type.includes(filter) || location.includes(filter) || textContent.includes(filter)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    </script>
</x-dashboard-layout>
