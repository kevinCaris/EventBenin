<x-app-layout>
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
                    <div class="flex justify-between items-center mt-8">
                        <h3 class="text-lg font-medium text-gray-700">Liste des Compagnies</h3>
                        <a href="{{ route('companies.create') }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            + Nouvelle Compagnie
                        </a>
                    </div>

                    <di class="overflow-x-auto">
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
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($companies as $company)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $company->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $company->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $company->phone }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex space-x-2">

                                                <a href="{{ route('companies.show', $company) }}"
                                                    class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600 transition"
                                                    wire:navigate>
                                                    Vew
                                                </a>
                                                <a href="{{ route('companies.edit', $company) }}"
                                                    class="px-4 py-2 bg-green-500 text-white text-sm font-medium rounded hover:bg-green-600 transition"
                                                    wire:navigate>
                                                    update
                                                </a>
                                                {{-- <button wire:click="destroy({{ $company->id }})" class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded hover:bg-red-600 transition">
                                                        Supprimer
                                                    </button> --}}
                                                <form action="{{ route('companies.destroy', $company) }}" method="POST"
                                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette compagnie ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                                        Supprimer
                                                    </button>
                                                </form>

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

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
