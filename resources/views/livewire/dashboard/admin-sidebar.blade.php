
<!-- Navigation Links of admin -->
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
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-building text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Accueil</span>
            </a>
        </li>
        <!-- Users -->
        <li>
            <a href="{{ route('users.index') }}"
            class="flex items-center py-3 px-4 rounded-l-full transition-colors
            {{ request()->routeIs('users.index') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-users text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold ">Utilisateurs</span>
            </a>
        </li>

        <!-- Companies -->
        <li>
            <a href="{{ route('companies.index') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('companies.index') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-building text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Sociétés</span>
            </a>
        </li>

        <!-- Halls -->
        <li>
            <a href="{{ route('halls.index') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('halls.index') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-door-open text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Salles</span>
            </a>
        </li>

        <!-- Event Types -->
        <li>
            <a href="{{ route('eventTypes.index') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('eventTypes.index') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-building text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Evènements</span>
            </a>
        </li>

        <!-- Features -->
        <li>
            <a href="{{ route('features.index') }}"
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('features.index') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-tags text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Equipements</span>
            </a>
        </li>


        <!-- Alerts -->
        <li>
            <a href=""
               class="flex items-center py-3 px-4 rounded-l-full transition-colors
               {{ request()->routeIs('alerts.index') ? 'bg-primary text-white' : 'text-gray-700 hover:bg-indigo-100 hover:text-indigo-600' }}">
                <i class="fas fa-bell text-lg"></i>
                <span x-show="sidebarOpen" class="ml-3 text-lg font-bold">Alertes</span>
            </a>
        </li>



        <!-- Settings -->
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
    <button wire:click="logout" class="w-full text-start">
        <x-responsive-nav-link>
            <i class="fas fa-sign-out-alt text-primary hover:text-white"></i>
            <span x-show="sidebarOpen" class="ml-3">Déconnexion</span>
        </x-responsive-nav-link>
    </button>
</nav>
