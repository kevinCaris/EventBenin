
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
            <div class="container mx-auto px-6 lg:px-20">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                    <!-- Section Navigation -->
                    <div>
                        <h3 class="text-lg font-semibold text-yellow-400 mb-4">Navigation</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-yellow-400 transition">Accueil</a></li>
                            <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-yellow-400 transition">À propos</a></li>
                            <li><a href="" class="text-gray-300 hover:text-yellow-400 transition">Réserver une salle</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition">Avis & Témoignages</a></li>
                            <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-yellow-400 transition">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Section Informations légales -->
                    <div>
                        <h3 class="text-lg font-semibold text-yellow-400 mb-4">Informations légales</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition">Mentions légales</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition">Conditions générales</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition">Politique de confidentialité</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-yellow-400 transition">Politique de remboursement</a></li>
                        </ul>
                    </div>

                    <!-- Section Contact -->
                    <div>
                        <h3 class="text-lg font-semibold text-yellow-400 mb-4">Contact</h3>
                        <p class="text-gray-300 text-sm mb-2">📍 123 Rue des Événements, Ville, Pays</p>
                        <p class="text-gray-300 text-sm mb-2">📞 +33 1 23 45 67 89</p>
                        <p class="text-gray-300 text-sm">📧 <a href="mailto:support@location-salles.com" class="text-yellow-400 hover:underline">support@location-salles.com</a></p>

                        <div class="flex space-x-4 mt-4">
                            <a href="#" class="text-gray-400 hover:text-yellow-400 text-xl"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-gray-400 hover:text-yellow-400 text-xl"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-gray-400 hover:text-yellow-400 text-xl"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-gray-400 hover:text-yellow-400 text-xl"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>

                    <!-- Section Newsletter -->
                    <div>
                        <h3 class="text-lg font-semibold text-yellow-400 mb-4">Newsletter</h3>
                        <p class="text-gray-300 text-sm mb-4">📩 Recevez nos dernières nouveautés et promotions !</p>
                        <form class="flex flex-col space-y-3">
                            <input type="email" placeholder="Votre email" required
                                class="p-2 rounded-lg border-none text-gray-800 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <button type="submit"
                                class="bg-yellow-400 text-gray-900 font-semibold py-2 rounded-lg hover:bg-yellow-500 transition">
                                S’abonner
                            </button>
                        </form>
                    </div>

                </div>

                <!-- Pied de page inférieur -->
                <div class="border-t border-gray-700 mt-8 pt-6 text-center text-sm text-gray-400">
                    <p>© 2024 Location Salles. Tous droits réservés. | Développé par <strong>EventBenin</strong></p>
                </div>
            </div>


    </footer>
