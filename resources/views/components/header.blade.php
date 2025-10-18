<header>
    @if (Auth::check() && Auth::user()->isClient())
        <nav class="bg-white  fixed w-full top-0 left-0 z-50 shadow-md py-4">
            <div class="container mx-auto flex items-center justify-between h-16 px-6">
                <!-- Logo -->
                <div class="flex-shrink-0 text-xl font-bold">
                    <a href="/"><img src="{{ asset('images/EventBenin.png') }}" alt="Logo"
                            class="h-16 w-auto"></a>
                </div>

                <!-- Desktop Menu -->
                <ul class="hidden sm:flex space-x-10 text-lg font-medium">
                    <li>
                        <a href="{{ route('home') }}"
                            class="relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform
                            {{ request()->routeIs('home') ? 'text-primary font-bold after:scale-x-100' : 'text-black hover:text-primary' }}">
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform
                            {{ request()->routeIs('about') ? 'text-primary font-bold after:scale-x-100' : 'text-black hover:text-primary' }}">
                            À propos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('halls.guest') }}"
                            class="relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform
                            {{ request()->routeIs('halls.guest') ? 'text-primary font-bold after:scale-x-100' : 'text-black hover:text-primary' }}">
                            Salles
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}"
                            class="relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform
                            {{ request()->routeIs('blog') ? 'text-primary font-bold after:scale-x-100' : 'text-black hover:text-primary' }}">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                            class="relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform
                            {{ request()->routeIs('contact') ? 'text-primary font-bold after:scale-x-100' : 'text-black hover:text-primary' }}">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('events.index') }}"
                            class="relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform
                            {{ request()->routeIs('events.index') ? 'text-primary font-bold after:scale-x-100' : 'text-black hover:text-primary' }}">
                            Mes Reservations
                        </a>
                    </li>

                </ul>


                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6 gap-3">
                    <div class="relative space-x-3">
                        <!-- Cloche de notification avec badge -->
                        <button class="text-xl" id="notificationButton" aria-expanded="false">
                            <i class="fas fa-bell text-2xl"></i>

                            <!-- Badge pour afficher le nombre total de notifications non lues -->
                            @if (auth()->user()->unreadNotifications->count() > 0)
                                <span
                                    class="absolute top-0 right-0 inline-block w-4 h- bg-red-500 text-white text-xs font-bold rounded-full text-center">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                            @endif
                        </button>

                        <!-- Liste des notifications (initialement cachée) -->
                        <div id="notificationDropdown"
                            class="dropdown-menu w-80 bg-white shadow-xl rounded-lg border border-gray-200 hidden absolute z-10 top-full mt-3 right-0 opacity-0 transform scale-95 transition-all duration-200">
                            <div class="max-h-60 overflow-y-auto">
                                <ul>
                                    <!-- Afficher les 5 dernières notifications -->
                                    @foreach (auth()->user()->unreadNotifications->take(5) as $notification)
                                        <li
                                            class="px-4 py-3 border-b border-gray-200 hover:bg-gray-50 transition-colors duration-150">
                                            <div class="flex items-center space-x-3">
                                                <!-- Icône de notification -->
                                                <i class="fas fa-bell text-yellow-400"></i>
                                                <div class="flex-1">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800">{{ $notification->data['message'] }}</span>
                                                    <span
                                                        class="block text-xs text-gray-500">{{ $notification->created_at->format('d/m/Y H:i') }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Lien pour voir toutes les notifications -->
                            <div class="text-center py-2 border-t border-gray-200">
                                <a href="{{ route('notifications.index') }}"
                                    class="text-blue-500 hover:text-blue-600">Voir toutes les notifications</a>
                            </div>
                        </div>
                    </div>


                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div class="ms-1 mx-3">
                                    <img class="w-10 h-10  border-4 border-green-400   rounded-full object-cover"
                                        src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User portrait">
                                </div>
                                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                    x-on:profile-updated.window="name = $event.detail.name">
                                    <!-- Nom de l'utilisateur -->
                                    <span x-text="name" class="text-sm font-medium text-white"></span>
                                </div>

                            </button>
                        </x-slot>

                        <x-slot name="content" class="p-5">
                            <!-- Email affiché en haut -->
                            {{-- <div class="px-4 py-2 text-sm text-gray-700 font-semibold my-2 ">
                                {{ Str::limit(auth()->user()->email, 20, '...') }}

                            </div> --}}

                            <x-dropdown-link :href="route('users.show', auth()->user())" wire:navigate>
                                <i class="fas fa-user text-primary mx-3"></i> {{ __('Mon profil') }}
                            </x-dropdown-link>

                            <!-- Edit Profile -->
                            <x-dropdown-link :href="route('users.edit', auth()->user())" wire:navigate>
                                <i class="fas fa-user-edit text-primary mx-3"></i> {{ __('Profil') }}
                            </x-dropdown-link>

                            <!-- Inbox -->
                            <x-dropdown-link wire:navigate :href="route('chat.index')">
                                <i class="fas fa-envelope text-primary mx-3"></i> {{ __('Mes messages') }}
                            </x-dropdown-link>


                            <!-- Authentication -->
                            @livewire('logout-button')
                        </x-slot>
                    </x-dropdown>
                </div>
                {{-- <a href="{{ route('login') }}" class="block bg-primary text-white px-6 py-3 rounded-lg text-center mt-2">Connexion</a> --}}


                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button"
                    class="sm:hidden text-primary focus:outline-none focus:ring-2  p-3 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-primary transition duration-300 hover:bg-opacity-90">
                    <i class="fas fa-bars text-2xl"></i>
                </button>

            </div>



            <!-- Mobile Menu (Slide-in) -->
            <div id="mobile-menu"
                class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out p-6 space-y-6 text-lg z-50">

                <!-- Close Button -->
                <button id="close-menu" class="absolute top-4 right-4 text-gray-600 hover:text-primary text-2xl">
                    <i class="fas fa-times"></i>
                </button>

                <x-dropdown-link :href="route('users.show', auth()->user())" wire:navigate
                    class="flex items-center text-gray-800 hover:text-primary transition duration-300">
                    <i class="fas fa-user text-primary mr-3"></i> {{ __('Mon profil') }}
                </x-dropdown-link>

                <x-dropdown-link :href="route('users.edit', auth()->user())" wire:navigate
                    class="flex items-center text-gray-800 hover:text-primary transition duration-300">
                    <i class="fas fa-user-edit text-primary mr-3"></i> {{ __('Profil') }}
                </x-dropdown-link>

                <x-dropdown-link wire:navigate :href="route('events.index')"
                    class="flex items-center text-gray-800 hover:text-primary transition duration-300">
                    <i class="fas fa-calendar text-primary mr-3"></i> {{ __('Mes Réservations') }}
                </x-dropdown-link>

                <x-dropdown-link wire:navigate :href="route('halls.guest')"
                    class="flex items-center text-gray-800 hover:text-primary transition duration-300">
                    <i class="fas fa-building text-primary mr-3"></i> {{ __('Salles') }}
                </x-dropdown-link>

                <x-dropdown-link wire:navigate :href="route('blog')"
                    class="flex items-center text-gray-800 hover:text-primary transition duration-300">
                    <i class="fas fa-blog text-primary mr-3"></i> {{ __('Blog') }}
                </x-dropdown-link>

                <x-dropdown-link wire:navigate :href="route('contact')"
                    class="flex items-center text-gray-800 hover:text-primary transition duration-300">
                    <i class="fas fa-phone text-primary mr-3"></i> {{ __('Contact') }}
                </x-dropdown-link>

                <!-- Authentication -->
                @livewire('logout-button')

            </div>

            <!-- Script d'ouverture et fermeture -->
            <script>
                document.getElementById('mobile-menu-button').addEventListener('click', function() {
                    document.getElementById('mobile-menu').classList.remove('translate-x-full');
                });

                document.getElementById('close-menu').addEventListener('click', function() {
                    document.getElementById('mobile-menu').classList.add('translate-x-full');
                });
            </script>

        </nav>
    @else
        <nav class="bg-white  fixed w-full top-0 left-0 z-50 shadow-md py-4">
            <div class="container mx-auto flex items-center justify-between h-20 px-5">
                <!-- Logo -->
                <div class="flex-shrink-0 text-xl font-bold">
                    <a href="/"><img src="{{ asset('images/EventBenin.png') }}" alt="Logo"
                            class="h-16 w-auto"></a>
                </div>

                <!-- Desktop Menu -->
                <ul class="hidden sm:flex space-x-8 text-lg font-medium">
                    <li>
                        <a href="{{ route('home') }}"
                            class="relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform
                            {{ request()->routeIs('home') ? 'text-primary font-bold after:scale-x-100' : 'text-black hover:text-primary' }}">
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform
                            {{ request()->routeIs('about') ? 'text-primary font-bold after:scale-x-100' : 'text-black hover:text-primary' }}">
                            À propos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('halls.guest') }}"
                            class="relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform
                            {{ request()->routeIs('halls.guest') ? 'text-primary font-bold after:scale-x-100' : 'text-black hover:text-primary' }}">
                            Salles
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}"
                            class="relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform
                            {{ request()->routeIs('blog') ? 'text-primary font-bold after:scale-x-100' : 'text-black hover:text-primary' }}">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                            class="relative after:absolute after:w-full after:h-0.5 after:bg-primary after:left-0 after:bottom-0 after:scale-x-0 hover:after:scale-x-100 after:transition-transform
                            {{ request()->routeIs('contact') ? 'text-primary font-bold after:scale-x-100' : 'text-black hover:text-primary' }}">
                            Contact
                        </a>
                    </li>
                </ul>


                <!-- Actions -->
                <div class="hidden sm:flex items-center space-x-6">
                    <div class="relative group">
                        <button
                            class="text-black hover:text-primary px-5 py-3 border border-primary rounded-lg bg-white hover:bg-primary hover:text-white transition-all">Inscription</button>
                        <div
                            class="absolute hidden group-hover:block bg-white text-primary shadow-lg rounded-md w-52 right-0  border border-gray-200">
                            <a href="{{ route('register') }}"
                                class="block px-4 py-3 text-lg hover:bg-primary hover:text-white"> <i
                                    class="fas fa-user"></i> Locataire</a>
                            <a href="{{ route('register') }}"
                                class="block px-4 py-3 text-lg hover:bg-primary hover:text-white"><i
                                    class="fas fa-user-tie"></i> Propriétaire</a>
                        </div>
                    </div>
                    <a href="{{ route('login') }}"
                        class="bg-primary text-white px-6 py-3 rounded-lg text-lg font-medium hover:bg-opacity-90 transition-all">Connexion</a>
                </div>
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button"
                    class="sm:hidden text-primary focus:outline-none focus:ring-2 focus:ring-primary">
                    <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <i class="fas fa-bars size-10"></i>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden sm:hidden bg-white p-6 space-y-6 text-lg shadow-md">
                <a href="{{ route('home') }}" class="block text-black hover:text-primary">Accueil</a>
                <a href="{{ route('about') }}" class="block text-black hover:text-primary">À propos</a>
                <a href="{{ route('halls.guest') }}" class="block text-black hover:text-primary">Salles</a>
                <a href="{{ route('blog') }}" class="block text-black hover:text-primary">Blog</a>
                <a href="{{ route('contact') }}" class="block text-black hover:text-primary">Contact</a>
                <div class="border-t border-gray-300 pt-4">
                    <a href="{{ route('register') }}"
                        class="block text-black hover:text-primary font-semibold">Inscription</a>
                    <a href="{{ route('login') }}"
                        class="block bg-primary text-white px-6 py-3 rounded-lg text-center mt-2">Connexion</a>
                </div>
            </div>
        </nav>
    @endif

