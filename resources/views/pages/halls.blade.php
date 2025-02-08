
<x-guest-layout>
    <div class="  sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="container mx-auto mt-5 py-12 ">
        <!-- Grille pour afficher chaque salle sur une ligne -->
        <div class="space-y-6">
            @foreach($halls as $hall)
                <div class="flex items-center bg-white shadow-lg rounded-lg overflow-hidden p-5">
                    <!-- Image à gauche -->
                    <div class="w-1/4">
                        <img src="https://www.1001salles.com/images/provider/61067/salle-ocre.webp" alt="Image de la salle" class="w-full object-cover">
                        <!-- Badge d'avis -->
                        {{-- <div class="absolute top-2 right-2 bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">
                            {{ $hall->reviewsCount() }} Avis -
                            {{ number_format($hall->averageRating(), 1) }} / 5
                        </div> --}}
                    </div>

                    <!-- Informations de la salle à droite -->
                    <div class="p-4 w-2/3">
                        <!-- Nom de la salle -->
                        <div class="flex justify-between items-center">
                            <h5 class="text-xl font-semibold text-gray-800">{{ $hall->title }}</h5>
                            @if($hall->status->value === 'available')
                                <span class="text-green-500 font-bold mr-2">Disponible</span>
                            @else
                                <span class="text-red-500 font-bold mr-2">Indisponible</span>
                            @endif

                        </div>


                        <!-- Ville et Adresse -->
                        <p class="text-primary text-lg mt-2  flex gap-3">
                            <strong><i class="fa fa-home text-primary"></i></strong> {{ $hall->city }}
                        </p>

                        <!-- Présentation -->
                        <p class="text-gray-700 mt-3 text-sm">
                            {{ $hall->description }}
                        </p>

                        <!-- Capacité -->
                        <p class="text-gray-700 mt-2">
                            <strong><i class="fa fa-users"></i></strong> {{ $hall->capacity_min}}  - {{ $hall->capacity_max }} personnes
                        </p>

                        <!-- Prix -->
                        <p class="text-gray-800  font-semibold mt-2">
                            <i class="fa fa-arrow-right"></i> Location depuis <strong>  {{ number_format($hall->price_min, 2) }}€- {{ number_format($hall->price_max, 2) }}€ </strong>
                        </p>

                        <!-- Bouton Contact -->
                        <a href="" class="mt-4 inline-block bg-primary text-white text-sm font-semibold py-2 px-4 rounded-lg hover:bg-blue-600">
                           <i class="fa fa-phone"></i> Contacter
                        </a>
                        <a href="{{ route('guest.hall.show', $hall->id) }}"
                            class="mt-4 inline-block bg-primary text-white text-sm font-semibold py-2 px-4 rounded-lg hover:bg-blue-600">
                             <i class="fa fa-eye"></i> Voir la salle
                         </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

{{-- <div class="p-4 bg-gray-100 mb-4 rounded-lg shadow-md">
    <form action="" method="GET">
        <!-- Filtre Ville -->
        <div class="mb-4">
            <label for="city" class="block text-sm font-semibold text-gray-700">Ville</label>
            <select id="city" name="city" class="w-full px-4 py-2 border border-gray-300 rounded-md mt-2">
                <option value="">Toutes les villes</option>
                @foreach($cities as $city)
                    <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                @endforeach
            </select>
        </div>

        <!-- Filtre Capacité -->
        <div class="mb-4">
            <label for="capacity" class="block text-sm font-semibold text-gray-700">Capacité (personnes)</label>
            <input type="range" id="capacity" name="capacity" min="1" max="120" value="{{ request('capacity', 120) }}" class="w-full">
            <p class="text-sm text-gray-600">De 1 à 120 personnes</p>
        </div>

        <!-- Filtre Prix -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-semibold text-gray-700">Prix Min (€)</label>
            <input type="number" id="price" name="price" min="0" value="{{ request('price', 0) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md mt-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600">Filtrer</button>
    </form>
</div> --}}


</x-guest-layout>
