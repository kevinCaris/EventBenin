
                    <!-- Cover Section -->
                    <div class="relative mb-16">
                        <img src="{{ asset('storage/' . $company->cover) }}" alt="Cover"
                            class="w-full h-48 object-cover rounded-t-lg object-center  ">
                        <!-- Profile Image Positioned Over the Cover (slightly tilted) -->
                        <div class="absolute bottom-[-50px] left-4 transform rotate-6">
                            <img src="{{ asset('storage/' . $company->avatar) }}" alt="Avatar"
                                class="w-24 h-24 rounded-full border-4 border-white">
                        </div>
                    </div>
                    <div class="flex items-center justify-between border-b pb-4 ">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">{{ $company->name }}</h1>
                            <p class="text-sm text-gray-500">Fondée le {{ $company->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>

                    <!-- Informations générales -->
                    <div class="mt-6">
                        <h2 class="text-lg font-semibold text-gray-700">Informations générales</h2>
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-8 mt-4">
                            <div>
                                <p class="text-gray-500">Email :</p>
                                <p class="font-medium break-words">{{ $company->email }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Téléphone :</p>
                                <p class="font-medium">{{ $company->phone }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Adresse :</p>
                                <p class="font-medium">{{ $company->address }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Ville :</p>
                                <p class="font-medium">{{ $company->ville }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Code Postal :</p>
                                <p class="font-medium">{{ $company->postal_code }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Pays :</p>
                                <p class="font-medium">{{ $company->pays }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <h2 class="text-lg font-semibold text-gray-700">Description</h2>
                        <p class="mt-2 text-gray-600">{{ $company->description }}</p>
                    </div>

                    {{-- <!-- Social Media Section -->
                    <div class="mt-8 bg-white ">
                        <h2 class="text-xl font-semibold text-gray-800 mb-6">Suivez-nous sur les réseaux sociaux</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            <!-- Facebook -->
                            <a href="{{ $company->facebook_url }}" target="_blank"
                                class="flex items-center space-x-4 text-gray-700 hover:text-blue-600 transition">
                                <i class="fab fa-facebook-square text-2xl text-blue-600"></i>
                                <span
                                    class="font-medium truncate">{{ $company->facebook_url ?? 'Non renseigné' }}</span>
                            </a>

                            <!-- Twitter -->
                            <a href="{{ $company->twitter_url }}" target="_blank"
                                class="flex items-center space-x-4 text-gray-700 hover:text-blue-400 transition">
                                <i class="fab fa-twitter text-2xl text-blue-400"></i>
                                <span
                                    class="font-medium truncate">{{ $company->twitter_url ?? 'Non renseigné' }}</span>
                            </a>

                            <!-- Instagram -->
                            <a href="{{ $company->instagram_url }}" target="_blank"
                                class="flex items-center space-x-4 text-gray-700 hover:text-pink-500 transition">
                                <i class="fab fa-instagram text-2xl text-pink-500"></i>
                                <span
                                    class="font-medium truncate">{{ $company->instagram_url ?? 'Non renseigné' }}</span>
                            </a>

                            <!-- LinkedIn -->
                            <a href="{{ $company->linkedin_url }}" target="_blank"
                                class="flex items-center space-x-4 text-gray-700 hover:text-blue-700 transition">
                                <i class="fab fa-linkedin text-2xl text-blue-700"></i>
                                <span
                                    class="font-medium truncate">{{ $company->linkedin_url ?? 'Non renseigné' }}</span>
                            </a>

                            <!-- YouTube -->
                            <a href="{{ $company->youtube_url }}" target="_blank"
                                class="flex items-center space-x-4 text-gray-700 hover:text-red-500 transition">
                                <i class="fab fa-youtube text-2xl text-red-500"></i>
                                <span
                                    class="font-medium truncate">{{ $company->youtube_url ?? 'Non renseigné' }}</span>
                            </a>

                            <!-- TikTok -->
                            <a href="{{ $company->tiktok_url }}" target="_blank"
                                class="flex items-center space-x-4 text-gray-700 hover:text-black transition">
                                <i class="fab fa-tiktok text-2xl text-black"></i>
                                <span class="font-medium truncate">{{ $company->tiktok_url ?? 'Non renseigné' }}</span>
                            </a>

                            <!-- Website -->
                            <a href="{{ $company->website_url }}" target="_blank"
                                class="flex items-center space-x-4 text-gray-700 hover:text-green-600 transition">
                                <i class="fas fa-globe text-2xl text-green-600"></i>
                                <span
                                    class="font-medium truncate">{{ $company->website_url ?? 'Non renseigné' }}</span>
                            </a>
                        </div>
                    </div> --}}
