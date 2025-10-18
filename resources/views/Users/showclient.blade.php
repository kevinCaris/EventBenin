<?php
$auth = auth()->user();
?>
<x-guest-layout>
    <div class="max-w-2xl mx-auto py-20 px-6 grid grid-cols-1 col-span-2
        @if ($auth->isOwner())
           lg:grid-cols-2
        @endif  gap-8">
        <!-- Colonne Profil Utilisateur -->
        <div class="space-y-6">
            <div class=" shadow-lg  shadow-primary rounded-lg p-6 space-y-4" >
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800">PROFILE</h2>
                    <a href="{{ route('users.edit', $user) }}" class="text-primary">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                </div>
                <div class="flex items-center space-x-6">
                    <img class="w-24 h-24 rounded-lg object-cover" src="{{ asset('storage/' . $user->avatar) }}"
                        alt="User portrait">
                    <div>
                        <h3 class="text-xl font-medium text-gray-800">{{ $user->name }}</h3>
                        <ul class="mt-2 space-y-2 text-gray-600">
                            <li class="flex items-center">
                                <i class="fas fa-user text-gray-500 mr-2"></i>
                                {{ $user->firstname }} {{ $user->lastname }}
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-calendar text-primary mr-2"></i>
                                {{ \Carbon\Carbon::parse($user->birthday)->format('d F Y') }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <p class="text-lg font-semibold text-gray-800">Email</p>
                        <a href="mailto:{{ $user->email }}"
                            class="text-primary hover:text-blue-800">{{ $user->email }}</a>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-800">Adresse</p>
                        <p class="text-gray-600">{{ $user->address ?? 'Non renseignée' }}</p>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-800">Téléphone</p>
                        <p class="text-gray-600">{{ $user->phone ?? 'Non renseigné' }}</p>
                    </div>
                </div>
            </div>
            @if (auth()->check() && auth()->user()->isOwner())
            <div class="bg-white shadow-lg rounded-lg p-6 space-y-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800">Réseaux sociaux</h2>
                    <a href="{{ route('companies.edit', $user->company) }}" class="text-blue-600">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                </div>
                <x-social-account :company="$user->company" />
            </div>
            @endif

        </div>

        <!-- Colonne Entreprise et Réseaux Sociaux -->
        <div class="space-y-8">

            @if (auth()->check() && auth()->user()->isOwner())
                <div class="bg-white shadow-lg rounded-lg p-6 space-y-4">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-semibold text-gray-800">Compagnie</h2>
                        <a href="{{ route('companies.edit', $user->company) }}" class="text-blue-600">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                    </div>
                    <x-show-company :company="$user->company" />
                </div>
            @endif
        </div>
    </div>
</x-guest-layout>
