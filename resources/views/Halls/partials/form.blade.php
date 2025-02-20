<form action="{{ $action }}" method="POST" enctype="multipart/form-data" id="hall-form">
    @csrf
    @if ($method ?? false)
        @method($method)
    @endif
    <!-- image principale -->
    <div class="flex items-center justify-center w-full py-8">
        <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 border-2 rounded-lg cursor-pointer ">
            <input id="dropzone-file" type="file" name="image" value="{{ old('image', $hall->image ?? '') }}"
                class="hidden" accept="image/*" onchange="previewImage(event)" />
            <!-- Zone d'affichage de l'image -->
            <div id="image-preview" class="w-full h-64 bg-gray-100 flex items-center justify-center">
                <div class="flex flex-col items-center justify-center pt-5 pb-6 " id="info">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-lg text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                            upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
            </div>
        </label>
        @error('image')
            <span class="text-red-500 text-lg">{{ $message }}</span>
        @enderror
    </div>

    <!-- informations de la salle -->
    <div class="grid lg:grid-cols-2 sm:grid-cols-1 md:grid-cols-1 gap-4">
        <div class="mb-2">
            <label for="title" class="block text-lg font-medium text-gray-700">Titre de salle</label>
            <input type="text" name="title" id="title"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('title', $hall->title ?? '') }}" required>
            @error('title')
                <span class="text-red-500 text-lg">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="capacity" class="block text-lg font-medium text-gray-700">Capacité</label>
            <input type="number" name="capacity" id="capacity"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('capacity', $hall->capacity ?? '') }}" required>
            @error('capacity')
                <span class="text-red-500 text-lg">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block text-lg font-medium text-gray-700">Prix</label>
            <input type="number" name="price" id="price"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('price', $hall->price ?? '') }}" required>
            @error('price')
                <span class="text-red-500 text-lg">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="city" class="block text-lg font-medium text-gray-700">Ville</label>
            <input type="text" name="city" id="city"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('city', $hall->city ?? '') }}" required>
            @error('city')
                <span class="text-red-500 text-lg">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="country" class="block text-lg font-medium text-gray-700">Pays</label>
            <input type="text" name="country" id="country"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('country', $hall->country ?? '') }}" required>
            @error('country')
                <span class="text-red-500 text-lg">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="longitude" class="block text-lg font-medium text-gray-700 ">Longitude</label>
            <input type="number" name="longitude" id="longitude"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('longitude', $hall->longitude ?? '') }}" required>
            @error('longitude')
                <span class="text-red-500 text-lg">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="latitude" class="block text-lg font-medium text-gray-700">Latitude</label>
            <input type="number" name="latitude" id="latitude"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('latitude', $hall->latitude ?? '') }}" required>
            @error('latitude')
                <span class="text-red-500 text-lg">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-4">
            <label for="address" class="block text-lg font-medium text-gray-700">Adresse</label>
            <input type="text" name="address" id="address"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('address', $hall->address ?? '') }}">
            @error('address')
                <span class="text-red-500 text-lg">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- description -->
    <div class="mb-4">
        <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
        <textarea name="description" id="description"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $hall->description ?? '') }}</textarea>
        @error('description')
            <span class="text-red-500 text-lg">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label for="tarification" class="block text-lg font-medium text-gray-700">Tarification</label>
        <textarea name="tarification" id="tarification"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('tarification', $hall->tarification ?? '') }}</textarea>
        @error('tarification')
            <span class="text-red-500 text-lg">{{ $message }}</span>
        @enderror
    </div>

    <!-- Status -->
    <div class="mb-6">
        <label for="status" class="block text-lg font-medium text-gray-700 mb-3">Status</label>
        <div class="flex items-center space-x-4">
            <select name="status" id="status-select"
                class="block w-full p-2 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                <!-- Disponible -->
                <option value="{{ \App\enums\StatusHallEnum::AVAILABLE }}">
                    Disponible
                </option>
                <!-- Indisponible -->
                <option value="{{ \App\enums\StatusHallEnum::UNAVAILABLE }}">
                    Indisponible
                </option>
            </select>
        </div>
        @error('status')
            <span class="text-red-500 text-lg">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="images" class="block text-lg font-semibold text-gray-700 mb-2">Sélectionner des images</label>
        <input type="file" id="images" name="images[]" multiple
            class="block w-full text-sm text-gray-700 border p-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            onchange="previewImages(event)">
    </div>

    <!-- Zone d'aperçu des images -->
    <div id="image-preview-container" class="grid grid-cols-3 gap-4 mt-4"></div>

    <!-- Actions -->
    <div class="text-right mt-6 flex space-x-4">
        <button type="submit" class="px-4 py-2 bg-primary text-white rounded hover:bg-primary">
            @if ($method == 'PUT')
                Modifier
            @else
                Créer
            @endif
        </button>
    </div>
</form>

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('image-preview');
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewContainer.innerHTML =
                    `<img src="${e.target.result}" alt="Image Preview" class="w-full h-64 object-cover rounded-lg">`;
            };
            reader.readAsDataURL(file);
        } else {
            previewContainer.innerHTML = `<p class="text-gray-500">Aucune image sélectionnée</p>`;
        }
    }

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
                    'text-sm', 'rounded-full', 'w-6', 'h-6', 'flex', 'items-center', 'justify-center',
                    'cursor-pointer', 'hover:bg-red-700');

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
