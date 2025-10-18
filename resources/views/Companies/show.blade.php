<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Details de la compagnie') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg">
                    <x-show-company :company="$company" />
                    <!-- Actions -->
                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('companies.edit', $company) }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-primary">
                            Modifier
                        </a>
                        <form action="{{ route('companies.destroy', $company) }}" method="POST"
                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette compagnie ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                Supprimer
                            </button>
                        </form>
                        <a href="{{ route('companies.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Retour
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>
