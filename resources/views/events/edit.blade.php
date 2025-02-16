<x-dashboard-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Modification de l\'evenement') }}
                    </h2>
                </div>
                @if ($errors->any())
                    <div class="m-4 p-5 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                        <p class="font-semibold">Veuillez corriger les erreurs suivantes :</p>
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('events.update', $event) }}" method="POST" class="mt-6 space-y-4">
                    @csrf
                    @method('PUT') <!-- Cette ligne indique que la méthode HTTP est PUT -->
                    <input type="hidden" name="hall_id" value="{{ $event->hall_id }}">

                    <!-- Type d'événement -->
                    <div>
                        <label for="event_type" class="block text-lg font-medium text-gray-700">Type d'événement</label>
                        <input
                            type="text"
                            name="event_type"
                            id="event_type"
                            class="w-full border p-2 rounded-md mt-1 @error('event_type') border-red-500 @enderror"
                            placeholder="Recherchez ou entrez un type d'événement..."
                            list="event-types"
                            value="{{ old('event_type', $event->event_type) }}"
                            required
                        >
                        @error('event_type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <datalist id="event-types">
                            <option value="Mariage">
                            <option value="Anniversaire">
                            <option value="Afterwork">
                            <option value="Séminaire">
                            <option value="Concert">
                            <option value="Conférence">
                            <option value="Réunion professionnelle">
                            <option value="Lancement de produit">
                            <option value="Soirée privée">
                            <option value="Exposition">
                        </datalist>
                    </div>

                    <!-- Dates et heures -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="start_date" class="block text-lg font-medium text-gray-700">Date de début</label>
                            <input
                                type="date"
                                name="start_date"
                                id="start_date"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-lg focus:ring-blue-500 focus:border-blue-500 @error('start_date') border-red-500 @enderror"
                                value="{{ old('start_date', $event->start_date) }}"
                                required
                            >
                            @error('start_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="end_date" class="block text-lg font-medium text-gray-700">Date de fin</label>
                            <input
                                type="date"
                                name="end_date"
                                id="end_date"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-lg focus:ring-blue-500 focus:border-blue-500 @error('end_date') border-red-500 @enderror"
                                value="{{ old('end_date', $event->end_date) }}"
                                required
                            >
                            @error('end_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="start_time" class="block text-lg font-medium text-gray-700">Heure de début</label>
                            <input
                                type="time"
                                name="start_time"
                                id="start_time"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-lg focus:ring-blue-500 focus:border-blue-500 @error('start_time') border-red-500 @enderror"
                                value="{{ old('start_time', $event->start_time) }}"
                                required
                            >
                            @error('start_time')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="end_time" class="block text-lg font-medium text-gray-700">Heure de fin</label>
                            <input
                                type="time"
                                name="end_time"
                                id="end_time"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-lg focus:ring-blue-500 focus:border-blue-500 @error('end_time') border-red-500 @enderror"
                                value="{{ old('end_time', $event->end_time) }}"
                                required
                            >
                            @error('end_time')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Détails de la Réservation -->
                    <div>
                        <label for="details" class="block text-lg font-medium text-gray-700">Détails de la Réservation</label>
                        <textarea
                            name="details"
                            id="details"
                            rows="4"
                            class="mt-1 w-full rounded-lg border-gray-300 shadow-lg focus:ring-blue-500 focus:border-blue-500 @error('details') border-red-500 @enderror"
                        >{{ old('details', $event->details) }}</textarea>
                        @error('details')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Montant -->
                    <div>
                        <label for="amount" class="block text-lg font-medium text-gray-700">Montant</label>
                        <input
                            type="number"
                            name="amount"
                            id="amount"
                            class="w-full border p-2 rounded-md mt-1 @error('amount') border-red-500 @enderror"
                            placeholder="Entrez le montant"
                            value="{{ old('amount', $event->amount) }}"
                            required
                        >
                        @error('amount')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Statut -->
                    <div>
                        <label for="status" class="block text-lg font-medium text-gray-700">Statut</label>
                        <select
                            name="status"
                            id="status"
                            class="w-full border p-2 rounded-md mt-1 @error('status') border-red-500 @enderror"
                            required
                        >
                            <option value="0" {{ old('status', $event->status) == 0 ? 'selected' : '' }}>En attente</option>
                            <option value="1" {{ old('status', $event->status) == 1 ? 'selected' : '' }}>Confirmé</option>
                            <option value="2" {{ old('status', $event->status) == 2 ? 'selected' : '' }}>Annulé</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-primary text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                        Modifier l'événement
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-dashboard-layout>
