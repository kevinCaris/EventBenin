<x-dashboard-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold">Création de la salle</h1>
                    @include('halls.partials.form',[
                        'action' => route('halls.store'),
                        'method' => 'POST'
                    ])
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
