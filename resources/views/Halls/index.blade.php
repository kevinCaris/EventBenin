
@php
    use App\Enums\StatusHallEnum;
@endphp
<x-dashboard-layout>
    {{-- <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
                <h1 class="text-2xl font-bold">Voila la liste de vos salles</h1>
            </div>
        </div>
    </div> --}}
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
                    <div class="flex justify-between items-center my-6">
                        <h3 class="text-lg font-medium text-gray-700">Liste des Salles</h3>
                        <a href="{{ route('halls.create') }}"
                            class="px-4 py-2 bg-primary text-white rounded hover:bg-primary">
                            <i class="fas fa-plus mr-2"></i>Nouvelle Salle
                        </a>
                    </div>

                    <div class="mb-4">
                        <div class="flex space-x-2 justify-between">
                            <div class="flex flex-col w-1/4">
                                <label for="filterCriteria" class="block text-sm font-medium text-gray-700">Critère de
                                    recherche</label>
                                <select id="filterCriteria" class="px-4 py-2 border rounded-md ">
                                    <option value="title">Titre</option>
                                    <option value="description">Description</option>
                                    <option value="capacity">Capacité</option>
                                    <option value="price">Prix</option>
                                    <option value="address">Adresse</option>
                                    <option value="status">Statut</option>
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
                                        Title
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Capacity
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        price
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Adresse
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($halls as $hall)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap" data-title="{{ $hall->title }}">
                                            <div class="text-sm text-gray-900">{{ $hall->title }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-description="{{ $hall->description }}">
                                            <div class="text-sm text-gray-900">
                                                {{ Str::words($hall->description, 4, '...') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-capacity="{{ $hall->capacity }}">
                                            <div class="text-sm text-gray-900">{{ $hall->capacity }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-price="{{ $hall->price }}">
                                            <div class="text-sm text-gray-900">{{ $hall->price }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-address="{{ $hall->address }}">
                                            <div class="text-sm text-gray-900">
                                                {{ str::words($hall->address, 4, '...') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-title="{{ $hall->status }}">
                                            @if ($hall->status == StatusHallEnum::AVAILABLE)
                                                <span class="text-green-500">
                                                    <i class="fas fa-check-circle"></i> {{ __('Available') }}
                                                </span>
                                            @else
                                                <span class="text-red-500">
                                                    <i class="fas fa-times-circle"></i> {{ __('UnAvailable') }}
                                                </span>
                                            @endif
                                        </td>
                                        {{-- <div class="text-sm text-gray-900">{{ $hall->status }}</div> --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex space-x-2">

                                                <a href="{{ route('halls.show', $hall) }}"
                                                    class="px-3 py-2 bg-primary text-white text-sm font-medium rounded hover:bg-primary transition"
                                                    wire:navigate>
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('halls.edit', $hall) }}"
                                                    class="px-3 py-2 bg-green-500 text-white text-sm font-medium rounded hover:bg-green-600 transition"
                                                    wire:navigate>
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>

                                                <x-confirmationmodal
                                                :title="'Supprimer la salle'"
                                                :message="'Êtes-vous sûr de vouloir supprimer cette salle ? Cette action est irréversible.'"
                                                :route="route('halls.destroy', $hall)"
                                                 >
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
                        {{ $halls->links() }}
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
