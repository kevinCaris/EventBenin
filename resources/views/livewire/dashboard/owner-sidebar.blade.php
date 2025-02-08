<!-- Navigation Links of owner -->
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
        <li>
            <a href="{{ route('owner.dashboard') }}"
               class="flex items-center py-3 px-4 hover:bg-primary hover:text-white rounded-l-full">
                <i class="fas fa-home text-primary hover:text-white"></i>
                <span x-show="sidebarOpen" class="ml-3">Accueil</span>
            </a>
        </li>
        <li>
            <a href="{{ route('halls.index') }}"
               class="flex items-center py-3 px-4 hover:bg-primary hover:text-white rounded-l-full">
                <i class="fas fa-door-open text-primary hover:text-white"></i>
                <span x-show="sidebarOpen" class="ml-3">Salles</span>
            </a>
        </li>
        <li>
            <a href="{{ route('halls.create') }}"
               class="flex items-center py-3 px-4 hover:bg-primary hover:text-white rounded-l-full">

                <i class="fas fa-plus text-primary hover:text-white"></i>
                <span x-show="sidebarOpen" class="ml-3">Ajouter</span>
            </a>
        </li>
        <li>
            <a href="{{ route('eventTypes.index') }}"
               class="flex items-center py-3 px-4 hover:bg-primary hover:text-white rounded-l-full">
                <i class="fas fa-building text-primary hover:text-white"></i>
                <span x-show="sidebarOpen" class="ml-3">Event Types</span>
            </a>
        </li>
        <li>
            <a href="{{ route('availabilities.index') }}"
            class="flex items-center space-x-2 p-2 text-gray-600 hover:bg-gray-200 rounded-md">
             <i class="fas fa-calendar-check text-blue-500"></i>
             <span>Disponibilités</span>
         </a>
        </li>
        <li>
            <a href="{{ route('features.index') }}"
               class="flex items-center py-3 px-4 hover:bg-primary hover:text-white rounded-l-full">
                <i class="fas fa-tags text-primary hover:text-white"></i>
                <span x-show="sidebarOpen" class="ml-3">Features</span>
            </a>
        </li>

        <li>
            <a href=""
               {{-- class="flex items-center py-3 px-4 hover:bg-gray-700"> --}}
               class="flex items-center py-3 px-4 hover:bg-primary hover:text-white rounded-l-full">

                <i class="fas fa-chart-bar text-primary hover:text-white"></i>
                <span x-show="sidebarOpen" class="ml-3">Statistiques</span>
            </a>
        </li>
        <li>
            <a href=" {{ route('settings') }}"
               {{-- class="flex items-center py-3 px-4 hover:bg-gray-700"> --}}
               class="flex items-center py-3 px-4 hover:bg-primary hover:text-white rounded-l-full">
                <i class="fas fa-cogs text-primary hover:text-white"></i>
                <span x-show="sidebarOpen" class="ml-3">Paramètres</span>
            </a>
        </li>
    </ul>

    <button wire:click="logout" class="w-full text-start">
        <x-responsive-nav-link>
           <i class="fas fa-sign-out-alt text-primary hover:text-white "></i>
            <span x-show="sidebarOpen" class="ml-3">Logout</span>
        </x-responsive-nav-link>
    </button>
</nav>
