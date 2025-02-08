
<x-guest-layout>
    <!-- Hero Section -->
    <section class="relative w-full h-[600px] flex items-center text-left justify-center bg-cover bg-center" style="background-image: url('{{ asset('storage/images/exhibition.jpg.jpg') }}');">
        <div class="bg-white p-8 rounded-lg shadow-lg text-left">
            <h1 class="text-4xl font-bold">Location de salle pour votre événement</h1>
            <p class="text-gray-600 mt-2">We rent, manage, and take care of your real estate investments.</p>
            <div class="mt-4 flex space-x-4">
                <a href="{{ route('halls.guest') }}" class="bg-primary text-white px-4 py-2 rounded">Voir plus</a>
                <button class="border border-green-600 text-green-600 px-4 py-2 rounded">Learn More</button>
            </div>
        </div>
    </section>

    <!-- Search Bar -->
    <div class="max-w-5xl mx-auto bg-white p-6 shadow-lg -mt-12 relative z-10 rounded-full">
        <form class="grid grid-cols-4 gap-4">
            <input type="text" placeholder="Select city" class="border p-2 rounded">
            <input type="date" placeholder="Move-in" class="border p-2 rounded">
            <input type="date" placeholder="Move-out" class="border p-2 rounded">
            <button class="bg-primary text-white px-4 py-2 rounded-full">Search</button>
        </form>
    </div>

    <!-- Features Section -->
    <section class="max-w-6xl mx-auto text-center py-12">
        <div>

        </div>
        <h2 class="text-3xl font-bold">The future is flexible</h2>
        <p class="text-gray-600 mt-4">We help you find the perfect living space to fit your needs.</p>
        <div class="grid grid-cols-4 gap-4 mt-6">
            <!-- Flexible Living -->
            <div class="p-6 bg-[#E2F1E8] rounded ">
                <i class="fas fa-bed text-2xl mb-2"></i>
                <h3 class="font-semibold">Espace Flexible</h3>
                <p>Nos salles s'adaptent à vos besoins pour différents types d'événements.</p>
            </div>
            <!-- Move-in Ready -->
            <div class="p-6 bg-[#E2F1E8] rounded">
                <i class="fas fa-home text-2xl mb-2"></i>
                <h3 class="font-semibold">Prêtes à l'emploi</h3>
                <p>Des salles entièrement équipées et prêtes à accueillir vos invités.</p>
            </div>
            <!-- High-speed WiFi -->
            <div class="p-6 bg-[#E2F1E8] rounded">
                <i class="fas fa-wifi text-2xl mb-2"></i>
                <h3 class="font-semibold">Wi-Fi Haut Débit</h3>
                <p>Restez connecté avec notre connexion Wi-Fi rapide et fiable.</p>
            </div>
            <!-- 24/7 Support -->
            <div class="p-6 bg-[#E2F1E8] rounded">
                <i class="fas fa-headset text-2xl mb-2"></i>
                <h3 class="font-semibold">Support 24/7</h3>
                <p>Une équipe dédiée disponible à tout moment pour vous assister.</p>
            </div>
        </div>

    </section>

    <!-- Types d'événements -->
<section class="max-w-6xl mx-auto py-12">
    <h2 class="text-3xl font-bold text-center">Choisissez votre type d'événement</h2>
    <div class="grid grid-cols-3 md:grid-cols-5 gap-4 mt-6">
        @php
            // Liste des types d'événements
            $eventTypes = [
                ['name' => 'Mariage', 'image' => 'wedding.jpg'],
                ['name' => 'Conférence', 'image' => 'conference.jpg'],
                ['name' => 'Anniversaire', 'image' => 'birthday.jpg'],
                ['name' => 'Séminaire', 'image' => 'seminar.jpg'],
                ['name' => 'Exposition', 'image' => 'exhibition.jpg']
            ];
        @endphp

        @foreach ($eventTypes as $event)
            <div class="p-6 bg-gray-200 rounded">
                <img src="{{ asset('/storage/images/'.$event['image']) }}" alt="{{ $event['name'] }}" class="w-full h-32 object-cover rounded mb-4">
                <h3 class="text-xl font-semibold text-center">{{ $event['name'] }}</h3>
            </div>
        @endforeach
    </div>
</section>


    <!-- Testimonials -->
    <section class="max-w-6xl mx-auto text-center py-12">
        <h2 class="text-3xl font-bold">What our partners think</h2>
        <div class="grid grid-cols-2 gap-6 mt-6">
            <div class="p-6 bg-white shadow rounded">Annie - "Great service!"</div>
            <div class="p-6 bg-white shadow rounded">Gabriel - "Highly recommended!"</div>
        </div>
    </section>

</x-guest-layout>
