<div class="container mx-auto p-4">

    <div class="mb-4 ">
        <label for="images" class="block text-lg font-semibold text-gray-700 mb-2">Sélectionner des images</label>
        <input type="file" id="images" name="images[]" multiple
            class="block w-full text-sm text-gray-700 border p-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            onchange="previewImages(event)">
    </div>
    <div id="image-preview-container" class="grid grid-cols-6 gap-4 mt-4">
        <!-- Les aperçus des images sélectionnées s'afficheront ici -->
    </div>
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
                imgContainer.classList.add('relative', 'overflow-hidden', 'rounded-lg');

                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('object-cover', 'w-full', 'h-20', 'rounded-lg', 'shadow-lg');

                // Créer la croix pour supprimer l'image
                const deleteButton = document.createElement('span');
                deleteButton.textContent = '✖';
                deleteButton.classList.add('absolute', 'top-2', 'right-2', 'text-white', 'text-xl', 'bg-red-500',
                    'rounded-full', 'p-1', 'cursor-pointer');
                deleteButton.onclick = () => {
                    imgContainer.remove(); // Supprimer l'image quand on clique sur la croix
                };

                imgContainer.appendChild(img);
                imgContainer.appendChild(deleteButton);
                previewContainer.appendChild(imgContainer);
            };

            reader.readAsDataURL(file);
        }
    }
</script>
