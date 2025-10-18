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
                    <div class="flex justify-between items-center my-6">
                        <h3 class="text-lg font-medium text-gray-700">Tout les utilisateurs</h3>
                        <x-userForm title="Créer un nouveau utilisateur" :route="route('users.store')" method="POST"
                            buttonText="Créer" :user="$user ?? null">
                            <i class="fas fa-plus mr-2"></i> Utilisateur
                        </x-userForm>
                    </div>
                    <!-- filltrage -->
                    <div class="mb-4">
                        <div class="flex space-x-2 justify-between">
                            <div class="flex flex-col w-1/4">
                                <label for="filterCriteria" class="block text-sm font-medium text-gray-700">Critère de
                                    recherche</label>
                                <select id="filterCriteria" class="px-4 py-2 border rounded-md ">
                                    <option value="name">Pseudo</option>
                                    <option value="firstname">Prénom</option>
                                    <option value="lastname">Nom</option>
                                    <option value="email">Email</option>
                                    <option value="phone">Télephone</option>
                                    <option value="role">role</option>

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
                                        Pseudo
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Prénom
                                    </th>
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
                                        Téléphone
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap" data-name="{{ $user->name }}">
                                            <div class="text-sm text-gray-900">{{ $user->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-name="{{ $user->firstname }}">
                                            <div class="text-sm text-gray-900">{{ $user->firstname }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-name="{{ $user->lastname }}">
                                            <div class="text-sm text-gray-900">{{ $user->lastname }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-email="{{ $user->email }}">
                                            <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-phone="{{ $user->phone }}">
                                            <div class="text-sm text-gray-900">{{ $user->phone }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-role="{{ $user->role}}">
                                            <div class="text-sm text-gray-900">{{ $user->role }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <x-userForm :title="'Modifier'" :message="'Veuillez remplir les champs ci-dessous.'" :route="route('users.update', $user)"
                                                    :method="'PUT'" :user="$user" :buttonText="'Modifier'">
                                                    <i class="fa-solid fa-pen"></i>
                                                </x-userForm>
                                                <x-confirmationmodal :title="'Supprimer la compagnie'" :message="'Êtes-vous sûr de vouloir supprimer cette compagnie ? Cette action est irréversible.'"
                                                    :route="route('users.destroy', $user)">
                                                    <i class="fas fa-trash"></i> <!-- Icône du bouton -->
                                                </x-confirmationmodal>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Aucun utilisateur
                                            trouvé</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4" wire:abort>
                        {{ $users->links() }}
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
