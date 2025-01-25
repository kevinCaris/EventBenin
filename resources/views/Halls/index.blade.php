
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
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            <i class="fas fa-plus mr-2"></i>Nouvelle Salle
                        </a>
                    </div>
                    <div class="overflow-x-auto">
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
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $hall->title }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ Str::words($hall->description, 4, '...') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $hall->capacity }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $hall->price }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ str::words($hall->address, 4, '...') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($hall->status == StatusHallEnum::AVAILABLE)
                                                <span class="text-green-500">
                                                    <i class="fas fa-check-circle"></i> {{ __('Available') }}
                                                </span>
                                            @else
                                                <span class="text-red-500">
                                                    <i class="fas fa-times-circle"></i> {{ __('Not Available') }}
                                                </span>
                                            @endif
                                        </td>
                                        {{-- <div class="text-sm text-gray-900">{{ $hall->status }}</div> --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex space-x-2">

                                                <a href="{{ route('halls.show', $hall) }}"
                                                    class="px-3 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600 transition"
                                                    wire:navigate>
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('halls.edit', $hall) }}"
                                                    class="px-3 py-2 bg-green-500 text-white text-sm font-medium rounded hover:bg-green-600 transition"
                                                    wire:navigate>
                                                    <i class="fas fa-edit"></i>
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
