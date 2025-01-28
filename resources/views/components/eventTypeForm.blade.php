@props([
    'title' => 'Créer ou Modifier',
    'route', // Doit être passé dynamiquement
    'method' => 'POST', // POST par défaut pour compatibilité
    'buttonText' => 'Enregistrer',
    'eventType' => null // Par défaut, null si aucune donnée n'existe
])

<div x-data="{ open: false }">
    <!-- Bouton pour ouvrir la modale -->
    <button @click="open = true"
        {{ $attributes->merge(['class' => 'px-3 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition']) }}>
        {{ $slot }}
    </button>

    <!-- Modale -->
    <div x-show="open" class="fixed inset-0 z-50 flex items-center  text-left justify-center bg-black bg-opacity-50 p-4"
        style="display: none;">
        <!-- Contenu de la modale -->
        <div class="bg-white w-2/4 max-w-lg rounded-lg shadow-lg p-6 space-y-4">
            <div class="flex items-center justify-between">
                <!-- Titre -->
                <h2 class="text-xl font-semibold text-gray-800">{{ $title }}</h2>
                <!-- Bouton Annuler -->
                <button @click="open = false" type="button"

                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Formulaire -->
            <form action="{{ $route }}" method="POST">
                @csrf
                @if ($method)
                    @method($method)
                @endif

                <!-- Champ pour le titre -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" name="title" id="title" class="w-full px-3 py-2 border-gray-300 rounded-md"
                        value="{{ old('title', $eventType->title ?? '') }}" required>
                    @error('title')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ajoute d'autres champs ici si nécessaire -->

                <!-- Boutons -->
                <div class="flex justify-end gap-4 mt-4">

                    <!-- Bouton Enregistrer -->
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition">
                        {{ $buttonText }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
