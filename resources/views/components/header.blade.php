<header>
    <nav class="bg-white p-4 fixed w-full top-0 left-0 z-50">
        <div class=" mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-primary hover:text-white  focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex-shrink-0 text-black text-xl font-bold  px-3 py-2">
                    <a href="/"><img src="{{ asset('storage/EventBenin.png') }}" alt="Logo" class="h-20 w-auto">
                    </a>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">

                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4 ">
                            <a href="/" class="text-black  hover:text-primary px-3 py-2 rounded-md text-lg font-medium">Accueil</a>
                            <a href="/a-propos" class="text-black  hover:text-primary px-3 py-2 rounded-md text-lg font-medium">À propos</a>
                            <a href="/explorer" class="text-black  hover:text-primary px-3 py-2 rounded-md text-lg font-medium">Explorer</a>
                            <a href="/blog" class="text-black  hover:text-primary px-3 py-2 rounded-md text-lg font-medium">Blogue</a>
                            <a href="/contact" class="text-black  hover:text-primary px-3 py-2 rounded-md text-lg font-medium">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block">
                    <div class="ml-4 flex items-center space-x-4">
                        <!-- Inscription avec Dropdown -->
                        <div class="relative">
                            <button class="text-black  hover:text-primary px-3 py-2 rounded-md text-lg font-medium" id="dropdownButton" aria-haspopup="true" aria-expanded="false">
                                Inscription
                            </button>
                            <div class="dropdown-menu absolute hidden bg-white text-primary shadow-lg rounded-md w-48 right-0" aria-labelledby="dropdownButton">
                                <a href="{{ route('register') }}" class="block px-2 py-2 text-lg hover:bg-primary hover:text-white"><i class="fas fa-user text-primary hover:text-white px-2"></i>Locataire</a>
                                <a href="{{ route('register') }}" class="block px-2 py-2 text-lg hover:bg-primary hover:text-white"><i class="fas fa-building text-black hover:text-white px-2"></i>Propriétaire</a>
                            </div>
                        </div>

                        <a href="{{ route('login') }}" class="bg-primary text-white px-3 py-2 rounded-md text-lg font-medium hover:text-white hover:bg-primary">Connexion</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="sm:hidden" id="mobile-menu" class="hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="text-black  hover:text-primary block px-3 py-2 rounded-md text-base font-medium">Accueil</a>
                <a href="/a-propos" class="text-black  hover:text-primary block px-3 py-2 rounded-md text-base font-medium">À propos</a>
                <a href="/explorer" class="text-black  hover:text-primary block px-3 py-2 rounded-md text-base font-medium">Explorer</a>
                <a href="/blog" class="text-black  hover:text-primary block px-3 py-2 rounded-md text-base font-medium">Blogue</a>
                <a href="/contact" class="text-black  hover:text-primary block px-3 py-2 rounded-md text-base font-medium">Contact</a>
                <a href="/inscription" class="text-black  hover:text-primary block px-3 py-2 rounded-md text-base font-medium">Inscription</a>
                <a href="/connexion" class="text-black  hover:text-primary block px-3 py-2 rounded-md text-base font-medium">Connexion</a>
            </div>
        </div>
    </nav>

    </header>
