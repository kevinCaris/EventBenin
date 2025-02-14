<x-guest-layout>
    <x-slot name="header">

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-primary shadow-sm sm:rounded-lg text-white" >
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-white leading-tight mb-6">
                        {{ __('Edition de profil') }}
                    </h2>
                    <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="m-4">
                            <label for="avatar" class="block text-sm font-medium text-white text-xl">Photo de
                                profil</label>
                            <input type="file" name="avatar" id="avatar"
                                class="mt-1 p-2 block w-full rounded-lg border-gray-300 "
                                onchange="previewImages(event)">

                            <div id="image-preview-container" class="grid grid-cols-6 gap-4 mt-4">
                                <!-- Les aperçus des images sélectionnées s'afficheront ici -->
                            </div>

                            @error('avatar')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </d>
                        <div class="grid grid-cols-3   gap-5">
                        <!-- pseudo -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-white text-xl">Pseudo</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('name', $user->name ?? '') }}" required>
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- firstname -->
                        <div class="mb-4">
                            <label for="firstname" class="block text-sm font-medium text-white text-xl">Prenom*</label>
                            <input type="text" name="firstname" id="firstname"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('firstname', $user->firstname ?? '') }}" required>
                            @error('firstname')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- lastname -->
                        <div class="mb-4">
                            <label for="lastname" class="block text-sm font-medium text-white text-xl">Nom*</label>
                            <input type="text" name="lastname" id="lastname"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('lastname', $user->lastname ?? '') }}" required>
                            @error('lastname')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- gender -->
                        <div class="mb-4">
                            <label for="gender" class="block text-sm font-medium text-white text-xl">Genre</label>
                            <select name="gender" id="gender"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach (App\Enums\GenderEnum::cases() as $gender)
                                    <option value="{{ $gender->value }}" {{ $user->gender == $gender->value ? 'selected' : '' }}>
                                        @if ($gender->value == 'male')
                                           Homme
                                        @elseif ($gender->value == 'female')
                                            Femme
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('gender')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-white text-xl">Email</label>
                            <input type="email" name="email" id="email"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('email', $user->email ?? '') }}" required>
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- birthday -->
                        <div class="mb-4">
                            <label for="birthday" class="block text-sm font-medium text-white text-xl">Date de naissance</label>
                            <input type="date" name="birthday" id="birthday"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('birthday', !empty($user->birthday) && strtotime($user->birthday) ? \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') : '') }}" required>
                            @error('birthday')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- phone -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-white text-xl">Téléphone</label>
                            <input type="text" name="phone" id="phone"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('phone', $user->phone ?? '') }}">
                            @error('phone')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- address -->
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-white text-xl">Adresse</label>
                            <input type="text" name="address" id="address"
                                class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('address', $user->address ?? '') }}">
                            @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>
                        <button type="submit" class="px-6 py-3 bg-white text-primary text-lg rounded-full ">
                            Enregistrer
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
<script>
    function previewImages(event) {
        const previewContainer = document.getElementById('image-preview-container');
        previewContainer.innerHTML = ''; // Réinitialiser les aperçus

        const files = event.target.files;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();
            reader.onload = function(e) {
                const wrapper = document.createElement('div');
                wrapper.classList.add('flex', 'items-center', 'gap-2'); // Alignement horizontal

                const imgContainer = document.createElement('div');
                imgContainer.classList.add('relative', 'overflow-hidden', 'rounded-lg');

                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('object-cover', 'w-20', 'h-20', 'rounded-lg', 'shadow-full');

                // Créer la croix pour supprimer l'image
                const deleteButton = document.createElement('span');
                deleteButton.textContent = '✖';
                deleteButton.classList.add(
                    'flex', 'items-center', 'top-0','justify-center', 'w-8', 'h-8',
                    'bg-red-600', 'text-white', 'rounded-full', 'cursor-pointer', 'shadow-full'
                );
                deleteButton.onclick = () => {
                    wrapper.remove(); // Supprime tout le conteneur
                };

                imgContainer.appendChild(img);
                wrapper.appendChild(imgContainer);
                wrapper.appendChild(deleteButton); // Ajoute le bouton à côté de l'image
                previewContainer.appendChild(wrapper);
            };

            reader.readAsDataURL(file);

        }
    }
</script>
