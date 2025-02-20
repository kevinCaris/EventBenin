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

<nav class="mt-6">
    <ul>
        <!-- Accueil -->
        <li>
            <a href="{{ route('owner.dashboard') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('owner.dashboard') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-home text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Accueil</span>
            </a>
        </li>

        <!-- Salles -->
        <li>
            <a href="{{ route('halls.index') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('halls.index') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-door-open text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Salles</span>
            </a>
        </li>

        <!-- Ajouter -->
        <li>
            <a href="{{ route('halls.create') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('halls.create') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-plus text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Ajouter</span>
            </a>
        </li>

        <!-- Evénements -->
        <li>
            <a href="{{ route('eventTypes.index') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('eventTypes.index') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-building text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Evènements</span>
            </a>
        </li>

        <!-- Calendrier -->
        <li>
            <a href="{{ route('events.calendar') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('events.calendar') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-calendar-check  text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Calendrier</span>
            </a>
        </li>

        <!-- Equipements -->
        <li>
            <a href="{{ route('features.index') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('features.index') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-tags text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Equipements</span>
            </a>
        </li>

        <!-- Réservation -->
        <li>
            <a href="{{ route('events.index') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('events.index') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-chart-bar text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Réservation</span>
            </a>
        </li>

        <!-- Paramètres -->
        <li>
            <a href="{{ route('settings') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('settings') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-cogs text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Paramètres</span>
            </a>
        </li>
    </ul>

    <!-- Logout -->
    <button wire:click="logout" class="w-full text-start mt-auto">
        <x-responsive-nav-link>
            <i class="fas fa-sign-out-alt text-primary"></i>
            <span x-show="sidebarOpen" class="ml-3">Déconnexion</span>
        </x-responsive-nav-link>
    </button>

</nav>
