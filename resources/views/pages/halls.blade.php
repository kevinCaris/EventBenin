<x-guest-layout>
    <div class="sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <!-- Section Hero -->
        <section id="hero" class="relative h-[500px] flex items-center justify-center text-left bg-cover bg-center"
            style="background-image: url('{{ asset('images/birthday.jpg') }}');">
            <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Overlay sombre -->
            <div class="relative z-10 flex flex-col justify-center items-center h-full text-center text-white px-6">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4">Trouvez la salle parfaite</h1>
                <p class="text-lg sm:text-xl md:text-2xl mb-6">Pour vos événements inoubliables.</p>
                <a href="#reservations"
                    class="bg-primary text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-yellow-400 transition duration-300 mb-6">Réservez
                    dés maintenant</a>
            </div>
        </section>

        <!-- Grid Container -->
        <div class="grid grid-cols-1 gap-6 mx-auto mt-5 py-12 px-6  grid  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <!-- Sidebar pour les filtres -->
            <div>
                <div class="bg-white p-6 rounded-lg shadow-md max-w-xs mx-auto col-span-1 self-start">
                    <h3 class="text-lg font-semibold mb-4">Filtres</h3>
                    <form action="" method="GET" class="space-y-4">
                        <!-- Filtre Ville -->
                        <div>
                            <label for="city" class="block text-sm font-semibold text-gray-700">Ville</label>
                            <select id="city" name="city"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md mt-2">
                                <option value="">Toutes les villes</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city }}"
                                        {{ request('city') == $city ? 'selected' : '' }}>
                                        {{ $city }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="capacity" class="block text-sm font-semibold text-gray-700">Capacité</label>
                            <div class="flex items-center gap-2 mt-2">
                                <input type="range" id="capacity" name="capacity" min="1" max="100000"
                                    step="10" value="{{ request('capacity', 120) }}" class="w-full cursor-pointer">
                                <input type="text" id="capacityInput" value="{{ request('capacity', 120) }}"
                                    class="w-20 px-2 py-1 border border-gray-300 rounded-md text-center">
                                <span class="text-sm text-gray-600">personnes</span>
                            </div>
                        </div>
                        <!-- Filtre Prix -->
                        <div>
                            <label for="price" class="block text-sm font-semibold text-gray-700">Prix Min
                                (FCFA)</label>
                            <input type="text" id="price" name="price" min="0"
                                value="{{ request('price', 0) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md mt-2">
                        </div>

                        <!-- Filtre Statut -->
                        <div>
                            <label for="status" class="block text-sm font-semibold text-gray-700">Statut</label>
                            <select id="status" name="status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md mt-2">
                                <option value="">Tous les statuts</option>
                                <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>
                                    Disponible</option>
                                <option value="unavailable" {{ request('status') == 'unavailable' ? 'selected' : '' }}>
                                    Indisponible</option>
                            </select>
                        </div>

                        <!-- Bouton de filtrage -->
                        <button type="submit"
                            class="bg-primary text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 w-full">
                            Filtrer
                        </button>
                    </form>
                </div>
            </div>

            <!-- Liste des salles -->
            <div class="col-span-3 space-y-6">

                <!-- Formulaire de recherche avec toggle de vue -->
                <form method="GET" action=""
                    class="flex flex-col sm:flex-row justify-between items-center bg-white shadow-lg rounded-lg p-4 mx-auto">
                    <!-- Barre de recherche à gauche -->
                    <div class="relative flex-grow mb-4 sm:mb-0">
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            placeholder="🔍 Rechercher un événement..."
                            class="w-full px-6 py-3 text-lg border border-gray-300 rounded-full shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>

                    <button type="submit"
                        class="bg-primary text-white px-6  mx-4 py-3 text-lg font-semibold rounded-full shadow-md transition duration-200 mb-4 sm:mb-0">
                        Rechercher
                    </button>

                    <!-- Sélecteur de vue avec icônes à droite -->
                    <div class="flex items-center space-x-4 mt-4 sm:mt-0">

                        <!-- Icônes pour la vue grille ou liste -->
                        <div class="flex space-x-3">
                            <button type="button" id="grid-view-btn" title="Vue Grille"
                                class="p-2 rounded-full hover:bg-blue-100">
                                <i class="fa fa-th-large text-xl text-primary"></i>
                            </button>
                            <button type="button" id="list-view-btn" title="Vue Liste"
                                class="p-2 rounded-full hover:bg-blue-100">
                                <i class="fa fa-list text-xl text-primary"></i>
                            </button>
                        </div>
                    </div>
                </form>


                <!-- Liste des salles -->
                <div class="mt-6" id="halls-container">
                    <!-- Vue en grille -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="grid-view">
                        @foreach ($halls as $hall)
                            <div class="flex flex-col bg-white shadow-lg rounded-lg overflow-hidden p-5">
                                <div class="w-full">
                                    <img src="{{ $hall->pictures->isNotEmpty() ? asset($hall->pictures->first()->path) : '' }}"
                                        alt="Image de la salle" class="w-full h-full object-cover rounded-lg">
                                </div>
                                <div class="p-4">
                                    <div class="flex justify-between items-center">
                                        @if ($hall->status->value === 'available')
                                            <span class="text-green-500 font-bold">Disponible</span>
                                        @else
                                            <span class="text-red-500 font-bold">Indisponible</span>
                                        @endif
                                    </div>
                                    <h5 class="text-xl font-semibold text-gray-800">{{ $hall->title }}</h5>
                                    <p class="text-primary text-lg mt-2 flex gap-3">
                                        <strong><i class="fa fa-map-marker text-primary"></i></strong>
                                        {{ $hall->city }}
                                    </p>
                                    <p class="text-gray-700 mt-3 text-sm line-clamp-2">{{ $hall->description }}</p>
                                    <p class="text-gray-700 mt-2">
                                        <strong><i class="fa fa-users"></i></strong> {{ $hall->capacity }} personnes
                                    </p>
                                    <p class="text-gray-800 font-semibold mt-2">
                                        <i class="fa fa-money"></i>
                                        <strong>{{ number_format($hall->price, 2) }} FCFA / Heure</strong>
                                    </p>
                                    <!-- Affichage de la note moyenne -->
                                    <div class="flex items-center my-2">
                                        <div class="text-yellow-500 text-xl">
                                            @for ($i = 0; $i < 5; $i++)
                                                <span class="{{ $i < $hall->reviews->avg('note') ? 'text-yellow-500 text' : 'text-gray-300' }}">★</span>
                                            @endfor
                                        </div>
                                        <span class="ml-2 text-gray-500">({{ $hall->reviews->count() }} avis)</span>
                                    </div>
                                    <!-- Boutons -->
                                    <div class="mt-4 flex gap-2">
                                        <x-reservationForm title="Créer une nouvelle réservation" :route="route('events.store')"
                                            method="POST" buttonText="Réserver" :hall="$hall ?? null">
                                            <i class="fa fa-calendar"></i> Réserver
                                        </x-reservationForm>

                                        <a href="{{ route('guest.hall.show', $hall->id) }}"
                                            class="inline-block bg-primary text-white text-sm font-semibold py-2 px-2 rounded-lg hover:bg-primary  sm:w-auto">
                                            <i class="fa fa-eye"></i> Voir la salle
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Vue en liste -->
                    <div class="space-y-6 hidden" id="list-view">
                        @foreach ($halls as $hall)
                            <div
                                class="flex flex-col sm:flex-row items-stretch bg-white shadow-lg rounded-lg overflow-hidden p-5">
                                <div class="w-full sm:w-1/4 flex">
                                    <img src="{{ $hall->pictures->isNotEmpty() ? asset($hall->pictures->first()->path) : '' }}"
                                        alt="Image de la salle" class="w-full h-full object-cover rounded-lg">
                                </div>
                                <div class="p-4 w-full sm:w-3/4 flex flex-col justify-between">
                                    <div>
                                        <div class="flex justify-between items-center">
                                            <h5 class="text-xl font-semibold text-gray-800">{{ $hall->title }}</h5>
                                            @if ($hall->status->value === 'available')
                                                <span class="text-green-500 font-bold">Disponible</span>
                                            @else
                                                <span class="text-red-500 font-bold">Indisponible</span>
                                            @endif
                                        </div>
                                        <p class="text-primary text-lg mt-2 flex gap-3">
                                            <strong><i class="fa fa-map-marker text-primary"></i></strong>
                                            {{ $hall->city }}
                                        </p>
                                        <p class="text-gray-700 mt-3 text-sm line-clamp-2">{{ $hall->description }}
                                        </p>
                                        <p class="text-gray-700 mt-2">
                                            <strong><i class="fa fa-users"></i></strong> {{ $hall->capacity }}
                                            personnes
                                        </p>
                                        <p class="text-gray-800 font-semibold mt-2">
                                            <i class="fa fa-money"></i> Location
                                            <strong>{{ number_format($hall->price, 2) }} FCFA / Heure</strong>
                                        </p>
                                        <div class="flex items-center my-2">
                                            <div class="text-yellow-500 text-xl">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <span class="{{ $i < $hall->reviews->avg('note') ? 'text-yellow-500 text' : 'text-gray-300' }}">★</span>
                                                @endfor
                                            </div>
                                            <span class="ml-2 text-gray-500">({{ $hall->reviews->count() }} avis)</span>
                                        </div>
                                    </div>
                                    <!-- Boutons -->
                                    <div class="mt-4 flex gap-4">
                                        <a href="{{ route('events.create') }}"
                                            class="inline-block bg-primary text-white text-sm font-semibold py-2 px-4 rounded-lg hover:bg-primary w-full sm:w-auto">
                                            <i class="fa fa-calendar"></i> Réserver
                                        </a>
                                        <a href="{{ route('guest.hall.show', $hall->id) }}"
                                            class="inline-block bg-primary text-white text-sm font-semibold py-2 px-4 rounded-lg hover:bg-primary w-full sm:w-auto">
                                            <i class="fa fa-eye"></i> Voir la salle
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pagination -->
                <div class="mt-6 bg-white p-4">
                    {{ $halls->links() }}
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const capacityRange = document.getElementById("capacity");
        const capacityInput = document.getElementById("capacityInput");

        // Mettre à jour l'input lorsque l'utilisateur glisse le slider
        capacityRange.addEventListener("input", function() {
            capacityInput.value = capacityRange.value;
        });

        // Mettre à jour le slider lorsque l'utilisateur tape une valeur
        capacityInput.addEventListener("input", function() {
            let value = parseInt(capacityInput.value) || 1;
            value = Math.max(1, Math.min(100000, value)); // Limiter entre 1 et 100 000
            capacityRange.value = value;
        });
    });


    const gridViewBtn = document.getElementById('grid-view-btn');
    const listViewBtn = document.getElementById('list-view-btn');
    const gridView = document.getElementById('grid-view');
    const listView = document.getElementById('list-view');

    // Mettre la vue par défaut en fonction de la sélection de l'utilisateur
    if (localStorage.getItem('view') === 'grid') {
        gridView.classList.remove('hidden');
        listView.classList.add('hidden');
    } else {
        gridView.classList.add('hidden');
        listView.classList.remove('hidden');
    }

    // Basculer vers la vue grille
    gridViewBtn.addEventListener('click', function() {
        gridView.classList.remove('hidden');
        listView.classList.add('hidden');
        localStorage.setItem('view', 'grid');
    });

    // Basculer vers la vue liste
    listViewBtn.addEventListener('click', function() {
        gridView.classList.add('hidden');
        listView.classList.remove('hidden');
        localStorage.setItem('view', 'list');
    });
</script>
