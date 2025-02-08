<x-dashboard-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- <livewire:compagnies.index :companies="$companies" /> --}}
                    <div class="flex justify-between items-center my-6">
                        <h3 class="text-lg font-medium text-gray-700">Gestion des disponibilités</h3>
                        <x-availabilityForm title="Ajouter une nouvelle disponibilité" :halls="$halls" :route="route('availabilities.store')" method="POST"
                            buttonText="Créer" :availability="$availability ?? null">
                            <i class="fas fa-plus mr-2"></i>ajouter une disponibilité
                        </x-availabilityForm>
                        {{-- <button onclick="document.getElementById('modal-create').classList.remove('hidden')"
                            class="px-4 py-2 bg-primary text-white rounded hover:bg-primary">
                            <i class="fas fa-plus mr-2"></i>ajouter une disponibilité
                        </button>
                        --}}
                    </div>
                    <!-- filltrage -->
                    <div class="mb-4">

                        <label for="hall_id">Choisir une salle :</label>

                        <form method="GET" action="{{ route('availabilities.index') }}"
                            class="flex space-x-2 justify-between">
                            <div class="flex flex-col-2 gap-3">
                                <select name="hall_id" id="hall_id" class="border rounded p-2 ">
                                    @foreach ($halls as $hall)
                                        <option value="{{ $hall->id }}"
                                            {{ request('hall_id') == $hall->id ? 'selected' : '' }}>
                                            {{ $hall->title }}
                                        </option>
                                    @endforeach
                                </select>

                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Voir
                                    Disponibilités</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container mx-auto p-6">

                @if ($hall)
                    <!-- Liste des disponibilités -->
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">Salle</th>
                                <th class="border px-4 py-2">Date début</th>
                                <th class="border px-4 py-2">Date fin</th>
                                <th class="border px-4 py-2">Statut</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($availabilities as $availability)
                                <tr>
                                    <td class="border px-4 py-2">{{ $availability->hall->name }}</td>
                                    <td class="border px-4 py-2">{{ $availability->start_date }}</td>
                                    <td class="border px-4 py-2">{{ $availability->end_date }}</td>
                                    <td class="border px-4 py-2">
                                        <span
                                            class="px-2 py-1 rounded text-white
                                {{ $availability->status === 'disponible' ? 'bg-green-500' : 'bg-red-500' }}">
                                            {{ ucfirst($availability->status) }}
                                        </span>
                                    </td>
                                    <td class="border px-4 py-2 flex space-x-2">
                                        <div class="flex space-x-2">
                                            <x-availabilityForm :availability="$availability" :halls="$halls" :title="'Modifier'"
                                                :message="'Veuillez remplir les champs ci-dessous.'" :route="route('availabilities.update', $availability)" :method="'PUT'" :buttonText="'Modifier'">
                                                <i class="fa-solid fa-pen"></i>
                                            </x-availabilityForm>
                                            <x-confirmationmodal :title="'Supprimer la disponibilité'" :message="'Êtes-vous sûr de vouloir supprimer cette disponibilité? Cette action est irréversible.'"
                                                :route="route('availabilities.destroy', $availability->id)">
                                                <i class="fas fa-trash"></i> <!-- Icône du bouton -->
                                            </x-confirmationmodal>
                                        </div>
                                        <!-- Bouton Modifier -->
                                        {{-- <button onclick="openEditModal({{ $availability }})"
                                class="bg-yellow-500 text-white px-2 py-1 rounded">
                                Modifier
                            </button>

                            <!-- Bouton Supprimer -->
                            <form method="POST" action="{{ route('availabilities.destroy', $availability->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-2 py-1 rounded"
                                    onclick="return confirm('Supprimer cette disponibilité ?')">
                                    Supprimer
                                </button>
                            </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            @endif
        </div>

        <!-- Modal d'ajout -->
        <div id="modal-create" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-bold mb-4">Ajouter une disponibilité</h3>
                <form method="POST" action="{{ route('availabilities.store') }}">
                    @csrf
                    <label class="block mb-2">Salle :</label>
                    <select name="hall_id" class="w-full p-2 border rounded">
                        @foreach ($halls as $hall)
                            <option value="{{ $hall->id }}">{{ $hall->name }}</option>
                        @endforeach
                    </select>

                    <label class="block mt-2">Date début :</label>
                    <input type="datetime-local" name="start_date" class="w-full p-2 border rounded">

                    <label class="block mt-2">Date fin :</label>
                    <input type="datetime-local" name="end_date" class="w-full p-2 border rounded">

                    <label class="block mt-2">Statut :</label>
                    <select name="status" class="w-full p-2 border rounded">
                        <option value="disponible">Disponible</option>
                        <option value="fermé">Fermé</option>
                    </select>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Enregistrer</button>
                </form>
                <button onclick="document.getElementById('modal-create').classList.add('hidden')"
                    class="bg-gray-500 text-white px-4 py-2 rounded mt-2">
                    Annuler
                </button>
            </div>
        </div>

        <!-- Modal de modification -->
        <div id="modal-edit" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-bold mb-4">Modifier la disponibilité</h3>
                <form id="edit-form" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-id" name="id">

                    <label class="block mb-2">Date début :</label>
                    <input type="datetime-local" id="edit-start" name="start_date" class="w-full p-2 border rounded">

                    <label class="block mt-2">Date fin :</label>
                    <input type="datetime-local" id="edit-end" name="end_date" class="w-full p-2 border rounded">

                    <label class="block mt-2">Statut :</label>
                    <select id="edit-status" name="status" class="w-full p-2 border rounded">
                        <option value="disponible">Disponible</option>
                        <option value="fermé">Fermé</option>
                    </select>

                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded mt-4">Modifier</button>
                </form>
                <button onclick="document.getElementById('modal-edit').classList.add('hidden')"
                    class="bg-gray-500 text-white px-4 py-2 rounded mt-2">
                    Annuler
                </button>
            </div>
        </div>

        <script>
            function openEditModal(availability) {
                document.getElementById('modal-edit').classList.remove('hidden');
                document.getElementById('edit-id').value = availability.id;
                document.getElementById('edit-start').value = availability.start_date.replace(' ', 'T');
                document.getElementById('edit-end').value = availability.end_date.replace(' ', 'T');
                document.getElementById('edit-status').value = availability.status;
                document.getElementById('edit-form').action = `/availabilities/${availability.id}`;
            }
        </script>
</x-dashboard-layout>
