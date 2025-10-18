<x-guest-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                <div class=" text-gray-900">
                    <h1 class="text-2xl font-bold m-5">Création de l'evenement</h1>
                    @include('events.partials.form',[
                        'events'=> $events,
                        'action' => route('events.store'),
                        'method' => 'POST'
                    ])
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
