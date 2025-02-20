<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-primary">

    <h1 class="font-semibold text-3xl text-white leading-tight my-6">
        <i class="fas fa-building text-white text-3xl px-2"></i> {{ __('Fournir les informations sur votre société') }}
    </h1>

    <div class="w-2/4 my-6 p-10 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid lg:grid-cols-2 sm:grid-cols-1 md:grid-cols-1 gap-4 ">
                <!-- Nom -->
                <div class="mb-4">
                    <label for="name" class="block text-lg font-medium text-gray-700">Nom de la Société </label>
                    <input type="text" name="name" id="name"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('name', $company->name ?? '') }}" required>
                    @error('name')
                        <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('email', $company->email ?? '') }}" required>
                    @error('email')
                        <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Téléphone -->
                <div class="mb-4">
                    <label for="phone" class="block text-lg font-medium text-gray-700">Téléphone</label>
                    <input type="text" name="phone" id="phone"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('phone', $company->phone ?? '') }}">
                    @error('phone')
                        <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Code Postal -->
                <div class="mb-4">
                    <label for="postal_code" class="block text-lg font-medium text-gray-700">Code Postal</label>
                    <input type="number" name="postal_code" id="postal_code"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('postal_code', $company->postal_code ?? '') }}">
                    @error('postal_code')
                        <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Pays -->
                <div class="mb-4">
                    <label for="pays" class="block text-lg font-medium text-gray-700">Pays</label>
                    <input type="text" name="pays" id="pays"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        value="{{ old('pays', $company->pays ?? '') }}">
                    @error('pays')
                        <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                </div>


                <!-- ville -->
<div class="mb-4">
    <label for="ville" class="block text-lg font-medium text-gray-700">Ville</label>
    <input type="text" name="ville" id="ville"
        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        value="{{ old('ville', $company->ville ?? '') }}">
    @error('ville')
        <span class="text-red-500 text-lg">{{ $message }}</span>
    @enderror
</div>
</div>
<!-- Adresse -->
<div class="mb-4">
    <label for="address" class="block text-lg font-medium text-gray-700">Adresse</label>
    <input type="text" name="address" id="address"
        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        value="{{ old('address', $company->address ?? '') }}">
    @error('address')
        <span class="text-red-500 text-lg">{{ $message }}</span>
    @enderror
</div>
<!-- Description -->
    <div class="mb-4 ">
        <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
        <textarea name="description" id="description"
            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $company->description ?? '') }}</textarea>
        @error('description')
            <span class="text-red-500 text-lg">{{ $message }}</span>
        @enderror
    </div>
    <input type="hidden" name="user_id" value="{{ auth()->id() }}">


            <!-- Actions -->
            <div class="text-center mt-6 flex space-x-4 px-8">
                <button type="submit" class="px-4 py-2 bg-primary text-white text-center rounded-full hover:bg-primary">
                    Suivant
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
