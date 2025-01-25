@props(['title' => 'Confirmer l\'action', 'message' => 'Êtes-vous sûr de vouloir effectuer cette action ?', 'route'])

<div x-data="{ open: false }">
    <!-- Bouton pour ouvrir la modale -->
    <button @click="open = true"
        {{ $attributes->merge(['class' => 'px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition']) }}>
        {{ $slot }}
    </button>

    <!-- Modale -->
    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4"
        style="display: none;">
        <!-- Contenu de la modale -->
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 space-y-4">
            <!-- Titre -->

            <h2 class="text-xl text-left font-semibold text-gray-800">{{ $title }}</h2>

            <!-- Texte de confirmation -->
            <p class="text-sm text-left text-gray-600 overflow-hidden whitespace-normal">{{ $message }} </p>

            <!-- Boutons -->
            <div class="flex justify-end gap-4">
                <!-- Bouton Annuler -->
                <button @click="open = false"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition">
                    Annuler
                </button>
                <!-- Bouton Supprimer -->
                <form action="{{ $route }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
