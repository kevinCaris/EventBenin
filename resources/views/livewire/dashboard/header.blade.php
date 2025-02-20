<!-- Header for user dashboards (owner, admin) -->
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

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center ">
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" wire:navigate>
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    @endif
                    @if (auth()->user()->isOwner())
                        <a href="{{ route('owner.dashboard') }}" wire:navigate>
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    @endif
                    </a>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="ms-1 mx-3">
                                <img class="w-10 h-10 border-4 border-green-400 rounded-full object-cover"
                                    src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User portrait">
                            </div>
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                x-on:profile-updated.window="name = $event.detail.name"></div>
                        </button>
                    </x-slot>

                    <x-slot name="content" class="p-5">
                        <x-dropdown-link :href="route('users.show', auth()->user())" wire:navigate>
                            <i class="fas fa-user text-primary mx-3"></i> {{ __('Mon Profil') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('users.edit', auth()->user())" wire:navigate>
                            <i class="fas fa-user-edit text-primary mx-3"></i> {{ __('Profil') }}
                        </x-dropdown-link>

                        @if (auth()->user()->isOwner())
                            <x-dropdown-link :href="auth()->user()->company ? route('companies.edit', auth()->user()->company) : '#'" wire:navigate>
                                <i class="fas fa-building text-primary mx-3"></i>
                                {{ __('Ma société') }}
                            </x-dropdown-link>
                        @endif

                        <x-dropdown-link wire:navigate>
                            <i class="fas fa-envelope text-primary mx-3"></i> {{ __('Mes messages') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        @livewire('logout-button')

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
                    {{ __('Tableau de bord') }}
                </x-responsive-nav-link>
            @elseif(auth()->user()->hasRole('owner'))
                <x-responsive-nav-link :href="route('owner.dashboard')" :active="request()->routeIs('owner.dashboard')" wire:navigate>
                    {{ __('Tableau de bord') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Tableau de bord') }}
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
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Déconnexion') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
