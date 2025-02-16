@props([

    'hall' => null // Par défaut, null si aucune donnée n'existe
])

<div class="container mx-auto p-4">

    <form action="{{ route('HallPictures.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="hall_id" value="{{ $hall->id ?? 1 }}"> <!-- ID dynamique -->

        <div class="mb-4">
            <label for="images" class="block text-lg font-semibold text-gray-700 mb-2">Sélectionner des images</label>
            <input type="file" id="images" name="images[]" multiple
                class="block w-full text-sm text-gray-700 border p-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                onchange="previewImages(event)">
        </div>

        <!-- Zone d'aperçu des images -->
        <div id="image-preview-container" class="grid grid-cols-3 gap-4 mt-4"></div>

        <button type="submit"
            class="px-4 py-2 mt-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
            📤 Envoyer
        </button>
    </form>

</div>

<script>
    function previewImages(event) {
        const previewContainer = document.getElementById('image-preview-container');
        previewContainer.innerHTML = ''; // Réinitialiser les aperçus

        const files = event.target.files;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgContainer = document.createElement('div');
                imgContainer.classList.add('relative', 'overflow-hidden', 'rounded-lg', 'shadow-md');

                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('object-cover', 'w-full', 'h-40', 'rounded-lg');

                // Bouton de suppression
                const deleteButton = document.createElement('span');
                deleteButton.textContent = '✖';
                deleteButton.classList.add('absolute', 'top-2', 'right-2', 'bg-red-500', 'text-white',
                    'text-sm', 'rounded-full', 'w-6', 'h-6', 'flex', 'items-center', 'justify-center', 'cursor-pointer', 'hover:bg-red-700');

                deleteButton.onclick = () => {
                    imgContainer.remove(); // Supprime l'image affichée
                };

                imgContainer.appendChild(img);
                imgContainer.appendChild(deleteButton);
                previewContainer.appendChild(imgContainer);
            };

            reader.readAsDataURL(file);
        }
    }
</script>
