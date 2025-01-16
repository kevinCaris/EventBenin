<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($method ?? false)
        @method($method)
    @endif

    <!-- Nom -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nom de la Compagnie</label>
        <input type="text" name="name" id="name"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('name', $company->name ?? '') }}" required>
        @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('email', $company->email ?? '') }}" required>
        @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Téléphone -->
    <div class="mb-4">
        <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
        <input type="text" name="phone" id="phone"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('phone', $company->phone ?? '') }}">
        @error('phone')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Postal_code -->
    <div class="mb-4">
        <label for="address" class="block text-sm font-medium text-gray-700">Code Postal :</label>
        <textarea name="address" id="address"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('postal_code', $company->postal_code ?? '') }}</textarea>
        @error('postal_code')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <!-- Pays -->
    <div class="mb-4">
        <label for="address" class="block text-sm font-medium text-gray-700">Pays</label>
        <textarea name="pays" id="pays"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('pays', $company->pays ?? '') }}</textarea>
        @error('pays')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <!-- Adresse -->
    <div class="mb-4">
        <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
        <textarea name="address" id="address"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('ville', $company->ville ?? '') }}</textarea>
        @error('ville')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $company->description ?? '') }}</textarea>
        @error('description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <!-- ville -->
    <div class="mb-4">
        <label for="ville" class="block text-sm font-medium text-gray-700">Ville</label>
        <input type="text" name="ville" id="ville"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('ville', $company->ville ?? '') }}">
        @error('ville')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Logo -->
    <div class="mb-4">
        <label for="avatar" class="block text-sm font-medium text-gray-700">Logo</label>
        <input type="file" name="avatar" id="avatar"
            class="mt-1 p-2 block w-full rounded-lg border-gray-300 shadow-sm">
        @error('avatar')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <!-- cover -->
    <div class="mb-4">
        <label for="avatar" class="block text-sm font-medium text-gray-700">Cover</label>
        <input type="file" name="cover" id="cover"
            class="mt-1 p-2 block w-full rounded-lg border-gray-300 shadow-sm">
        @error('cover')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Réseaux sociaux -->
    <div class="mb-4">
        <label for="facebook_url" class="block text-sm font-medium text-gray-700">Facebook URL</label>
        <input type="url" name="facebook_url" id="facebook_url"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('facebook_url', $company->facebook_url ?? '') }}">
    </div>

    <div class="mb-4">
        <label for="twitter_url" class="block text-sm font-medium text-gray-700">Twitter URL</label>
        <input type="url" name="twitter_url" id="twitter_url"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('twitter_url', $company->twitter_url ?? '') }}">
    </div>

    <div class="mb-4">
        <label for="instagram_url" class="block text-sm font-medium text-gray-700">Instagram URL</label>
        <input type="url" name="instagram_url" id="instagram_url"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('instagram_url', $company->instagram_url ?? '') }}">
    </div>

    <div class="mb-4">
        <label for="linkedin_url" class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
        <input type="url" name="linkedin_url" id="linkedin_url"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('linkedin_url', $company->linkedin_url ?? '') }}">
    </div>
    <div class="mb-4">
        <label for="youtube_url" class="block text-sm font-medium text-gray-700">Youtube URL</label>
        <input type="url" name="youtube_url" id="youtube_url"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('youtube_url', $company->youtube_url ?? '') }}">
    </div>
    <div class="mb-4">
        <label for="tiktok_url" class="block text-sm font-medium text-gray-700">TikTok URL</label>
        <input type="url" name="tiktok_url" id="tiktok_url"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('tiktok_url', $company->tiktok_url ?? '') }}">
    </div>
    <div class="mb-4">
        <label for="website_url" class="block text-sm font-medium text-gray-700">Facebook URL</label>
        <input type="url" name="website_url" id="website_url"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            value="{{ old('website_url', $company->website_url ?? '') }}">
    </div>
    <!-- Actions -->
    <div class="text-right mt-6 flex space-x-4">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            @if($method == 'PUT')
                Modifier
            @else
                Créer
            @endif
        </button>
        {{-- <a href="{{ route('companies.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            Retour
        </a> --}}
    </div>
</form>
