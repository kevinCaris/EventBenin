
<header>
    @if(Auth::check() && Auth::user()->isClient())
    <nav class="bg-white  fixed w-full top-0 left-0 z-50 shadow-md py-4">
        <div class="container mx-auto flex items-center justify-between h-20 px-6">
            <!-- Logo -->
            <div class="flex-shrink-0 text-xl font-bold">
                <a href="/"><img src="{{ asset('images/EventBenin.png') }}" alt="Logo" class="h-14 w-auto"></a>
            </div>

            <!-- Desktop Menu -->
            <ul class="hidden sm:flex space-x-8 text-lg font-medium">
                <li><a href="{{ route('home') }}" class="text-black hover:text-primary relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform">Accueil</a></li>
                <li><a href="/a-propos" class="text-black hover:text-primary relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform">À propos</a></li>
                <li><a href="{{ route('halls.guest') }}" class="text-black hover:text-primary relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform">Explorer</a></li>
                <li><a href="{{ route('blog') }}" class="text-black hover:text-primary relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform">Blog</a></li>
                <li><a href="{{ route('contact') }}" class="text-black hover:text-primary relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform">Contact</a></li>
                <li><a href="{{ route('events.index') }}" class="text-black hover:text-primary relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform">Mes réservations</a></li>

            </ul>


        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                        <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
                            x-on:profile-updated.window="name = $event.detail.name"
                            class="flex items-center space-x-3 p-2 rounded-full bg-primary text-white shadow-sm hover:shadow-md transition">

                           <!-- Avatar (Remplace avec l'image de profil de l'utilisateur si disponible) -->
                           <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=random&color=fff&size=100"
                                alt="Avatar"
                                class="w-10 h-10 rounded-full">

                           <!-- Nom de l'utilisateur -->
                           <span x-text="name" class="text-sm font-medium text-white"></span>
                       </div>


                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content" class="p-5">
                    <!-- Email affiché en haut -->
                    <div class="px-4 py-2 text-sm text-gray-700 font-semibold my-2 ">
                        {{ Str::limit(auth()->user()->email, 20, '...') }}

                    </div>

                    <x-dropdown-link :href="route('users.show', auth()->user())" wire:navigate>
                        <i class="fas fa-user text-primary mx-3"></i> {{ __('My Profile') }}
                    </x-dropdown-link>

                    <!-- Edit Profile -->
                    <x-dropdown-link :href="route('users.edit', auth()->user())" wire:navigate>
                        <i class="fas fa-user-edit text-primary mx-3"></i> {{ __('Edit My Profile') }}
                    </x-dropdown-link>

                    <!-- Inbox -->
                    <x-dropdown-link wire:navigate>
                        <i class="fas fa-envelope text-primary mx-3"></i> {{ __('Inbox') }}
                    </x-dropdown-link>


                    <!-- Authentication -->
                    @livewire('logout-button')
                </x-slot>
            </x-dropdown>
        </div>
        {{-- <a href="{{ route('login') }}" class="block bg-primary text-white px-6 py-3 rounded-lg text-center mt-2">Connexion</a> --}}


            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="sm:hidden text-primary focus:outline-none focus:ring-2 focus:ring-primary">
                <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <i class="fas fa-bars size-10"></i>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden sm:hidden bg-white p-6 space-y-6 text-lg shadow-md">
            <a href="{{ route('home') }}" class="block text-black hover:text-primary">Accueil</a>
            <a href="/a-propos" class="block text-black hover:text-primary">À propos</a>
            <a href="{{ route('halls.guest') }}" class="block text-black hover:text-primary">Explorer</a>
            <a href="{{ route('blog') }}" class="block text-black hover:text-primary">Blog</a>
            <a href="/contact" class="block text-black hover:text-primary">Contact</a>
            <div class="border-t border-gray-300 pt-4">
                <a href="{{ route('register') }}" class="block text-black hover:text-primary font-semibold">Inscription</a>
                <a href="{{ route('login') }}" class="block bg-primary text-white px-6 py-3 rounded-lg text-center mt-2">Connexion</a>
            </div>
        </div>
    </nav>
@else
<nav class="bg-white  fixed w-full top-0 left-0 z-50 shadow-md py-4">
    <div class="container mx-auto flex items-center justify-between h-20 px-6">
        <!-- Logo -->
        <div class="flex-shrink-0 text-xl font-bold">
            <a href="/"><img src="{{ asset('images/EventBenin.png') }}" alt="Logo" class="h-14 w-auto"></a>
        </div>

        <!-- Desktop Menu -->
        <ul class="hidden sm:flex space-x-8 text-lg font-medium">
            <li><a href="{{ route('home') }}" class="text-black hover:text-primary relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform">Accueil</a></li>
            <li><a href="/a-propos" class="text-black hover:text-primary relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform">À propos</a></li>
            <li><a href="{{ route('halls.guest') }}" class="text-black hover:text-primary relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform">Explorer</a></li>
            <li><a href="{{ route('blog') }}" class="text-black hover:text-primary relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform">Blog</a></li>
            <li><a href="/contact" class="text-black hover:text-primary relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform">Contact</a></li>
        </ul>

        <!-- Actions -->
        <div class="hidden sm:flex items-center space-x-6">
            <div class="relative group">
                <button class="text-black hover:text-primary px-5 py-3 border border-primary rounded-lg bg-white hover:bg-primary hover:text-white transition-all">Inscription</button>
                <div class="absolute hidden group-hover:block bg-white text-primary shadow-lg rounded-md w-52 right-0  border border-gray-200">
                    <a href="{{ route('register') }}" class="block px-4 py-3 text-lg hover:bg-primary hover:text-white"> <i class="fas fa-user"></i> Locataire</a>
                    <a href="{{ route('register') }}" class="block px-4 py-3 text-lg hover:bg-primary hover:text-white"><i class="fas fa-user-tie"></i>  Propriétaire</a>
                </div>
            </div>
            <a href="{{ route('login') }}" class="bg-primary text-white px-6 py-3 rounded-lg text-lg font-medium hover:bg-opacity-90 transition-all">Connexion</a>
        </div>
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="sm:hidden text-primary focus:outline-none focus:ring-2 focus:ring-primary">
            <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <i class="fas fa-bars size-10"></i>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden sm:hidden bg-white p-6 space-y-6 text-lg shadow-md">
        <a href="{{ route('home') }}" class="block text-black hover:text-primary">Accueil</a>
        <a href="/a-propos" class="block text-black hover:text-primary">À propos</a>
        <a href="{{ route('halls.guest') }}" class="block text-black hover:text-primary">Explorer</a>
        <a href="{{ route('blog') }}" class="block text-black hover:text-primary">Blog</a>
        <a href="/contact" class="block text-black hover:text-primary">Contact</a>
        <div class="border-t border-gray-300 pt-4">
            <a href="{{ route('register') }}" class="block text-black hover:text-primary font-semibold">Inscription</a>
            <a href="{{ route('login') }}" class="block bg-primary text-white px-6 py-3 rounded-lg text-center mt-2">Connexion</a>
        </div>
    </div>
</nav>
@endif

</header>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
