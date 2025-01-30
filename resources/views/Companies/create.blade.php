<x-dashboard-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                <div class=" text-gray-900">
                    <h1 class="text-2xl font-bold">Création de la compagnie</h1>
                    {{-- <livewire:companies.create /> --}}
                    @include('companies.partials.form',[
                        'action' => route('companies.store'),
                        'method' => 'POST'
                    ])
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
