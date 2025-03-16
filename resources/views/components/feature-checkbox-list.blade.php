 <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('featureHalls.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="hall_id" class="block text-sm font-medium text-gray-700">Sélectionner la salle</label>
                            <select id="hall_id" name="hall_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                @foreach($halls as $hall)
                                    <option value="{{ $hall->id }}">{{ $hall->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="feature_ids" class="block text-sm font-medium text-gray-700">Sélectionner les caractéristiques</label>
                            <div class="space-y-2">
                                @foreach($features as $feature)
                                    <div class="flex items-center">
                                        <input type="checkbox" id="feature_{{ $feature->id }}" name="feature_ids[]" value="{{ $feature->id }}" class="mr-2">
                                        <label for="feature_{{ $feature->id }}" class="text-sm">{{ $feature->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
