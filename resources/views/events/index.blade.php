<x-guest-layout>
    <div class="max-w-8xl mx-auto p-10">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-semibold text-gray-900 mb-6">Mes Réservations</h2>
            <p class="text-lg text-gray-600 mb-6">Retrouvez tous vos événements réservés !</p>
        </div>

        @if ($events->isEmpty())
            <p class="text-gray-600 text-center">Aucun événement en cours.</p>
        @endif

        <div class="space-y-12">
            <!-- Section événements futurs -->
            <div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($events as $event)
                        <div class="flex flex-col p-6 bg-white border border-gray-300 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">

                            <div class="flex items-center mb-4">
                                <i class="fas fa-calendar-day text-primary text-xl"></i>
                                <h4 class="text-xl font-semibold text-gray-800 ml-2">{{ $event->event_type }}</h4>
                            </div>

                            <p class="text-gray-600"><strong>Lieu :</strong> {{ $event->hall->address}}</p>
                            <p class="text-gray-500 mt-2"><strong>Début :</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }} à {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}</p>
                            <p class="text-gray-500 mt-2"><strong>Fin :</strong> {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }} à {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}</p>
                            <p class="text-gray-500 mt-2"><strong>Salle :</strong> {{ $event->hall->title }}</p>
                            <p class="text-gray-500 mt-2"><strong>Montant :</strong> {{ number_format($event->amount, 2) }} FCFA</p>
                            <p class="text-gray-500 mt-2"><strong>Réservé par :</strong> {{ $event->user->name }}</p>

                            <div class="mt-4 flex justify-between items-center">
                                @if($event->status == 0)
                                    <span class="bg-yellow-100 text-yellow-600 px-4 py-1 rounded-lg text-lg">En attente</span>
                                    <a href="{{ route('events.edit', $event->id) }}" class="text-primary hover:text-blue-700">
                                        <i class="fas fa-edit text-primary"></i> Modifier
                                    </a>
                                @elseif($event->status == 1)
                                    <span class="bg-primary text-white px-4 py-1 rounded-lg text-lg">Réservé</span>
                                    <a href="{{ route('events.downloadInvoice', $event->id) }}" class="bg-green-600 text-white px-4 py-1 rounded-lg hover:bg-green-700">
                                        <i class="fas fa-download"></i> Télécharger la facture
                                    </a>
                                @else
                                    <span class="bg-red-500 text-white px-4 py-1 rounded-lg text-lg">Annulé</span>
                                @endif
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
</x-guest-layout>