</header>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });



    // Écouter le clic sur l'icône de notification pour afficher/cacher le menu
    const notificationButton = document.getElementById('notificationButton');
    const notificationDropdown = document.getElementById('notificationDropdown');

    notificationButton.addEventListener('click', function(e) {
        e.stopPropagation(); // Empêcher le clic de se propager à window et de fermer immédiatement le dropdown

        // Toggle l'affichage du dropdown avec une animation fluide
        notificationDropdown.classList.toggle('hidden');
        notificationDropdown.classList.toggle('opacity-100');
        notificationDropdown.classList.toggle('scale-100');
        notificationDropdown.classList.toggle('opacity-0');
        notificationDropdown.classList.toggle('scale-95');

        // Mettre à jour l'attribut aria-expanded
        const expanded = notificationDropdown.classList.contains('hidden') ? 'false' : 'true';
        notificationButton.setAttribute('aria-expanded', expanded);
    });

    // Fermer le menu si on clique en dehors
    window.addEventListener('click', function(e) {
        if (!notificationButton.contains(e.target) && !notificationDropdown.contains(e.target)) {
            notificationDropdown.classList.add('hidden');
            notificationDropdown.classList.remove('opacity-100', 'scale-100');
            notificationDropdown.classList.add('opacity-0', 'scale-95');
            notificationButton.setAttribute('aria-expanded', 'false');
        }
    });
</script>
