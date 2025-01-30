
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
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-home"></i>
                    <span x-show="sidebarOpen" class="ml-3">Accueil</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}"
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-users"></i>
                    <span x-show="sidebarOpen" class="ml-3">Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('companies.index') }}"
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-building"></i>
                    <span x-show="sidebarOpen" class="ml-3">Companies</span>
                </a>
            </li>
            <li>
                <a href="{{ route('halls.index') }}"
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-door-open"></i>
                    <span x-show="sidebarOpen" class="ml-3">Halls</span>
                </a>
            </li>
            <li>
                <a href="{{ route('eventTypes.index') }}"
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-building"></i>
                    <span x-show="sidebarOpen" class="ml-3">Event Types</span>
                </a>
            </li>
            <li>
                <a href="{{ route('features.index') }}"
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-tags"></i>
                    <span x-show="sidebarOpen" class="ml-3">Features</span>
                </a>
            </li>

            <li>
                <a href=""
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-clipboard-list"></i>
                    <span x-show="sidebarOpen" class="ml-3">Logs</span>
                </a>
            </li>
            <li>
                <a href=""
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-bell"></i>
                    <span x-show="sidebarOpen" class="ml-3">Alerts</span>
                </a>
            </li>
            <li>
                <a href=""
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-server"></i>
                    <span x-show="sidebarOpen" class="ml-3">Monitor</span>
                </a>
            </li>
            <li>
                <a href=" {{ route('settings') }}"
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-cogs"></i>
                    <span x-show="sidebarOpen" class="ml-3">Paramètres</span>
                </a>
            </li>
        </ul>

        <button wire:click="logout" class="w-full text-start">
            <x-responsive-nav-link>
               <i class="fas fa-sign-out-alt"></i>
                <span x-show="sidebarOpen" class="ml-3">Logout</span>
            </x-responsive-nav-link>
        </button>
    </nav>
    <!-- logout button -->
