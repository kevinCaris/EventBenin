<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'EventBenin') }}</title>

<!-- cdn leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Scripts -->

{{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script> --}}

<!-- carousel -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <livewire:layout.navigation />
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <div id="toastMessage"
        class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 end-0 p-3"
        role="alert">
        <div class="d-flex">
            <div class="toast-body">
                <span id="toastContent"></span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
    <!-- Toast Notification -->
    <div id="toastMessage"
        class="fixed bottom-5 right-5 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg opacity-0 transition-opacity duration-500">
        <span id="toastContent"></span>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastElement = document.getElementById('toastMessage');
            const toastContent = document.getElementById('toastContent');

            function showToast(message, type = 'success') {
                if (!toastElement || !toastContent) return;

                // Définir la couleur du toast en fonction du type de message
                toastElement.classList.remove('bg-primary', 'bg-red-500');
                toastElement.classList.add(type === 'success' ? 'bg-primary' : 'bg-red-500');
                toastContent.textContent = message;

                // Afficher le toast
                toastElement.classList.remove('opacity-0');
                toastElement.classList.add('opacity-100');

                // Cacher après 3 secondes
                setTimeout(() => {
                    toastElement.classList.remove('opacity-100');
                    toastElement.classList.add('opacity-0');
                }, 3000);
            }

            // Vérifier si Laravel a stocké un message en session
            const successMessage = "{{ session('success') }}";
            const errorMessage = "{{ session('error') }}";

            if (successMessage.trim() !== "") {
                showToast(successMessage, 'success');
            } else if (errorMessage.trim() !== "") {
                showToast(errorMessage, 'error');
            }
        });
    </script>
</body>

</html>
