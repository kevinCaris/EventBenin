<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EventBenin - Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="hidden lg:block fixed-top 1">
        <!-- Contenu à afficher uniquement sur PC -->
        <!-- Dashboard Wrapper -->
        <div x-data="{ sidebarOpen: true }" class="flex h-screen bg-gray-100 ">

            <!-- Sidebar -->
            <aside :class="{ 'w-52': sidebarOpen, 'w-16': !sidebarOpen }"
                class="bg-white   flex-shrink-0 transition-all duration-300 max-w-full border-r-2">
                <!-- Logo and Toggle -->
                <div class="flex items-center justify-between p-4">
                    <a href="#" class="text-2xl font-bold" @click="sidebarOpen = !sidebarOpen">
                        <i class="fas fa-bars"></i>
                    </a>
                    <span x-show="sidebarOpen" class="ml-2">Dashboard</span>
                </div>
                <!-- Dynamic Sidebar -->
                @if (Auth::user()->getRoleAsString() === 'admin')
                    <livewire:dashboard.admin-sidebar />
                @elseif(Auth::user()->getRoleAsString() === 'owner')
                    <livewire:dashboard.owner-sidebar />
                @endif
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col  overflow-hidden">
                <!-- Topbar -->
                <livewire:dashboard.header  />
                {{-- <livewire:layout.navigation /> --}}
                <!-- Content -->
                <main class="flex-1 overflow-y-auto ">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    <div class="block lg:hidden">
        <!-- Contenu à afficher uniquement sur mobile -->

        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-100">

            <!-- Sidebar -->
            <aside x-show="sidebarOpen" :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }"
                class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white transform transition-transform duration-300 lg:translate-x-0 lg:relative lg:w-52 z-40">
                <!-- Close Button on Mobile -->
                <div class="flex items-center justify-between p-4 lg:hidden">
                    <h1 class="text-lg font-semibold">Menu</h1>
                    <button @click="sidebarOpen = false" class="text-white">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <!-- Dynamic Sidebar Content -->
                <div class="p-4">
                    @if (Auth::user()->getRoleAsString() === 'admin')
                        <livewire:dashboard.admin-sidebar />
                    @elseif(Auth::user()->getRoleAsString() === 'owner')
                        <livewire:dashboard.owner-sidebar />
                    @endif
                </div>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Header -->
                <header class="bg-white shadow flex items-center justify-between px-4 py-2">
                    <!-- Logo to Toggle Sidebar -->
                    <button @click="sidebarOpen = !sidebarOpen" class="text-2xl text-gray-800 lg:hidden">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="text-lg font-semibold text-gray-800">EventBenin</h1>
                </header>

                <!-- Content -->
                <main class="flex-1 overflow-y-auto">
                    {{ $slot }}
                </main>
            </div>

            <!-- Backdrop for Sidebar -->
            <div x-show="sidebarOpen" @click="sidebarOpen = false"
                class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden"></div>
        </div>

    </div>

    <!-- Toast Notification -->
<div id="toastMessage" class="fixed bottom-5 right-5 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg opacity-0 transition-opacity duration-500">
    <span id="toastContent"></span>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toastElement = document.getElementById('toastMessage');
        const toastContent = document.getElementById('toastContent');

        function showToast(message, type = 'success') {
            if (!toastElement || !toastContent) return;

            // Modifier la couleur selon le type (vert = succès, rouge = erreur)
            toastElement.classList.remove('bg-primary', 'bg-red-500');
            toastElement.classList.add(type === 'success' ? 'bg-primary' : 'bg-red-500');
            toastContent.textContent = message;

            // Afficher le toast
            toastElement.classList.remove('opacity-0');
            toastElement.classList.add('opacity-100');

            // Masquer après 3 secondes
            setTimeout(() => {
                toastElement.classList.remove('opacity-100');
                toastElement.classList.add('opacity-0');
            }, 3000);
        }

        // Vérifier si Laravel a stocké un message en session
        const successMessage = "{{ session('success') }}".trim();
        const errorMessage = "{{ session('error') }}".trim();

        if (successMessage !== "") {
            showToast(successMessage, 'success');
        } else if (errorMessage !== "") {
            showToast(errorMessage, 'error');
        }
    });
    </script>

</body>

</html>
