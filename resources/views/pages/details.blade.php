<x-guest-layout>
    <div class="  sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <!-- Hero Section -->
        <section class="relative w-full h-[500px] flex items-center text-left justify-center bg-cover bg-center"
            style="background-image: url('{{ asset('images/home-9.webp') }}');">
            <div class="absolute inset-0 bg-black opacity-20"></div> <!-- Overlay sombre -->
            <div class="relative z-10 flex flex-col justify-center items-center h-full text-center text-white px-6">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4"> {{ $hall->title }}</h1>
                <p class="text-lg sm:text-xl md:text-2xl mb-6">Pour vos événements inoubliables.</p>

                <div class="flex items-center gap-3 border p-2 rounded-lg">
                    <a href="{{ route('home') }}" class="text-white hover:text-yellow-500 hover:underline">Accueil</a>
                    &gt;
                    <a href="{{ route('halls.guest') }}"
                        class="text-white hover:text-yellow-500 hover:underline">Salles</a> &gt;
                    <a href="#" class="text-yellow-500  text-bold">{{ $hall->title }}</a>
                </div>
            </div>
        </section>
        <header class="bg-white shadow-md sticky mt-5 z-50 ">
            <div class="container mx-auto flex justify-between items-center py-4 px-6">
                <!-- Navigation -->
                <nav>
                    <ul class="flex space-x-6 text-primary text-xl">
                        <li><a href="#galerie" class="hover:text-primary-600">Galerie</a></li>
                        <li><a href="#presentation" class="hover:text-primary-600">Présentation</a></li>
                        <li><a href="#tarification" class="hover:text-primary-600">Tarifs</a></li>
                        <li><a href="#equipements" class="hover:text-primary-600">Equipements</a></li>
                        <li><a href="#disponibilite" class="hover:text-primary-600">Disponibilité</a></li>
                        <li><a href="#avis" class="hover:text-primary-600">Avis</a></li>


                    </ul>
                </nav>
                <!-- Bouton Contacter & Téléphone -->
                <div class="flex items-center space-x-6">
                    <div class="bg-primary text-white px-4 py-2 rounded-lg  transition">
                        <i class="fab fa-whatsapp text-white text-lg"></i>
                        <a href="https://wa.me/62590775?text=Bonjour,%20je%20souhaite%20obtenir%20de%20plus%20amples%20informations%20concernant%20vos%20services.%20Pourriez-vous%20m'aider%20s'il%20vous%20plaitez%3F"
                            target="_blank" class="text-white">Discuter</a>
                    </div>
                    <div class="bg-primary text-white px-4 py-2 rounded-lg  transition">
                        <i class="fa fas-calendar text-white text-lg"></i>
                        <a href="#reserver"class="text-white">Réserver</a>
                    </div>
                    <!-- Dropdown Téléphone -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center text-gray-700 hover:text-primary">
                            <i class="fas fa-phone text-xl"></i>
                        </button>

                        <!-- Contenu du dropdown -->
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 z-50  w-64 bg-white shadow-lg rounded-lg p-4 text-sm text-gray-800 border border-gray-200">
                            <p class="font-semibold">Coordonnées</p>
                            <p class="text-gray-600 text-xs">Lors de votre appel, comme notre service est gratuit,
                                n'oubliez surtout pas de signaler au prestataire que vous appelez de la part de :
                                <strong class="text-yellow-500 text-md">{{ $hall->company->name }}</strong>.
                            </p>
                            <div class="mt-2">
                                <p class="font-semibold">Téléphone principal : {{ $hall->company->phone }}</p>
                            </div>
                            <div class="mt-2">
                                <p class="font-semibold">Langues parlées :</p>
                                <p>Français</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Alpine.js pour le dropdown -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
        <div class="py-5 text-lg flex  gap-2">
            <div class="max-full py-5 px-6 flex gap-5">
                <!-- Header -->
                <div class="container mx-auto flex justify-between items-center py-4 px-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-8 py-8">
                        <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Details de la salle') }}
                            </h2>
                            <div>
                                @if ($hall->status->value === 'available')
                                    <span class="text-green-500 font-bold">Disponible</span>
                                @else
                                    <span class="text-red-500 font-bold">Indisponible</span>
                                @endif
                            </div>
                        </div>

                        <div class="container mx-auto px-4 py-8">
                            <div class="relative">
                                @if ($pictures->isNotEmpty())
                                    <!-- Image principale -->
                                    <div class="main-image mb-4">
                                        <img src="{{ asset($pictures->first()->path) }}" alt="Image principale"
                                            id="mainImage" class="w-full h-96 object-cover rounded-lg shadow-lg">
                                    </div>

                                    <!-- Vignettes -->
                                    <div class="flex justify-center space-x-4">
                                        @foreach ($pictures as $picture)
                                            <img src="{{ asset($picture->path) }}" alt="Image {{ $picture->id }}"
                                                class="thumbnail w-24 h-24 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-blue-500"
                                                onclick="changeImage('{{ asset($picture->path) }}')">
                                        @endforeach
                                    </div>
                                @else
                                    <p>Aucune image disponible.</p>
                                @endif
                            </div>
                        </div>

                        <!-- Adresse de la salle -->
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold">Adresse de la salle</h3>
                            <p class="text-gray-600">{{ $hall->address }}</p>
                        </div>
                        <!-- Nom de la salle -->
                        <div class="mb-6">
                            <h3 class="text-3xl text-stone-600 font-semibold">{{ $hall->title }}</h3>
                            <p></p>
                        </div>

                        <!-- Contact de la personne -->
                        <div class="mb-6 flex justify-between">
                            <input type="text" class="w-2/4  border border-gray-300 rounded-lg" list="contacts"
                                placeholder="Sélectionnez un contact">
                            <datalist id="contacts">
                                <option value="Contact 1">
                                <option value="Contact 2">
                                <option value="Contact 3">
                            </datalist>
                            <button
                                class="mt-4 border border-primary  hover:bg-primary  hover:text-white text-primary p-2 rounded-lg"
                                onclick="toggleMap()"><i class="fas fa-map-marker-alt"></i> Voir sur la carte</button>
                        </div>
                        <div id="map" class="h-64 w-full rounded-xl hidden"></div>
                        <div class="flex items-center my-2">
                            <div class="text-yellow-500 text-xl">
                                @for ($i = 0; $i < 5; $i++)
                                    <span
                                        class="{{ $i < $hall->reviews->avg('note') ? 'text-yellow-500 text' : 'text-gray-300' }}">★</span>
                                @endfor
                            </div>
                            <span class="ml-2 text-gray-500">({{ $hall->reviews->count() }} avis)</span>
                        </div>
                        <!-- Capacité et Prix -->
                        <div class="my-6">
                            <p class="text-xl text-stone-600 font-semibold mb-5"><strong>Capacité :</strong><span
                                    class="text-yellow-500"> {{ $hall->capacity ?? 'Non spécifiée' }} </span>personnes
                            </p>
                            <p class="text-xl text-stone-600 font-semibold"><strong>Prix :</strong><span
                                    class="text-yellow-500"> {{ number_format($hall->price, 2, ',', ' ') }} FCFA
                                </span>/
                                heure</p>
                        </div>

                        <!-- Présentation de la salle -->
                        <div>
                            <div class="my-6" id="presentation">
                                <h3 class="text-2xl text-stone-600 font-semibold">Présentation</h3>
                                <p id="description" data-full-text="{{ $hall->description }}" data-expanded="false">
                                    {{ Str::limit($hall->description, 150, '...') }}</p>
                                <button onclick="toggleText('description')" class="mt-2 text-blue-500">Voir plus <i
                                        class="fas fa-arrow-down"></i>"</button>
                            </div>
                        </div>


                        <!-- Tarification -->
                        <div class="my-6" id="tarification">
                            <h3 class="text-2xl text-stone-600 font-semibold">Tarification</h3>
                            <p id="tarification" data-full-text="{{ $hall->tarification }}" data-expanded="false">
                                {{ Str::limit($hall->tarification, 150, '...') }}</p>
                            <button onclick="toggleText('tarification')" class="mt-2 text-blue-500">Voir plus <i
                                    class="fas fa-arrow-down"></i></button>
                        </div>

                        <!-- Tarification par type d'événement -->
                        <div class="my-6">
                            <h3 class="text-2xl font-semibold text-stone-600 mb-4">Type d'événement</h3>
                            <div class="grid lg:grid-cols-3 sm:grid-cols-2 md:grid-cols-2 gap-5" id="pricing-list">
                                @foreach ($hall->events as $event)
                                    <div class="border rounded-lg p-4 mb-4 pricing-block">
                                        <h4 class="font-semibold text-xl text-stone-600">{{ $event->title }}</h4>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Bouton Voir plus / Voir moins -->
                            <button id="toggle-pricing" onclick="togglePricing()" class="mt-2 text-blue-500">
                                Voir plus <i class="fas fa-caret-down"></i>
                            </button>
                        </div>

                        <!-- Caractéristiques de la salle -->
                        <div class="my-6" id="equipements">
                            <h3 class="text-2xl  text-stone-600  font-semibold mb-3">Equipements</h3>

                            <!-- Liste des équipements -->
                            <ul id="equipment-list" class="grid grid-cols-2 list-none gap-5">
                                @foreach ($hall->features as $index => $feature)
                                    <!-- Limite d'affichage initiale de 4 équipements -->
                                    <li class="feature-item {{ $index >= 4 ? 'hidden' : '' }}">
                                        <div class="border rounded-lg p-3 mb-2">
                                            <div class="flex items-center gap-3">
                                                <i class="fas fa-check text-green-500"></i>
                                                <span>{{ $feature->title }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Bouton pour voir plus ou moins -->
                            <button id="toggle-equipments" class="mt-2 text-blue-500"
                                onclick="toggleEquipments()">Voir
                                plus
                                <i class="fas fa-caret-down"></i></button>
                        </div>
                        <!-- Liste des disponibilité -->
                        <div class="my-6" id="disponibilite">
                            <h3 class="text-2xl  text-stone-600  font-semibold mb-3">Disponibilité</h3>
                            <div id="calendar"></div>
                        </div>

                        <div class="my-6" id="avis">
                            <!-- systeme d' avis -->
                            <h2 class="text-2xl font-semibold text-stone-600 mb-6">Avis des clients</h2>

                            @if ($reviews->isEmpty())
                                <p>Aucun avis pour cette salle.</p>
                            @else
                                @foreach ($reviews as $review)
                                    <div class="border p-3 mb-3">
                                        <strong>{{ $review->nom ?? 'Utilisateur anonyme' }}</strong>
                                        <span class="text-muted">({{ $review->created_at->format('d/m/Y') }})</span>
                                        <p>Note : ⭐ {{ $review->note }}/5</p>
                                        <p>{{ $review->commentaire }}</p>
                                    </div>
                                @endforeach
                                <!-- Pagination -->
                                <div class="d-flex justify-content-center">
                                    {{ $reviews->links() }} <!-- Liens de pagination -->
                                </div>
                            @endif

                        </div>

                    </div>

                </div>
                <!-- compagnie -->
                <div class="space-y-4">
                    <div>
                        <div class="bg-white shadow-lg rounded-lg p-6 space-y-4">
                            <!-- Cover Section -->
                            <div class="relative mb-8">
                                <div>
                                    <img src="{{ asset('storage/' . $hall->company->avatar) }}" alt="Avatar"
                                        class="w-24 h-24 rounded-full border-4 border-white">
                                </div>
                            </div>
                            <div class="flex items-center justify-between  py-2 ">
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-800">{{ $hall->company->name }}</h1>
                                </div>
                            </div>

                            <!-- Informations générales -->
                            <div class="mt-6">
                                <div class=" gap-8 mt-4">
                                    <div>
                                        <p class="text-gray-500">Email :</p>
                                        <p class="font-medium break-words">{{ $hall->company->email }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Téléphone :</p>
                                        <p class="font-medium">{{ $hall->company->phone }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Adresse :</p>
                                        <p class="font-medium">{{ $hall->company->address }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Ville :</p>
                                        <p class="font-medium">{{ $hall->company->ville }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Code Postal :</p>
                                        <p class="font-medium">{{ $hall->company->postal_code }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Pays :</p>
                                        <p class="font-medium">{{ $hall->company->pays }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Réseaux sociaux -->
                            <div class="my-6  ">
                                <h3 class="text-2xl font-semibold mb-3  text-stone-600 ">Mes réseaux sociaux</h3>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="flex items-center gap-3 border p-2 rounded-lg ">
                                        <i class="fab fa-facebook  text-blue-500"></i>
                                        <a href="{{ $hall->company->facebook_url }}" target="_blank"
                                            class="text-primary">Facebook</a>
                                    </div>

                                    <div class="flex items-center gap-3 border p-2 rounded-lg">
                                        <i class="fab fa-twitter text-black-500"></i>
                                        <a href="{{ $hall->company->twitter_url }}" target="_blank"
                                            class="text-primary">Twitter</a>
                                    </div>

                                    <div class="flex items-center gap-3 border p-2 rounded-lg">
                                        <i class="fab fa-instagram text-red-500"></i>
                                        <a href="{{ $hall->company->instagram_url }}" target="_blank"
                                            class="text-primary">Instagram</a>
                                    </div>

                                    <div class="flex items-center gap-3 border p-2 rounded-lg">
                                        <i class="fab fa-linkedin text-blue-500"></i>
                                        <a href="{{ $hall->company->linkedin_url }}" target="_blank"
                                            class="text-primary">LinkedIn</a>
                                    </div>
                                    <div class="flex items-center gap-3 border p-2 rounded-lg">
                                        <i class="fab fa-whatsapp text-green-500"></i>
                                        <a href="https://wa.me/62590775?text=Bonjour,%20je%20souhaite%20obtenir%20de%20plus%20amples%20informations%20concernant%20vos%20services.%20Pourriez-vous%20m'aider%20s'il%20vous%20plaitez%3F"
                                            target="_blank" class="text-primary">WhatsApp</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="reserver">
                        <x-demande-evenement :hall="$hall" />
                    </div>

                    <!-- resources/views/reservations/show.blade.php -->
                    <div class="container mx-auto mt-8">
                        <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-8">
                            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Laisser un avis</h3>

                            <form action="{{ route('reviews.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="hall_id" value="{{ $hall->id }}">

                                <div class="mb-6">
                                    <label for="nom" class="block text-lg font-medium text-gray-700">Nom
                                        :</label>
                                    <input type="text" name="nom" id="nom"
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                                        required>
                                </div>

                                <div class="mb-6">
                                    <label for="email" class="block text-lg font-medium text-gray-700">Email
                                        :</label>
                                    <input type="email" name="email" id="email"
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                                        required>
                                </div>

                                <div class="mb-6">
                                    <label for="note" class="block text-lg font-medium text-gray-700">Note
                                        :</label>
                                    <select name="note" id="note"
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                                        required>
                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                        <option value="4">⭐⭐⭐⭐</option>
                                        <option value="3">⭐⭐⭐</option>
                                        <option value="2">⭐⭐</option>
                                        <option value="1">⭐</option>
                                    </select>
                                </div>

                                <div class="mb-6">
                                    <label for="commentaire"
                                        class="block text-lg font-medium text-gray-700">Commentaire :</label>
                                    <textarea name="commentaire" id="commentaire"
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" rows="4" required></textarea>
                                </div>

                                <button type="submit"
                                    class="w-full bg-primary text-white p-3 rounded-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Envoyer
                                </button>
                            </form>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>


</x-guest-layout>
<script>
    function changeImage(imageSrc) {
        document.getElementById('mainImage').src = imageSrc;
    }

    let defaultCoords = [9.3077, 2.3158]; // Coordonnées du Bénin par défaut
    let mapInstance = null;

    function toggleMap() {
        let mapContainer = document.getElementById('map');
        mapContainer.classList.toggle('hidden');

        if (!mapContainer.classList.contains('hidden')) {
            if (!mapInstance) {
                let hallCoords = [{{ $hall->latitude ?? '9.3077' }}, {{ $hall->longitude ?? '2.3158' }}];

                mapInstance = L.map('map').setView(hallCoords, 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 18,
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(mapInstance);

                L.marker(hallCoords).addTo(mapInstance);
            }

            setTimeout(() => {
                mapInstance.invalidateSize();
            }, 300);
        }
    }

    function toggleText(elementId) {
        let element = document.getElementById(elementId);
        let button = element.nextElementSibling; // Récupérer le bouton qui suit l'élément de texte

        // Récupérer le texte complet du data-attribute
        let fullText = element.getAttribute('data-full-text');

        // Vérifier si l'élément est actuellement étendu ou tronqué
        if (element.getAttribute('data-expanded') === 'false') {
            // Afficher le texte complet
            element.innerHTML = fullText;
            element.setAttribute('data-expanded', 'true');
            button.innerHTML = 'Voir moins <i class="fas  fa-caret-down"></i>'; // Modifier le texte du bouton
        } else {
            // Tronquer à nouveau le texte
            element.innerHTML = fullText.substring(0, 150) + '...'; // Tronquer à 150 caractères
            element.setAttribute('data-expanded', 'false');
            button.innerHTML = 'Voir plus <i class="fas fa-caret-up"></i>'; // Modifier le texte du bouton
        }
    }


    // Fonction pour gérer l'affichage des équipements
    function toggleEquipments() {
        const equipmentList = document.getElementById('equipment-list');
        const allItems = equipmentList.getElementsByClassName('feature-item');
        const button = document.getElementById('toggle-equipments');

        // Vérifier si des éléments sont cachés
        const hiddenItems = Array.from(allItems).filter(item => item.classList.contains('hidden'));

        // Si des éléments sont cachés, on les affiche
        if (hiddenItems.length > 0) {
            hiddenItems.forEach(item => {
                item.classList.remove('hidden');
            });
            button.innerHTML = 'Voir moins <i class="fas fa-caret-down"></i>'; // Change le texte du bouton
        } else {
            // Sinon on les cache
            Array.from(allItems).forEach(item => {
                item.classList.add('hidden');
            });
            // Affiche uniquement les 4 premiers éléments
            for (let i = 0; i < 4; i++) {
                allItems[i].classList.remove('hidden');
            }
            button.innerHTML = 'Voir plus <i class="fas fa-caret-up"></i>'; // Change le texte du bouton
        }
    }

    function togglePricing() {
        const pricingList = document.getElementById('pricing-list');
        const allBlocks = pricingList.getElementsByClassName('pricing-block');
        const button = document.getElementById('toggle-pricing');

        // Vérifier si des blocs sont cachés
        const hiddenBlocks = Array.from(allBlocks).filter(block => block.classList.contains('hidden'));

        // Si des blocs sont cachés, on les affiche
        if (hiddenBlocks.length > 0) {
            hiddenBlocks.forEach(block => {
                block.classList.remove('hidden');
            });
            button.innerHTML = 'Voir moins <i class="fas fa-caret-up"></i>'; // Change le texte du bouton
        } else {
            // Sinon on les cache
            Array.from(allBlocks).forEach(block => {
                block.classList.add('hidden');
            });
            // Affiche uniquement les 2 premiers blocs
            for (let i = 0; i < 2; i++) {
                allBlocks[i].classList.remove('hidden');
            }
            button.innerHTML = 'Voir plus <i class="fas fa-caret-down"></i>'; // Change le texte du bouton
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'fr', // Définit la langue en français
            initialView: 'dayGridMonth', // Affichage mensuel
            events: [
                @foreach ($events as $event)
                    {
                        title: '{{ $event->event_type }}', // Type d'événement (mariage, anniversaire, etc.)
                        start: '{{ $event->start_date }}T{{ $event->start_time }}', // Date et heure de début
                        end: '{{ $event->end_date }}T{{ $event->end_time }}', // Date et heure de fin
                        description: '{{ $event->details }}', // Détails de l'événement
                        backgroundColor: '{{ $event->status == 1 ? '#FF5733' : '#4CAF50' }}', // Couleur d'arrière-plan (occupé ou disponible)
                        borderColor: '{{ $event->status == 1 ? '#FF5733' : '#4CAF50' }}', // Couleur de bordure (occupé ou disponible)
                        className: '{{ $event->status == 1 ? 'occupied' : 'available' }}', // Classe pour appliquer des styles supplémentaires (occupé ou disponible)
                        extendedProps: {
                            description: '{{ $event->details }}', // Description affichée dans les détails de l'événement
                            location: '{{ $event->location }}' // Lieu de l'événement, s'il existe
                        }
                    },
                @endforeach
            ],
            editable: true, // Permet l'édition des événements
            droppable: false, // Désactive le drag-and-drop
            height: 'auto', // Ajuste la taille du calendrier à l'écran
            eventsLimit: true, // Limite le nombre d'événements visibles dans une journée
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,dayGridDay'
            },
            buttonText: { // Définir explicitement les noms des boutons
                today: 'Aujourd\'hui',
                month: 'Mois',
                week: 'Semaine',
                day: 'Jour'
            }

            // eventClick: function(info) {
            //     var eventObj = info.event;
            //     alert('Événement : ' + eventObj.title + '\n' +
            //           'Date de début : ' + eventObj.start.toLocaleString() + '\n' +
            //           'Date de fin : ' + eventObj.end.toLocaleString() + '\n' +
            //           'Description : ' + eventObj.extendedProps.description + '\n' +
            //           'Lieu : ' + eventObj.extendedProps.location);
            // }
        });

        calendar.render();
    });


    document.addEventListener('DOMContentLoaded', function() {
        const submitButton = document.getElementById('submit-review');
        const eventStatus = "{{ $event->status }}";
        const eventEndDate = "{{ $event->end_date }}";
        const currentDate = new Date();

        // Vérification des conditions : L'événement doit être réservé et terminé
        const canSubmitReview = eventStatus === 'réservé' && new Date(eventEndDate) < currentDate;

        if (canSubmitReview) {
            // Si l'utilisateur peut soumettre, on active le bouton
            submitButton.disabled = false;
        } else {
            // Sinon, on garde le bouton désactivé
            submitButton.disabled = true;
        }
    });
</script>
<!-- Ajout du style CSS pour personnaliser le calendrier -->
<style>
    #calendar {
        max-height: 800px;
        margin: 0 auto;
    }

    .fc-event-title {
        font-weight: bold;
        font-size: 1rem;
    }

    .fc-daygrid-day-number {
        font-size: 1.2rem;
    }

    .fc-event {
        font-size: 1rem;
        padding: 5px;
        border-radius: 5px;
    }

    .fc-event.occupied {
        background-color: #FF5733 !important;
        /* Couleur spécifique pour les événements occupés */
        border-color: #FF5733 !important;
    }

    .fc-toolbar-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .fc-button-primary {
        background-color: #0891B2;
        border-color: #0891B2;
        color: white;
    }
</style>
