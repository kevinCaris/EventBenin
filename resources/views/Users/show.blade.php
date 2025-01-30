<x-dashboard-layout>
    <div class="max-w-7xl lg:flex justify-center py-12">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-4xl ">
                        <button class="px-4 py-2  text-blue-600 align-right"> <i class="fas fa-edit"></i> Modifier</button>
                        <div class="flex items-center space-x-6 my-6">
                            <!-- Image de profil -->
                            <img class="w-24 h-24 rounded-lg" src="https://demo.themesberg.com/windster-pro/images/users/jese-leos-2x.png" alt="User portrait">

                            <!-- Informations de l'utilisateur -->
                            <div>
                                <!-- Nom complet -->
                                <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>

                                <!-- Liste des informations -->
                                <ul class="mt-2 space-y-2">
                                    <li class="flex items-center text-gray-600">
                                        <i class="fas fa-user w-5 h-5 text-gray-500 mr-2"></i>
                                        {{ $user->firstname }} {{ $user->lastname }}
                                    </li>
                                    <li class="flex items-center text-gray-600">
                                        <i class="fas fa-calendar w-5 h-5 text-blue-600 mr-2"></i>
                                        {{ \Carbon\Carbon::parse($user->birthday)->format('d F Y') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <!-- Email Address -->
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Email Address</p>
                            <a class="text-blue-600 hover:text-blue-800" href="mailto:example@example.com">
                                {{ $user->email }}
                            </a>
                        </div>

                        <!-- Home Address -->
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Home Address</p>
                            <p class="text-gray-600">
                                {{ $user->address ?? 'Not provided' }}
                            </p>
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <p class="text-lg font-semibold text-gray-800">Phone Number</p>
                            <p class="text-gray-600">
                                {{ $user->phone ?? 'Not provided' }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg">
                    <div class="flex items-center justify-between my-5">
                        <p class="font-semibold text-gray-800 text-bold text-2xl">Compagnie</p>
                        <button class="px-4 py-2  text-blue-600   align-right"> <i class="fas fa-edit"></i> Modifier</button>
                    </div>

                     <x-show-company :company="$user->company" />
                </div>
            </div>

    </div>


</x-dashboard-layout>
