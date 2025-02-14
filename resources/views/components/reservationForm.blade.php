@props([
    'title' => 'Créer ou Modifier',
    'route', // Doit être passé dynamiquement
    'method' => 'POST', // POST par défaut pour compatibilité
    'buttonText' => 'Enregistrer',
    'hall' => null, // Par défaut, null si aucune donnée n'existe
])

<div x-data="{ open: {{ $errors->any() ? 'true' : 'false' }} }">

    <!-- Bouton pour ouvrir la modale -->
    <button @click="open = true"
        {{ $attributes->merge(['class' => 'px-3 py-2 bg-primary text-white rounded hover:bg-primary transition']) }}>
        {{ $slot }}
    </button>

    <!-- Modale -->
    <div x-show="open" class="fixed inset-0 z-50 flex items-center text-left justify-center bg-black bg-opacity-50 p-4"
        style="display: none;">
        <!-- Contenu de la modale -->
        <div class="bg-white w-2/4 max-w-full rounded-lg shadow-lg p-6 space-y-4">
            <div class="flex items-center justify-between">
                <!-- Titre -->
                <h2 class="text-xl font-semibold text-gray-800">{{ $title }}</h2>
                <!-- Bouton Annuler -->
                <button @click="open = false" type="button">
                    <i class="fas fa-times"></i>
                </button>
            </div>


            @guest
                <div class="mt-4 p-4 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 rounded-lg">
                    <p class="flex items-center"><span class="mr-2">🔒</span> Vous devez être connecté pour envoyer une
                        demande.</p>
                    <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Connectez-vous</a>
                </div>
            @endguest

            @if ($errors->any())
                <div class="m-4 p-5 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                    <p class="font-semibold">Veuillez corriger les erreurs suivantes :</p>
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Formulaire -->
            <form action="{{ $route }}" method="{{ $method }}" class="mt-6 space-y-4">
                @csrf
                <input type="hidden" name="hall_id" value="{{ $hall->id }}">

                <div>
                    <label for="event_type" class="block text-lg font-medium text-gray-700">Type d'événement</label>
                    <input type="text" name="event_type" id="event_type"
                        class="w-full border p-2 rounded-md mt-1 @error('event_type') border-red-500 @enderror"
                        placeholder="Recherchez ou entrez un type d'événement..." list="event-types" required>
                    @error('event_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <datalist id="event-types">
                        <option value="Mariage">
                        <option value="Anniversaire">
                        <option value="Afterwork">
                        <option value="Séminaire">
                        <option value="Concert">
                        <option value="Conférence">
                        <option value="Réunion professionnelle">
                        <option value="Lancement de produit">
                        <option value="Soirée privée">
                        <option value="Exposition">
                    </datalist>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="start_date" class="block text-lg font-medium text-gray-700">Date de début</label>
                        <input type="date" name="start_date" id="start_date"
                            class="mt-1 w-full rounded-lg border-gray-300 shadow-lg focus:ring-blue-500 focus:border-blue-500 @error('start_date') border-red-500 @enderror"
                            value="{{ old('start_date') }}" required>
                        @error('start_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="end_date" class="block text-lg font-medium text-gray-700">Date de fin</label>
                        <input type="date" name="end_date" id="end_date"
                            class="mt-1 w-full rounded-lg border-gray-300 shadow-lg focus:ring-blue-500 focus:border-blue-500 @error('end_date') border-red-500 @enderror"
                            required>
                        @error('end_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="start_time" class="block text-lg font-medium text-gray-700">Heure de début</label>
                        <input type="time" name="start_time" id="start_time"
                            class="mt-1 w-full rounded-lg border-gray-300 shadow-lg focus:ring-blue-500 focus:border-blue-500 @error('start_time') border-red-500 @enderror"
                            required>
                        @error('start_time')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="end_time" class="block text-lg font-medium text-gray-700">Heure de fin</label>
                        <input type="time" name="end_time" id="end_time"
                            class="mt-1 w-full rounded-lg border-gray-300 shadow-lg focus:ring-blue-500 focus:border-blue-500 @error('end_time') border-red-500 @enderror"
                            required>
                        @error('end_time')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="details" class="block text-lg font-medium text-gray-700">Détails de la
                        Réservation</label>
                    <textarea name="details" id="details" rows="4"
                        class="mt-1 w-full rounded-lg border-gray-300 shadow-lg focus:ring-blue-500 focus:border-blue-500 @error('details') border-red-500 @enderror"></textarea>
                    @error('details')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-4 mt-4">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-primary transition">
                        {{ $buttonText }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
