
<x-guest-layout>
    <!-- Hero Section -->
    <section class="relative w-full h-[550px] flex items-center text-left justify-center bg-cover bg-center" style="background-image: url('{{ asset('images/exhibition.webp') }}');">
        <div class="bg-white p-8 rounded-lg shadow-lg text-left">

            <h1 class="text-4xl font-bold">Trouvez la salle parfaite sur EventBenin</h1>
            <p class="text-gray-600 mt-2">Réservez la salle idéale pour vos événements : mariages, anniversaires et plus </p>.</p>
            <div class="mt-4 flex space-x-4">
                <a href="{{ route('halls.guest') }}" class="bg-primary text-white px-4 py-2 rounded">Voir plus</a>
                <button class="border border-green-600 text-green-600 px-4 py-2 rounded"><a href="{{ route('blog') }}">Blog</a></button>
            </div>
        </div>
    </section>

    {{-- <!-- Search Bar -->
    <div class="max-w-5xl mx-auto bg-white p-6 shadow-lg -mt-12 relative z-10 rounded-full">
        <form class="grid grid-cols-4 gap-4">
            <input type="text" placeholder="Select city" class="border p-2 rounded">
            <input type="date" placeholder="Move-in" class="border p-2 rounded">
            <input type="date" placeholder="Move-out" class="border p-2 rounded">
            <button class="bg-primary text-white px-4 py-2 rounded-full">Search</button>
        </form>
    </div> --}}

    <!-- Features Section -->
<section class="max-w-7xl mx-auto text-center py-12 px-4">
    <h2 class="text-3xl font-bold">L'avenir est flexible</h2>
    <p class="text-gray-600 mt-4">
        Nous vous accompagnons dans la recherche de l’espace de vie idéal, parfaitement adapté à vos besoins.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-6">
        <!-- Feature Cards -->
        @php
            $features = [
                ['icon' => 'fa-bed', 'title' => 'Espace Flexible', 'desc' => 'Nos salles s\'adaptent à vos besoins pour différents types d\'événements.'],
                ['icon' => 'fa-home', 'title' => 'Prêtes à l\'emploi', 'desc' => 'Des salles entièrement équipées et prêtes à accueillir vos invités.'],
                ['icon' => 'fa-wifi', 'title' => 'Wi-Fi Haut Débit', 'desc' => 'Restez connecté avec notre connexion Wi-Fi rapide et fiable.'],
                ['icon' => 'fa-headset', 'title' => 'Support 24/7', 'desc' => 'Une équipe dédiée disponible à tout moment pour vous assister.']
            ];
        @endphp

        @foreach ($features as $feature)
            <div class="p-6 bg-[#E2F1E8] rounded-lg shadow-md flex flex-col items-center text-center">
                <i class="fas {{ $feature['icon'] }} text-3xl text-primary mb-3"></i>
                <h3 class="font-semibold text-lg">{{ $feature['title'] }}</h3>
                <p class="text-gray-700 mt-2">{{ $feature['desc'] }}</p>
            </div>
        @endforeach
    </div>
</section>

<section class="max-w-screen-xl mx-auto py-12 sm:px-4">
    <div class="container mx-auto my-10 text-center">
        <h2 class="text-3xl font-semibold mb-8">Offres de location de salles de fête</h2>
        <p class="text-lg text-gray-500 mb-12">
            Découvrez nos meilleures offres de location de salles de fête, sélectionnées avec soin pour vous offrir le meilleur rapport qualité-prix et une expérience inoubliable.
        </p>

        <!-- Grid avec centrage et responsivité améliorée -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($halls as $hall)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all hover:shadow-lg">
                    <!-- Image de la salle -->
                    <img src="{{ $hall->pictures->isNotEmpty() ? asset($hall->pictures->first()->path) : "https://www.1001salles.com/images/provider/61067/salle-ocre.webp" }}"
                        alt="Image de la salle" class="w-full h-48 object-cover">
                    <div class="p-6 text-left">
                        <!-- Titre -->
                        <h5 class="text-xl font-semibold text-gray-800">{{ $hall->title }}</h5>

                        <!-- Description réduite -->
                        <p class="text-sm text-gray-500 mt-2">{{ Str::limit($hall->description, 80) }}</p>

                        <!-- Informations sur la capacité -->
                        <p class="text-gray-700 mt-2">
                            <strong><i class="fa fa-users"></i></strong> {{ $hall->capacity }} personnes
                        </p>

                        <!-- Informations sur le prix -->
                        <p class="text-yellow-500 font-semibold mt-2">
                            <strong>{{ number_format($hall->price, 2) }}  FCFA / Heure</strong>
                        </p>

                        <!-- Boutons -->
                        <div class="mt-6 flex justify-between items-center gap-4">
                            <!-- Bouton Voir -->
                            <a href="{{ route('guest.hall.show', $hall->id) }}" class="bg-primary text-white text-sm font-semibold py-2 px-4 rounded-md flex items-center">
                                <i class="fa fa-eye mr-2"></i> Voir
                            </a>

                            <!-- Bouton Contacter -->
                            <a href="tel:+229 62590775" class="bg-primary text-white text-sm font-semibold py-2 px-4 rounded-md flex items-center">
                                <i class="fa fa-phone mr-2"></i> Contacter
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Types d'événements -->
<section class="max-w-7xl mx-auto py-12 px-4">
    <h2 class="text-3xl font-bold text-center">Choisissez votre type d'événement</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mt-6">
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
            <div class="bg-gray-200 rounded-lg shadow-md overflow-hidden max-w-xs mx-auto">
                <img src="{{ asset('images/'.$event['image']) }}" alt="{{ $event['name'] }}" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-center">{{ $event['name'] }}</h3>
                </div>
            </div>
        @endforeach
    </div>
