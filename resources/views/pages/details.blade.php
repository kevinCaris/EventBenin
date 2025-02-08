<x-guest-layout>
    <div class="  sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
 <!-- Hero Section -->
 <section class="relative w-full h-[500px] flex items-center text-left justify-center bg-cover bg-center" style="background-image: url('{{ asset('images/detail.png') }}');">

</section>
<header class="bg-white shadow-md sticky my-5">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">

        <!-- Navigation -->
        <nav>
            <ul class="flex space-x-6 text-primary text-xl">
                <li><a href="#galerie" class="hover:text-blue-600">Galerie</a></li>
                <li><a href="#presentation" class="hover:text-blue-600">Présentation</a></li>
                <li><a href="#tarification" class="hover:text-blue-600">Tarifs</a></li>
                <li><a href="#equipements" class="hover:text-blue-600">Equipements</a></li>

            </ul>
        </nav>

        <!-- Bouton Contacter & Téléphone -->
        <div class="flex items-center space-x-4">
            <a href="#contact" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Contacter</a>

            <!-- Dropdown Téléphone -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center text-gray-700 hover:text-blue-600">
                    <i class="fas fa-phone text-xl"></i>
                </button>

                <!-- Contenu du dropdown -->
                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 z-10  w-64 bg-white shadow-lg rounded-lg p-4 text-sm text-gray-800 border border-gray-200">
                    <p class="font-semibold">Coordonnées</p>
                    <p class="text-gray-600 text-xs">Lors de votre appel, comme notre service est gratuit, n'oubliez surtout pas de signaler au prestataire que vous appelez de la part de {{ $hall->company->title }}.</p>
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
    <div class="py-12 text-lg flex  gap-2">
        <div class="max-full py-5 px-6 flex gap-5">
            <!-- Header -->

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-8 py-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Details de la salle') }}
                    </h2>
                </div>
                <!-- Galerie d'images -->
                <div class="container mx-auto px-4 py-8" id="galerie">
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
                </div>

                {{-- <div class="container mx-auto px-4 py-8">
                    <div class="relative">
                    @if ($hall->pictures->isNotEmpty())
                        <!-- Image principale -->
                        <div class="main-image mb-4">
                            <img src="{{ asset('storage/' . $hall->pictures->first()->url) }}" alt="Image principale"
                                id="mainImage" class="w-full h-96 object-cover rounded-lg shadow-lg">
                        </div>

                        <!-- Vignettes -->
                        <div class="flex justify-center space-x-4">
                            @foreach ($hall->pictures as $picture)
                                <img src="{{ asset('storage/' . $picture->url) }}" alt="Image {{ $picture->id }}"
                                    class="thumbnail w-24 h-24 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-blue-500"
                                    onclick="changeImage('{{ asset('storage/' . $picture->url) }}')">
                            @endforeach
                        </div>
                    @else
                        <p>Aucune image disponible.</p>
                    @endif
                </div>
            </div> --}}
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
                <!-- Tarification par type d'événement -->
                <div class="my-6">
                    <h3 class="text-2xl font-semibold text-stone-600 mb-4">Tarification par type d'événement</h3>
                    <div class="grid lg:grid-cols-3 sm:grid-cols-2 md:grid-cols-2 gap-5" id="pricing-list">
                        @foreach ($hall->events as $event)
                            <div class="border rounded-lg p-4 mb-4 pricing-block">
                                <h4 class="font-semibold text-xl text-stone-600">{{ $event->title }}</h4>
                                <hr class="my-2">
                                @foreach ($event->eventTypePrices as $key => $eventTypePrice)
                                    <p
                                        class="text-blue-500 pricing-item @if ($key >= 2) hidden @endif">
                                        À partir de {{ $eventTypePrice->price }}€
                                    </p>
                                @endforeach
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
                    <button id="toggle-equipments" class="mt-2 text-blue-500" onclick="toggleEquipments()">Voir plus
                        <i class="fas fa-caret-down"></i></button>
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

                            </div>
                        </div>
                    </div>

                </div>

                {{-- <x-demande-evenement/> --}}

            </div>
        </div>
    </div>
    </div>


</x-guest-layout>
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

                // Correction : Forcer la mise à jour après affichage
                setTimeout(() => {
                    map.invalidateSize();
                }, 300);
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
