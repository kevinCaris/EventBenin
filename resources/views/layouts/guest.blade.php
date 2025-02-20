<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />


        <!-- FullCalendar CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.css" rel="stylesheet" />

<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/lang/fr.js"></script>



<!-- Ajout de Tippy.js -->
<script src="https://unpkg.com/tippy.js@6.3.1/dist/tippy-bundle.umd.min.js"></script>
<link href="https://unpkg.com/tippy.js@6.3.1/dist/tippy.css" rel="stylesheet" />


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <style>
        #map {
            height: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" text-gray-900 antialiased font-[Poppins]">
    <x-header />
    <main class="flex-1 overflow-y-auto pt-[6rem]">
        <!-- Main Content -->

            {{ $slot }}
            {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        </div> --}}
    </main>
    <x-footer />
    <script>
        // Gérer le dropdown sur desktop
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        // Toggle menu mobile
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

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
