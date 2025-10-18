<x-dashboard-layout>
    <div class="container mx-auto p-6">
        <div class="my-6" id="avis">
            <!-- Titre avec une icône -->
            <h2 class="text-2xl font-semibold text-stone-600 mb-6 flex items-center">

                Avis des clients
            </h2>

            @if ($reviews->isEmpty())
                <p class="text-center text-lg text-gray-600">Aucun avis pour cette salle.</p>
            @else
                <div class="space-y-6">
                    @foreach ($reviews as $review)
                        <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                            <div class="flex items-center mb-3">
                                <div class="flex-shrink-0">
                                    <img class="w-10 h-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($review->nom ?? 'Anonyme') }}" alt="Avatar">
                                </div>
                                <div class="ml-3">
                                    <strong class="text-lg font-semibold text-gray-800">{{ $review->nom ?? 'Utilisateur anonyme' }}</strong>
                                    <p class="text-sm text-gray-500">{{ $review->created_at->format('d/m/Y') }}</p>
                                </div>

                            </div>
                            <p class="text-sm text-gray-600">Salle : <strong>{{ $review->hall->title }}</strong></p>
                            <div class="flex items-center mb-3">
                                <span class="text-yellow-500">
                                    @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star {{ $i <= $review->note ? 'text-yellow-500' : 'text-gray-300' }}"></i>
                                    @endfor
                                </span>
                                <span class="ml-2 text-gray-600">Note : {{ $review->note }}/5</span>
                            </div>
                            <p class="text-gray-700">{{ $review->commentaire }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination avec un design moderne -->
                <div class="flex justify-center mt-6">
                    <div class="flex items-center space-x-2">
                        {{ $reviews->links('pagination::tailwind') }} <!-- Utilisation du style Tailwind pour la pagination -->
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-dashboard-layout>