</section>


    <!-- Testimonials -->
    <section class="max-w-7xl mx-auto py-12">
        <h2 class="text-3xl font-semibold text-center mb-8">Ce que disent nos clients</h2>
        <p class="text-lg text-center text-gray-500 mb-12">
          Découvrez pourquoi nos clients adorent organiser leurs événements avec nos salles de fête ! Lisez de véritables avis et témoignages pour voir comment nous offrons un service exceptionnel.
        </p>

        <!-- Slider container -->
        <div class="swiper-container" >
          <div class="swiper-wrapper grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:mx-12">
            <!-- Slide 1 -->
            <div class="swiper-slide">
              <div class="client__card p-6 bg-white shadow-lg rounded-lg">
                <div class="client__details flex items-center mb-4">
                  <img src="{{ asset('images/client-1.jpg') }}" alt="client" class="w-16 h-16 rounded-full object-cover mr-4" />
                  <div>
                    <h4 class="font-semibold text-lg">Sarah Johnson</h4>
                    <div class="client__rating flex mt-1">
                      <span class="text-yellow-500"><i class="ri-star-fill"></i></span>
                      <span class="text-yellow-500"><i class="ri-star-fill"></i></span>
                      <span class="text-yellow-500"><i class="ri-star-fill"></i></span>
                      <span class="text-yellow-500"><i class="ri-star-fill"></i></span>
                      <span class="text-gray-300"><i class="ri-star-line"></i></span>
                    </div>
                  </div>
                </div>
                <p class="text-gray-600">
                  Nous avons réservé une salle pour notre mariage, et l'expérience a été exceptionnelle. L'équipe était très professionnelle et la salle était parfaitement préparée. Tous nos invités ont été impressionnés par l'espace et la décoration.
                </p>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
              <div class="client__card p-6 bg-white shadow-lg rounded-lg">
                <div class="client__details flex items-center mb-4">
                  <img src="{{ asset('images/client-2.jpg') }}" alt="client" class="w-16 h-16 rounded-full object-cover mr-4" />
                  <div>
                    <h4 class="font-semibold text-lg">Michael Adams</h4>
                    <div class="client__rating flex mt-1">
                      <span class="text-yellow-500"><i class="ri-star-fill"></i></span>
                      <span class="text-yellow-500"><i class="ri-star-fill"></i></span>
                      <span class="text-yellow-500"><i class="ri-star-fill"></i></span>
                      <span class="text-yellow-500"><i class="ri-star-fill"></i></span>
                      <span class="text-gray-300"><i class="ri-star-line"></i></span>
                    </div>
                  </div>
                </div>
                <p class="text-gray-600">
                  La salle était magnifique et parfaitement adaptée à notre événement. Nous avons organisé une conférence et tout s'est déroulé sans accroc. La capacité d'accueil et les équipements étaient parfaits. Une très bonne expérience !
                </p>
              </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide">
              <div class="client__card p-6 bg-white shadow-lg rounded-lg">
                <div class="client__details flex items-center mb-4">
                  <img src="{{ asset('images/client-3.jpg') }}" alt="client" class="w-16 h-16 rounded-full object-cover mr-4" />
                  <div>
                    <h4 class="font-semibold text-lg">Emily Martinez</h4>
                    <div class="client__rating flex mt-1">
                      <span class="text-yellow-500"><i class="ri-star-fill"></i></span>
                      <span class="text-yellow-500"><i class="ri-star-fill"></i></span>
                      <span class="text-yellow-500"><i class="ri-star-fill"></i></span>
                      <span class="text-yellow-500"><i class="ri-star-fill"></i></span>
                      <span class="text-gray-300"><i class="ri-star-line"></i></span>
                    </div>
                  </div>
                </div>
                <p class="text-gray-600">
                  Nous avons célébré l'anniversaire de mon mari dans une de vos magnifiques salles. L'ambiance était parfaite et la gestion de l'événement impeccable. Nous avons reçu de nombreux compliments de la part de nos invités.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

       <!-- CTA Final amélioré -->
       <section class="bg-primary text-white text-center py-16">
        <h2 class="text-3xl font-bold">Rejoignez-nous dès maintenant !</h2>
        <p class="mt-3 text-lg text-blue-200">Trouver une salle ou louer la vôtre n'a jamais été aussi simple.</p>
        <div class="mt-6 flex justify-center gap-4">
            <a href="#"
                class="bg-white text-primary px-6 py-3 rounded-lg font-semibold flex items-center gap-2 transition hover:bg-gray-200">
                🔍 Je cherche une salle
            </a>
            <a href="#"
                class="bg-white text-primary px-6 py-3 rounded-lg font-semibold flex items-center gap-2 transition hover:bg-gray-200">
                🏠 Je loue mes salles
            </a>
        </div>
    </section>

</x-guest-layout>
