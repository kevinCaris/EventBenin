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
                        <h3 class="text-lg font-medium text-gray-700">Liste des Types d'Evenements</h3>
                        <x-eventTypeForm title="Créer un nouveau type d'événement" :route="route('eventTypes.store')" method="POST"
                            buttonText="Créer" :eventType="$eventType ?? null">
                            <i class="fas fa-plus mr-2"></i> un nouveau type d'événement
                        </x-eventTypeForm>
                    </div>
                    <p class="mb-4">Filtrer</p>
                    <div class="flex items-center justify-between mb-4">
                        <!-- Champ de recherche -->
                        <input
                            type="text"
                            id="search"
                            placeholder="Rechercher un type d'événement..."
                            class="border border-gray-300 rounded-md px-4 py-2 w-1/3"
                            oninput="filter()"
                        >
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
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($eventTypes as $eventType)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $eventType->title }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <x-eventTypeForm :eventType="$eventType" :title="'Modifier'" :message="'Veuillez remplir les champs ci-dessous.'"
                                                    :route="route('eventTypes.update', $eventType)" :method="'PUT'" :buttonText="'Modifier'">
                                                    <i class="fa-solid fa-pen"></i>
                                                </x-eventTypeForm>
                                                <x-confirmationmodal :title="'Supprimer le type d\'evenement'" :message="'Êtes-vous sûr de vouloir supprimer ce type d\'evenement? Cette action est irréversible.'"
                                                    :route="route('eventTypes.destroy', $eventType)">
                                                    <i class="fas fa-trash"></i> <!-- Icône du bouton -->
                                                </x-confirmationmodal>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Aucun evenement
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4" wire:abort>
                        {{ $eventTypes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>
<script>
    function filter() {
        const query = document.getElementById('search').value.toLowerCase();
        const rows = document.querySelectorAll('#table tbody tr');

        rows.forEach(row => {
            const title = row.querySelector('td:first-child').textContent.toLowerCase();
            if (title.includes(query)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
