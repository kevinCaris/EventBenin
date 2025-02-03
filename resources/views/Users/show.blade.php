<?php
    $auth = auth()->user();
?>
<x-dashboard-layout>
    <div class="max-w-7xl @if(auth()->check() && auth()->user()->isOwner())lg:flex @endif justify-center py-12">
        <div class="sm:px-6 lg:px-8 flex-3">
            <div class="grid grid-cols-1 mb-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-4xl ">
                        <a href="{{ route('users.edit', $user) }}" class="px-4 py-2  text-primary align-right"> <i
                                class="fas fa-edit"></i>
                            Modifier</a>
                        <div class="flex items-center space-x-6 my-6">
                            <!-- Image de profil -->
                            <img class="w-24 h-24 rounded-lg" src="{{ asset('storage/' . $user->avatar) }}"
                                alt="User portrait">

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
                                        <i class="fas fa-calendar w-5 h-5 text-primary mr-2"></i>
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
                            <a class="text-primary hover:text-blue-800" href="mailto:example@example.com">
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
            @if (auth()->check() && auth()->user()->isOwner())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg">
                        <div class="flex items-center justify-between my-5">
                            <p class="font-semibold text-gray-800 text-bold text-2xl">Social accounts</p>
                            <a href="{{ route('companies.edit', $user->company) }}"
                                class="px-4 py-2  text-blue-600   align-right"> <i class="fas fa-edit"></i>
                                Modifier</a>
                        </div>
                        <x-social-account :company="$user->company" />
                    </div>
                </div>
            @endIf
        </div>
        @if (auth()->check() && auth()->user()->isOwner())
            <div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg flex-2">
                <div class="flex items-center justify-between my-5">
                    <p class="font-semibold text-gray-800 text-bold text-2xl">Compagnie</p>
                    <a href="{{ route('companies.edit', $user->company) }}"
                        class="px-4 py-2 text-blue-600 align-right">
                        <i class="fas fa-edit"></i>
                        Modifier</a>
                </div>
                <x-show-company :company="$user->company" />
            </div>
        @endif
    </div>

    </div>


</x-dashboard-layout>
