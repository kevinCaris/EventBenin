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
            <div class="flex items-center justify-between">
                <h2 class="text-xl text-left font-semibold text-gray-800">{{ $title }}</h2>
                <!-- Bouton Annuler -->
                <button @click="open = false"
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Texte de confirmation -->
            <p class="text-sm text-left text-gray-600 overflow-hidden whitespace-normal">{{ $message }} </p>

            <!-- Boutons -->
            <div class="flex justify-end gap-4">

                <!-- Bouton Supprimer -->
                <form action="{{ $route }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition">
                        <i class="fas fa-trash"></i> supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
