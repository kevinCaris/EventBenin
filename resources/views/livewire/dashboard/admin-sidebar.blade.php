
<!-- Navigation Links of admin -->
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
                <a href=""
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
                <a href="{{ route('features.index') }}"
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-tags"></i>
                    <span x-show="sidebarOpen" class="ml-3">Features</span>
                </a>
            </li>
            <li>
                <a href=""
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-chart-line"></i>
                    <span x-show="sidebarOpen" class="ml-3">Reports</span>
                </a>
            </li>

            <li>
                <a href=""
                   class="flex items-center py-3 px-4 hover:bg-gray-700">
                    <i class="fas fa-cogs"></i>
                    <span x-show="sidebarOpen" class="ml-3">Settings</span>
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
        </ul>
    </nav>
