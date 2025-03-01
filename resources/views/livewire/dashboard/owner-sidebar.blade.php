<!-- Navigation Links of owner -->
<nav class="mt-6">
    <ul>
        <li>
            <a href="{{ route('owner.dashboard') }}"
               class="flex items-center py-3 px-4 hover:bg-gray-700">
                <i class="fas fa-home"></i>
                <span x-show="sidebarOpen" class="ml-3">Accueil</span>
            </a>
        </li>
        <li>
            <a href="{{ route('halls.index') }}" wire:abort
               class="flex items-center py-3 px-4 hover:bg-gray-700">
                <i class="fas fa-door-open"></i>
                <span x-show="sidebarOpen" class="ml-3">Salles</span>
            </a>
        </li>
        <li>
            <a href=""
               class="flex items-center py-3 px-4 hover:bg-gray-700">
                <i class="fas fa-plus"></i>
                <span x-show="sidebarOpen" class="ml-3">Ajouter</span>
            </a>
        </li>
        <li>
            <a href=""
               class="flex items-center py-3 px-4 hover:bg-gray-700">
                <i class="fas fa-chart-bar"></i>
                <span x-show="sidebarOpen" class="ml-3">Statistiques</span>
            </a>
        </li>
        <li>
            <a href=""
               class="flex items-center py-3 px-4 hover:bg-gray-700">
                <i class="fas fa-cogs"></i>
                <span x-show="sidebarOpen" class="ml-3">Paramètres</span>
            </a>
        </li>
    </ul>
</nav>
