<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des Compagnies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-5 shadow-md "
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- <livewire:compagnies.index :companies="$companies" /> --}}
                    <div class="flex justify-between items-center my-6">
                        <h3 class="text-lg font-medium text-gray-700">Liste des Compagnies</h3>
                        <a href="{{ route('companies.create') }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            <i class="fas fa-plus mr-2"></i>Nouvelle Compagnie
                        </a>
                    </div>
                    <!-- filltrage -->
                    <div class="mb-4">
                        <div class="flex space-x-2 justify-between">
                            <div class="flex flex-col w-1/4">
                                <label for="filterCriteria" class="block text-sm font-medium text-gray-700">Critère de
                                    recherche</label>
                                <select id="filterCriteria" class="px-4 py-2 border rounded-md ">
                                    <option value="name">Nom</option>
                                    <option value="Email">Email</option>
                                    <option value="telephone">Téléphone</option>
                                    <option value="ville">Ville</option>
                                    <option value="pays">Pays</option>
                                </select>
                            </div>
                            <div class="flex flex-col  w-1/4">
                                <label for="searchText" class="block text-sm font-medium text-gray-700">Rechercher</label>
                                <input type="text" id="searchText" placeholder="Rechercher..."
                                    class="border border-gray-300 rounded-md px-4 py-2 " oninput="filter()">
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto" id="table">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 ">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Téléphone
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Ville
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pays
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($companies as $company)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap" data-name="{{ $company->name }}">
                                            <div class="text-sm text-gray-900">{{ $company->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-email="{{ $company->email }}">
                                            <div class="text-sm text-gray-900">{{ $company->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-telephone="{{ $company->phone }}">
                                            <div class="text-sm text-gray-900">{{ $company->phone }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-ville="{{ $company->ville }}">
                                            <div class="text-sm text-gray-900">{{ $company->ville }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-pays="{{ $company->pays }}">
                                            <div class="text-sm text-gray-900">{{ $company->pays }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('companies.show', $company) }}"
                                                    class="px-3 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-800 transition"
                                                    wire:navigate>
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('companies.edit', $company) }}"
                                                    class="px-3 py-2 bg-green-500 text-white text-sm font-medium rounded hover:bg-green-800 transition"
                                                    wire:navigate>
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <x-confirmationmodal :title="'Supprimer la compagnie'" :message="'Êtes-vous sûr de vouloir supprimer cette compagnie ? Cette action est irréversible.'"
                                                    :route="route('companies.destroy', $company)">
                                                    <i class="fas fa-trash"></i> <!-- Icône du bouton -->
                                                </x-confirmationmodal>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Aucune compagnie
                                            trouvée</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4" wire:abort>
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
<script>
    function filter() {
        const filterCriteria = document.getElementById('filterCriteria').value; // Champ sélectionné
        const searchText = document.getElementById('searchText').value.toLowerCase(); // Texte de recherche

        const rows = document.querySelectorAll('#table tbody tr');

        rows.forEach(row => {
            const cell = row.querySelector(`[data-${filterCriteria}]`);
            const cellText = cell ? cell.textContent.toLowerCase() : '';
            row.style.display = cellText.includes(searchText) ? '' : 'none';
        });
    }
</script>
