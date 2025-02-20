<x-guest-layout>
    <!-- Hero Section -->
    <section class="relative w-full h-[300px] flex items-center text-left justify-center bg-cover bg-center"
        style="background-image: url('{{ asset('images/home-9.webp') }}');">
        <div class="absolute inset-0 bg-black opacity-20"></div> <!-- Overlay sombre -->
        <div class="relative z-10 flex flex-col justify-center items-center h-full text-center text-white px-6">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4">A propos de EventBénin</h1>
            <div class="border-4 border-white w-2/6 mt-4"></div>
        </div>

    </section>

    <!-- Présentation -->
    <section class="py-16 px-8 max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Bloc Propriétaires -->
            <div
                class="bg-gradient-to-r from-primary to-blue-700 text-white p-10 shadow-lg rounded-lg text-center flex flex-col items-center">
                <div class="bg-white p-5 rounded-full shadow-md">
                    <svg class="w-14 h-14 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m0 0l6-6m-6 6l-6-6"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold mt-6">Vous êtes propriétaire ?</h2>
                <p class="mt-4 text-lg">
                    Gagnez en visibilité et maximisez vos revenus en mettant vos salles en location sur notre
                    plateforme.
                </p>
                <ul class="mt-4 text-lg text-left">
                    <li><i class="fas fa-check text-2xl"></i> Publiez vos salles avec des photos et descriptions
                        détaillées.</li>
                    <li><i class="fas fa-check text-2xl"></i> Définissez vos tarifs et disponibilités en toute
                        flexibilité.</li>
                    <li><i class="fas fa-check text-2xl"></i> Recevez des demandes de réservation et gérez-les
                        facilement.</li>
                    <li><i class="fas fa-check text-2xl"></i> Accédez à des outils d’analyse pour suivre vos
                        performances.</li>
                    <li><i class="fas fa-check text-2xl"></i> Profitez d’un support dédié pour toute assistance.</li>
                </ul>
                <a href="{{ route('register') }}"
                    class="mt-6 bg-white text-blue-600 font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-blue-100 transition">
                    Mettre en location
                </a>
            </div>

            <!-- Bloc Clients -->
            <div
                class="bg-gradient-to-r from-green-500 to-green-700 text-white p-10 shadow-lg rounded-lg text-center flex flex-col items-center">
                <div class="bg-white p-5 rounded-full shadow-md">
                    <svg class="w-14 h-14 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l4-4m0 0l4-4m-4 4v12"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold mt-6">Vous cherchez une salle ?</h2>
                <p class="mt-4 text-lg">
                    Trouvez et réservez facilement la salle parfaite pour tous vos événements, en quelques clics.
                </p>
                <ul class="mt-4 text-lg text-left">
                    <li><i class="fas fa-check text-2xl"></i> Explorez une large gamme de salles adaptées à tous types
                        d'événements.</li>
                    <li><i class="fas fa-check text-2xl"></i> Comparez les prix, les services inclus et les avis des
                        autres clients.</li>
                    <li><i class="fas fa-check text-2xl"></i> Réservez instantanément ou envoyez une demande au
                        propriétaire.</li>
                    <li><i class="fas fa-check text-2xl"></i> Gérez vos réservations et paiements en toute sécurité.
                    </li>
                    <li><i class="fas fa-check text-2xl"></i> Bénéficiez d’un service client en cas de besoin.</li>
                </ul>
                <a href="{{ route('halls.guest') }}"
                    class="mt-6 bg-white text-green-600 font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-green-100 transition">
                    Trouver une salle
                </a>
            </div>
        </div>
    </section>

    <<!-- Avantages -->
        <section class="bg-primary py-16">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-4xl font-bold text-white">Pourquoi nous choisir ?</h2>
                <p class="text-lg text-gray-200 mt-4">Découvrez les avantages exclusifs de notre service.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-12">
                    <div class="bg-white p-8 shadow-lg rounded-xl transition transform hover:scale-105">
                        <div class="text-yellow-500 text-4xl mb-4">
                            🏆
                        </div>
                        <h3 class="text-xl font-semibold">Réservation instantanée</h3>
                        <p class="text-gray-600 mt-2">Réservez en quelques clics sans intermédiaire.</p>
                    </div>

                    <div class="bg-white p-8 shadow-lg rounded-xl transition transform hover:scale-105">
                        <div class="text-yellow-500 text-4xl mb-4">
                            💳
                        </div>
                        <h3 class="text-xl font-semibold">Paiement sécurisé</h3>
                        <p class="text-gray-600 mt-2">Transactions protégées et fiables.</p>
                    </div>

                    <div class="bg-white p-8 shadow-lg rounded-xl transition transform hover:scale-105">
                        <div class="text-yellow-500 text-4xl mb-4">
                            ⭐
                        </div>
                        <h3 class="text-xl font-semibold">Avis clients</h3>
                        <p class="text-gray-600 mt-2">Consultez les avis avant de réserver.</p>
                    </div>

                    <div class="bg-white p-8 shadow-lg rounded-xl transition transform hover:scale-105">
                        <div class="text-yellow-500 text-4xl mb-4">
                            📞
                        </div>
                        <h3 class="text-xl font-semibold">Support 24/7</h3>
                        <p class="text-gray-600 mt-2">Une assistance disponible à tout moment.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Témoignages améliorés -->
        <section class="py-16 px-8 max-w-5xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Ce qu'ils disent de nous</h2>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div
                    class="bg-white p-6 shadow-lg rounded-lg border border-gray-200 transition-transform transform hover:scale-105">
                    <p class="italic text-gray-700">“Grâce à cette plateforme, j'ai trouvé une salle incroyable pour mon
                        mariage !”</p>
                    <p class="font-semibold mt-4 text-primary">— Client satisfait</p>
                </div>
                <div
                    class="bg-white p-6 shadow-lg rounded-lg border border-gray-200 transition-transform transform hover:scale-105">
                    <p class="italic text-gray-700">“Mes locations ont doublé depuis que j'utilise ce service.”</p>
                    <p class="font-semibold mt-4 text-primary">— Propriétaire de salle</p>
                </div>
            </div>
        </section>

        <!-- CTA Final amélioré -->
        <section class="bg-blue-600 text-white text-center py-16">
            <h2 class="text-3xl font-bold">Rejoignez-nous dès maintenant !</h2>
            <p class="mt-3 text-lg text-blue-200">Trouver une salle ou louer la vôtre n'a jamais été aussi simple.</p>
            <div class="mt-6 flex justify-center gap-4">
                <a href="#"
                    class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold flex items-center gap-2 transition hover:bg-gray-200">
                    🔍 Je cherche une salle
                </a>
                <a href="#"
                    class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold flex items-center gap-2 transition hover:bg-gray-200">
                    🏠 Je loue mes salles
                </a>
            </div>
        </section>

</x-guest-layout>
