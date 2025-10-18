<x-guest-layout>
    <section class=" text-white py-16">
        <div class="container mx-auto px-6 lg:px-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- Informations de contact -->
                <div class="bg-white p-6 rounded-lg shadow-lg ">
                    <h2 class="text-3xl font-semibold text-primary mb-6">Contactez-nous</h2>
                    <p class="text-gray-700 mb-4">📍 123 Rue des Événements, Ville, Pays</p>
                    <p class="text-gray-700 mb-4">📞 <a href="tel:+33123456789" class="hover:text-yellow-400">+33 1 23 45
                            67 89</a></p>
                    <p class="text-gray-700 mb-6">📧 <a href="mailto:support@location-salles.com"
                            class="text-primary hover:underline">support@location-salles.com</a></p>

                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-700 hover:text-yellow-400 text-2xl"><i
                                class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-700 hover:text-yellow-400 text-2xl"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-700 hover:text-yellow-400 text-2xl"><i
                                class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-700 hover:text-yellow-400 text-2xl"><i
                                class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Formulaire de contact -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold text-primary mb-4">Envoyez-nous un message</h3>
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-lg font-medium mb-1">Nom</label>
                            <input type="text" required placeholder="Votre nom"
                                class="w-full p-3 rounded-lg border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-primary">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-lg font-medium mb-1">Email</label>
                            <input type="email" required placeholder="Votre email"
                                class="w-full p-3 rounded-lg border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-primary">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-lg font-medium mb-1">Message</label>
                            <textarea rows="4" required placeholder="Votre message..."
                                class="w-full p-3 rounded-lg border border-gray-300 bg-white text-gray-800 focus:ring-2 focus:ring-primary"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-primary text-white font-semibold py-3 rounded-lg hover:bg-primary-dark transition">
                            Envoyer
                        </button>
                    </form>
                </div>


            </div>
        </div>
    </section>
</x-guest-layout>
