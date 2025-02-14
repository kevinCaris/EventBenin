<x-guest-layout>
    <div class="container mx-auto my-10 px-4 sm:px-6 lg:px-8" >
        <!-- Titre de la page -->
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Notre Blog</h1>

        <!-- Liste des articles -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Article 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/article1.webp') }}" alt="Image de l'article" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Titre de l'article 1</h2>
                    <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet libero nec metus dictum gravida...</p>
                    <a href="#" class="text-blue-600 mt-4 inline-block hover:underline">Lire l'article</a>
                </div>
            </div>

            <!-- Article 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/article2.webp') }}" alt="Image de l'article" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Titre de l'article 2</h2>
                    <p class="text-gray-600 mt-2">Curabitur euismod nunc et velit aliquam, at placerat lectus interdum. Donec ut bibendum leo...</p>
                    <a href="#" class="text-blue-600 mt-4 inline-block hover:underline">Lire l'article</a>
                </div>
            </div>

            <!-- Article 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/article3.webp') }}" alt="Image de l'article" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Titre de l'article 3</h2>
                    <p class="text-gray-600 mt-2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium...</p>
                    <a href="#" class="text-blue-600 mt-4 inline-block hover:underline">Lire l'article</a>
                </div>
            </div>

            <!-- Article 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/article1.webp') }}" alt="Image de l'article" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Titre de l'article 4</h2>
                    <p class="text-gray-600 mt-2">Vivamus lacinia orci nec dolor vulputate vehicula. Sed euismod felis vitae mauris porttitor sollicitudin...</p>
                    <a href="#" class="text-blue-600 mt-4 inline-block hover:underline">Lire l'article</a>
                </div>
            </div>

            <!-- Article 5 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/article2.webp')  }}" alt="Image de l'article" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Titre de l'article 5</h2>
                    <p class="text-gray-600 mt-2">Aliquam malesuada sem vitae felis tempor, sed aliquam ligula fermentum. Integer sit amet sem id purus...</p>
                    <a href="#" class="text-blue-600 mt-4 inline-block hover:underline">Lire l'article</a>
                </div>
            </div>

            <!-- Article 6 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/article3.webp') }}" alt="Image de l'article" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Titre de l'article 6</h2>
                    <p class="text-gray-600 mt-2">Nam facilisis gravida felis, vel tincidunt felis volutpat vel. Integer ac ante libero. Cras sit amet sollicitudin lorem...</p>
                    <a href="#" class="text-blue-600 mt-4 inline-block hover:underline">Lire l'article</a>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px">
                    <li>
                        <a href="#" class="py-2 px-4 text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Précédent</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-4 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-4 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-4 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">3</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-4 text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</x-guest-layout>
