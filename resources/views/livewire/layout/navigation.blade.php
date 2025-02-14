<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed w-full top-0 left-0 z-50">
    <!-- Primary Navigation Menu -->
   @if (auth()->check() && auth()->user()->isClient())
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:py-6">
    <div class="relative flex items-center justify-between ">
        <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center ">
                <a href="{{ route('home') }}" wire:navigate>
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>
            @if (!auth()->user()->isAdmin() && !auth()->user()->isOwner())
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                {{-- <x-role-navigation /> --}}
            @endif

        </div>

        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                            x-on:profile-updated.window="name = $event.detail.name"></div>

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

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile')" wire:navigate>
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <button wire:click="logout" class="w-full text-start">
                        <x-dropdown-link>
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </button>
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Hamburger -->
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Responsive Navigation Menu -->
<div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        @if (auth()->user()->hasRole('admin'))
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" wire:navigate>
                {{ __('Admin Dashboard') }}
            </x-responsive-nav-link>
        @elseif(auth()->user()->hasRole('owner'))
            <x-responsive-nav-link :href="route('owner.dashboard')" :active="request()->routeIs('owner.dashboard')" wire:navigate>
                {{ __('Owner Dashboard') }}
            </x-responsive-nav-link>
        @elseif(auth()->user()->hasRole('client'))
            <x-responsive-nav-link :href="route('client.dashboard')" :active="request()->routeIs('client.dashboard')" wire:navigate>
                {{ __('Client Dashboard') }}
            </x-responsive-nav-link>
        @else
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        @endif
    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                x-on:profile-updated.window="name = $event.detail.name"></div>
            <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile')" wire:navigate>
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <button wire:click="logout" class="w-full text-start">
                <x-responsive-nav-link>
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </button>
        </div>
    </div>
</div>
@else
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:py-6">
    <div class="flex justify-between h-16">
        <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('home') }}" wire:navigate>
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>
        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex " >
            <x-nav-link :href="route('home')" :active="request()->routeIs('dashboard')" wire:navigate class="text-lg">
                {{ __('Accueil') }}
            </x-nav-link>
            {{-- <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" wire:navigate class="text-lg">
                {{ __('À propos') }}
            </x-nav-link> --}}
            <x-nav-link :href="route('halls.guest')" :active="request()->routeIs('admin.dashboard')" wire:navigate class="text-lg">
                {{ __('Explorer') }}
            </x-nav-link>
            {{-- <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" wire:navigate class="text-lg">
                {{ __('Blog') }}
            </x-nav-link> --}}
            {{-- <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" wire:navigate class="text-lg">
                {{ __('Contact') }}
            </x-nav-link> --}}
            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" wire:navigate class="text-lg">
                {{ __('Admin Dashboard') }}
            </x-nav-link>

        </div>
        {{-- <div class="hidden sm:block"> --}}
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
        {{-- </div> --}}
    </div>
</div>
@endif

</nav>
