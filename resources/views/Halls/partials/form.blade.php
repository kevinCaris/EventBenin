<form action="{{ $action }}" method="POST" enctype="multipart/form-data" id="hall-form">
    @csrf
    @if ($method ?? false)
        @method($method)
    @endif
    <!-- image principale -->
    <div class="flex items-center justify-center w-full py-8">
        <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 border-2  rounded-lg cursor-pointer ">

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
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                            upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <!-- L'image choisie sera affichée ici, si une image est choisie ici -->
            </div>
        </label>
        @error('image')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    {{-- <!-- Groupes d' images -->
    <x-imageGroupe /> --}}
    <!-- information de la salle -->

    <div class="grid lg:grid-cols-2 sm:grid-cols-1 md:grid-cols-1 gap-4">
        <div class="mb-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Titre de salle</label>
            <input type="text" name="title" id="title"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('name', $hall->title ?? '') }}" required>
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="capacity" class="block text-sm font-medium text-gray-700">Capacité</label>
            <input type="number" name="capacity" id="capacity"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('capacity', $hall->capacity ?? '') }}" required>
            @error('capacity')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
            <input type="number" name="price" id="price"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                value="{{ old('price', $hall->price ?? '') }}" required>
            @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
            <input type="text" name="address" id="address"
                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('address', $hall->address ?? '') }}</input>
            @error('address')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $hall->description ?? '') }}</textarea>
        @error('description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- status -->
    <div class="mb-6">
        <label for="status" class="block text-sm font-medium text-gray-700 mb-3">Status</label>
        <div class="flex  items-center space-x-4">
            <input type="hidden" name="status" value="0" />

            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" name="status" id="status-switch" class="sr-only peer" value="1" />
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
            </label>
            <div id="status-label" class="flex  text-gray-700 ">Indisponible</div>
        </div>
        @error('status')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    {{-- <!-- Event Types -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-4">Types d' évènements</h2>
        <p class="text-sm text-gray-500 mb-2">Select un ou plusieurs types d'évènements</p>
        <div class="grid lg:grid-cols-8 sm:grid-cols-4 md:grid-cols-4 gap-4">
            @foreach ($eventTypes as $eventType)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="event_types[]" value="{{ $eventType->id }}"
                        class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded">
                    <span class="text-sm ">{{ $eventType->title }}</span>
                </label>
            @endforeach
        </div>
    </div> --}}
    {{-- <!-- features -->
    <div class="mb-4">
        <h2 class="text-xl font-semibold mb-4">Feature Management</h2>
        <!-- Sélection ou saisie de fonctionnalité -->
        <div class="flex items-center gap-4 mb-6">
            <select id="feature-select" class="w-full p-2 border rounded">
                <option value="" disabled selected>choisir une option</option>
                @foreach ($features as $feature)
                    <option value="{{ $feature->id }}">{{ $feature->title }}</option>
                @endforeach
            </select>
            <button id="add-feature-btn" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Add
            </button>
        </div>

        <!-- Tableau des fonctionnalités -->
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Feature</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody id="feature-table-body">
                <!-- Les lignes des fonctionnalités seront ajoutées ici dynamiquement -->
            </tbody>
        </table>
        <input type="hidden" name="selected_features" id="selected-features">
    </div> --}}

    <!-- Actions -->
    <div class="text-right mt-6 flex space-x-4">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
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
            reader.readAsDataURL(file); // Charger l'image comme une URL de données
        } else {
            previewContainer.innerHTML = `<p class="text-gray-500">Aucune image sélectionnée</p>`;
        }
    }


    const statusSwitch = document.getElementById('status-switch');
    const statusLabel = document.getElementById('status-label');

    // Gestion du changement d'état
    statusSwitch.addEventListener('change', () => {
        if (statusSwitch.checked) {
            statusLabel.textContent = "Disponible"; // Par exemple : Activé
        } else {
            statusLabel.textContent = "Indisponible"; // Par exemple : Désactivé
        }
    });

    const featureSelect = document.getElementById("feature-select");
    const addFeatureBtn = document.getElementById("add-feature-btn");
    const featureTableBody = document.getElementById("feature-table-body");
    let selectedFeatures = []; // Array to store selected features


    let featureCounter = 0; // Compteur pour suivre les IDs des fonctionnalités

    // Fonction pour ajouter une fonctionnalité au tableau
    addFeatureBtn.addEventListener("click", () => {
        const selectedFeature = featureSelect.value;

        if (!selectedFeature) {
            alert("Please select a feature to add.");
            return;
        }

        // Vérifier si la fonctionnalité existe déjà
        const existingFeature = Array.from(featureTableBody.children).find(row => {
            return row.querySelector(".feature-name").textContent === selectedFeature;
        });

        if (existingFeature) {
            alert("This feature is already added.");
            return;
        }
        // Add feature to the array
        selectedFeatures.push(featureSelect.value);

        // Ajouter une nouvelle ligne au tableau
        featureCounter++;
        const row = document.createElement("tr");
        row.innerHTML = `
            <td class="border border-gray-300 px-4 py-2 text-center">${featureCounter}</td>
            <td class="border border-gray-300 px-4 py-2 feature-name">${selectedFeature}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">
                <button class="remove-feature-btn px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                   <i class="fas fa-trash"></i>
                    </button>
            </td>
        `;
        featureTableBody.appendChild(row);

        // Ajouter un gestionnaire d'événement pour le bouton "Remove"
        row.querySelector(".remove-feature-btn").addEventListener("click", () => {
            row.remove();
            updateFeatureCounter();
        });
    });

    // Met à jour les numéros de ligne après la suppression
    function updateFeatureCounter() {
        featureCounter = 0;
        Array.from(featureTableBody.children).forEach(row => {
            featureCounter++;
            row.firstElementChild.textContent = featureCounter;
        });
    }
</script>
