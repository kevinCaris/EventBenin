@props([
    'title' => 'Créer ou Modifier',
    'route', // Doit être passé dynamiquement
    'method' => 'POST', // POST par défaut pour compatibilité
    'buttonText' => 'Enregistrer',
    'availability' => null ,// Par défaut, null si aucune donnée n'existe
    'halls' => null,
])

<div x-data="{ open: false }">
    <!-- Bouton pour ouvrir la modale -->
    <button @click="open = true"
        {{ $attributes->merge(['class' => 'px-3 py-2 bg-blue-500 text-white rounded hover:bg-primary transition']) }}>
        {{ $slot }}
    </button>

    <!-- Modale -->
    <div x-show="open" class="fixed inset-0 z-50 flex items-center  text-left justify-center bg-black bg-opacity-50 p-4"
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
            <!-- Formulaire -->
            <form  action="{{ $route }}">
                @csrf
                @if ($method && $method != 'POST')
                @method($method)
                <input type="hidden" name="id" value="{{ $availability->id }}">
                @endif
                @if ($method == 'POST')

                <label class="block mb-2">Salle </label>
                <select name="hall_id" class="w-full p-2 border rounded">
                    @foreach($halls as $hall)
                     <option value="{{ $hall->id }}">{{ $hall->title }}</option>
                    @endforeach
                </select>
                @endif

                <label class="block mt-2">Date début </label>
                <input type="datetime-local" name="start_date" class="w-full p-2 border rounded" value="{{ old('start_date', $availability->start_date ?? '') }}">

                <label class="block mt-2">Date fin </label>
                <input type="datetime-local" name="end_date" class="w-full p-2 border rounded" value="{{ old('end_date', $availability->end_date ?? '') }}">

                <label class="block mt-2">Statut </label>
                <select name="status" class="w-full p-2 border rounded">
                    <option value="{{ \App\Enums\StatusAvailabilityEnum::AVAILABLE }}">Disponible</option>
                    <option value="{{ \App\Enums\StatusAvailabilityEnum::RESERVED }}">Reservé</option>
                    <option value="{{ \App\Enums\StatusAvailabilityEnum::CLOSED }}">Fermé</option>
                </select>
                <div class="flex justify-end gap-4 mt-4">

                    <!-- Bouton Enregistrer -->
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-primary transition">
                        {{ $buttonText }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
