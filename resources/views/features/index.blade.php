<x-dashboard-layout>
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
                        <h3 class="text-lg font-medium text-gray-700">Liste des caractéristiques</h3>
                        <x-featureForm title="Créer une nouvelle caractéristique" :route="route('features.store')" method="POST"
                            buttonText="Créer" :feature="$feature ?? null">
                            <i class="fas fa-plus mr-2"></i> une nouvelle caractéristique
                        </x-featureForm>
                    </div>
                    <!-- filltrage -->
                    <div class="mb-4">
                        <div class="flex space-x-2 justify-between">
                            <div class="flex flex-col w-1/4">
                                <label for="filterCriteria" class="block text-sm font-medium text-gray-700">Critère de
                                    recherche</label>
                                <select id="filterCriteria" class="px-4 py-2 border rounded-md ">
                                    <option value="title">Nom</option>
                                    <option value="description">Description</option>
                                </select>
                            </div>
                            <div class="flex flex-col  w-1/4">
                                <label for="searchText"
                                    class="block text-sm font-medium text-gray-700">Rechercher</label>
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
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($features as $feature)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap" data-title="title">
                                            <div class="text-sm text-gray-900">{{ $feature->title }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap"
                                            data-description="description">
                                            <div class="text-sm text-gray-900">{{ $feature->description }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <x-featureForm :feature="$feature" :title="'Modifier'" :message="'Veuillez remplir les champs ci-dessous.'"
                                                    :route="route('features.update', $feature)" :method="'PUT'" :buttonText="'Modifier'">
                                                    <i class="fa-solid fa-pen"></i>
                                                </x-featureForm>
                                                <x-confirmationmodal :title="'Supprimer la caractéristique'" :message="'Êtes-vous sûr de vouloir supprimer cette caractéristique? Cette action est irréversible.'"
                                                    :route="route('features.destroy', $feature)">
                                                    <i class="fas fa-trash"></i> <!-- Icône du bouton -->
                                                </x-confirmationmodal>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Aucune
                                            caractéristique
                                            trouvéee
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4" wire:abort>
                        {{ $features->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>
<script>
    function filter() {
    const query = document.getElementById('searchText').value.toLowerCase();
    const criteria = document.getElementById('filterCriteria').value; // Récupération du critère
    const rows = document.querySelectorAll('#table tbody tr');

    rows.forEach(row => {
        // Récupérer la valeur selon le critère choisi
        const cellValue = row.querySelector(`[data-${criteria}]`)?.textContent.toLowerCase();

        if (cellValue && cellValue.includes(query)) {
            row.style.display = ''; // Afficher la ligne
        } else {
            row.style.display = 'none'; // Masquer la ligne
        }
    });
}

</script>
