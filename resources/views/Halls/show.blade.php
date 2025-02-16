<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Details de la compagnie') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-8 py-8">
                <div class="p-6 bg-white border-b border-gray-200 flex align-content-center justify-between">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Details de la salle') }}
                    </h2>
                    <a href="{{ route('halls.edit', $hall) }}" class="text-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                </div>
                <!-- Galerie d'images -->
                {{-- <div class="container mx-auto px-4 py-8">
                    <!-- Galerie d'images -->
                    <div class="relative">
                        <!-- Image principale -->
                        <div class="main-image mb-4">
                            <img src="https://media.istockphoto.com/id/686286056/photo/interior-design-of-luxury-apartment-living-room.jpg?s=612x612&w=is&k=20&c=hdikiZ5WxaUlFQOlknNqdhByVR1b5uVi5676uMjW1M0="
                                alt="Image principale" id="mainImage"
                                class="w-full h-96 object-cover rounded-lg shadow-lg">
                        </div>

                        <!-- Vignettes -->
                        <div class="flex justify-center space-x-4">
                            <!-- Vignettes cliquables -->
                            <img src="https://media.istockphoto.com/id/686286056/photo/interior-design-of-luxury-apartment-living-room.jpg?s=612x612&w=is&k=20&c=hdikiZ5WxaUlFQOlknNqdhByVR1b5uVi5676uMjW1M0="
                                alt="Image 1"
                                class="thumbnail w-24 h-16 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-blue-500"
                                onclick="changeImage('https://media.istockphoto.com/id/686286056/photo/interior-design-of-luxury-apartment-living-room.jpg?s=612x612&w=is&k=20&c=hdikiZ5WxaUlFQOlknNqdhByVR1b5uVi5676uMjW1M0=')">
                            <img src="https://cdn.pixabay.com/photo/2013/02/26/01/10/auditorium-86197_1280.jpg"
                                alt="Image 2"
                                class="thumbnail w-24 h-16 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-blue-500"
                                onclick="changeImage('https://cdn.pixabay.com/photo/2013/02/26/01/10/auditorium-86197_1280.jpg')">
                            <img src="https://media.istockphoto.com/id/1164656827/photo/corridor-with-chest-of-drawers-and-city-view.jpg?s=612x612&w=is&k=20&c=_qxv9wwSYoy46U4PNtFUcJ23yAI-yEYjJEF4CZSQ7G8="
                                alt="Image 3"
                                class="thumbnail w-24 h-16 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-blue-500"
                                onclick="changeImage('https://media.istockphoto.com/id/1164656827/photo/corridor-with-chest-of-drawers-and-city-view.jpg?s=612x612&w=is&k=20&c=_qxv9wwSYoy46U4PNtFUcJ23yAI-yEYjJEF4CZSQ7G8=')">
                        </div>
                    </div>
                </div> --}}

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
                        onclick="toggleMap()"><i class="fas fa-map-marker-alt"></i> Voir surla carte</button>
                </div>
                <div id="map" class="h-64 w-full rounded-xl hidden"></div>

                <!-- Capacité et Prix -->
                <div class="my-6">
                    <p class="text-xl text-stone-600 font-semibold mb-5"><strong>Capacité :</strong><span
                            class="text-yellow-500"> {{ $hall->capacity ?? 'Non spécifiée' }} </span>personnes</p>
                    <p class="text-xl text-stone-600 font-semibold"><strong>Prix :</strong><span
                            class="text-yellow-500"> {{ number_format($hall->price, 2, ',', ' ') }} FCFA </span>/
                        heure</p>
                </div>

                <!-- Présentation de la salle -->
                <div class="my-6" id="presentation">
                    <h3 class="text-2xl text-stone-600 font-semibold">Présentation</h3>
                    <p id="description" data-full-text="{{ $hall->description }}" data-expanded="false">
                        {{ Str::limit($hall->description, 150, '...') }}</p>
                    <button onclick="toggleText('description')" class="mt-2 text-blue-500">Voir plus <i
                            class="fas fa-arrow-down"></i>"</button>
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
                    <button id="toggle-equipments" class="mt-2 text-blue-500" onclick="toggleEquipments()">Voir
                        plus
                        <i class="fas fa-caret-down"></i></button>
                </div>

                <!-- Réseaux sociaux -->
                <div class="my-6">
                    <h3 class="text-2xl font-semibold mb-3  text-stone-600 ">Mes réseaux sociaux</h3>
                    <div class="flex space-x-4">
                        <div class="flex items-center gap-3 border p-2 rounded-lg">
                            <i class="fab fa-facebook  text-blue-500"></i>
                            <a href="{{ $hall->company->facebook }}" target="_blank" class="text-primary">Facebook</a>
                        </div>

                        <div class="flex items-center gap-3 border p-2 rounded-lg">
                            <i class="fab fa-twitter text-black-500"></i>
                            <a href="{{ $hall->company->twitter }}" target="_blank" class="text-primary">Twitter</a>
                        </div>

                        <div class="flex items-center gap-3 border p-2 rounded-lg">
                            <i class="fab fa-instagram text-red-500"></i>
                            <a href="{{ $hall->company->instagram }}" target="_blank"
                                class="text-primary">Instagram</a>
                        </div>

                        <div class="flex items-center gap-3 border p-2 rounded-lg">
                            <i class="fab fa-linkedin text-blue-500"></i>
                            <a href="{{ $hall->company->linkedin }}" target="_blank"
                                class="text-primary">LinkedIn</a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Autres sections à ajouter -->


            <!-- Autres sections à ajouter -->

        </div>
    </div>
    </div>

</x-dashboard-layout>
<script>
    function changeImage(imageSrc) {
        document.getElementById('mainImage').src = imageSrc;
    }

    function toggleMap() {
        let mapContainer = document.getElementById('map');
        mapContainer.classList.toggle('hidden');
        if (!mapContainer.classList.contains('hidden')) {
            if (!mapContainer.hasAttribute('data-initialized')) {
                mapContainer.setAttribute('data-initialized', 'true');
                var map = L.map('map').setView([{{ $hall->latitude }}, {{ $hall->longitude }}], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 18,
                }).addTo(map);
                L.marker([{{ $hall->latitude }}, {{ $hall->longitude }}]).addTo(map);
            }
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
</script>
