@props([
    'title' => 'Créer ou Modifier',
    'route', // Doit être passé dynamiquement
    'method' => 'POST', // POST par défaut pour compatibilité
    'buttonText' => 'Enregistrer',
    'user' => null, // Par défaut, null si aucune donnée n'existe
])

<div x-data="{ open: false }">
    <!-- Bouton pour ouvrir la modale -->
    <button @click="open = true"
        {{ $attributes->merge(['class' => 'px-3 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition']) }}>
        {{ $slot }}
    </button>

    <!-- Modale -->
    <div x-show="open" class="fixed inset-0 z-50 flex items-center  text-left justify-center bg-black bg-opacity-50 p-4 "
        style="display: none;">
        <!-- Contenu de la modale -->
        <div class="bg-white  max-w-full w-2/4 rounded-lg shadow-lg p-6 space-y-4">
            <div class="flex items-center justify-between">
                <!-- Titre -->
                <h2 class="text-xl font-semibold text-gray-800">{{ $title }}</h2>
                <!-- Bouton Annuler -->
                <button @click="open = false" type="button" <i class="fas fa-times"></i>
                </button>
            </div>
            <hr>

            <!-- Formulaire -->
            <form action="{{ $route }}" method="POST">
                @csrf
                @if ($method)
                    @method($method)
                @endif
                <div class="grid grid-cols-2 gap-4" <!-- Champ pour le titre -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="name" id="name" class="w-full px-3 py-2 border-gray-300 rounded-md"
                            value="{{ old('name', $user->name ?? '') }}" required placeholder="Bonie">
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="firstname" class="block text-sm font-medium text-gray-700">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="w-full px-3 py-2 border-gray-300 rounded-md" placeholder="Ange"
                            value="{{ old('firstname', $user->firstname ?? '') }}" required placeholder="Bonie">
                        @error('firstname')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="lastname" class="block text-sm font-medium text-gray-700">LastName</label>
                        <input type="text" name="lastname" id="lastname" class="w-full px-3 py-2 border-gray-300 rounded-md" placeholder="Doe"
                            value="{{ old('lastname', $user->lastname ?? '') }}" required placeholder="Doe">
                        @error('lastname')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input
                         type="email"
                          name="email"
                         id="email"
                         class="w-full px-3 py-2 border-gray-300 rounded-md"
                            value="{{ old('email', $user->email ?? '') }}" required placeholder="example@company.com">
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-md"
                        value="{{ old('password', $user->password ?? '') }}" required>
                    @error('password')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div> --}}
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone number</label>
                        <input type="tel" name="phone" id="phone"
                        class="w-full px-3 py-2 border-gray-300 rounded-md"
                            value="{{ old('phone', $user->phone ?? '') }}" required placeholder="e.g. +(12)3456 789">
                        @error('phone')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Rôle</label>
                        <select name="role" id="role" class="w-full px-3 py-2 border-gray-300 rounded-md" required>
                            <option value="" disabled {{ old('role', $user->role ?? '') === null ? 'selected' : '' }}>Sélectionnez un rôle</option>
                            @foreach (App\Enums\RoleEnum::cases() as $role)
                                <option value="{{ $role->value }}"
                                    {{ old('role', $user->role ?? '') === $role->value ? 'selected' : '' }}>
                                    {{ $role->value }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>




                <!-- Boutons -->
                <div class="flex justify-end gap-4 mt-4">

                    <!-- Bouton Enregistrer -->
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition">
                        {{ $buttonText }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
