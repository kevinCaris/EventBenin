
<div class="max-w-3xl mx-auto bg-white p-6 shadow-md rounded-lg">
    <h2 class="text-xl font-bold text-gray-800">Contacter le prestataire</h2>
    <p class="text-sm text-gray-600">La demande de renseignements est 100% gratuite !</p>

    @guest
        <div class="mt-4 p-4 bg-yellow-100 text-yellow-800 rounded-md">
            <p>🔒 Vous devez être connecté pour envoyer une demande.</p>
            <a href="{{ route('login') }}" class="text-blue-600 underline">Connectez-vous</a>
        </div>
    @endguest

    <form id="contactForm" method="POST" action="" class="mt-6">
        @csrf

        <!-- 🟢 A PROPOS DE VOUS -->
        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">À propos de vous</h3>

        <!-- Société -->
        <label class="block font-medium text-gray-700 mt-3">Société *</label>
        <input type="text" name="societe" required class="w-full border p-2 rounded-md mt-1">

        <!-- Nom & Prénom -->
        <div class="flex gap-4 mt-3">
            <div class="w-1/2">
                <label class="block font-medium text-gray-700">Nom *</label>
                <input type="text" name="nom" required class="w-full border p-2 rounded-md mt-1">
            </div>
            <div class="w-1/2">
                <label class="block font-medium text-gray-700">Prénom *</label>
                <input type="text" name="prenom" required class="w-full border p-2 rounded-md mt-1">
            </div>
        </div>

        <!-- Email & Téléphone -->
        <div class="flex gap-4 mt-3">
            <div class="w-1/2">
                <label class="block font-medium text-gray-700">Adresse e-mail *</label>
                <input type="email" name="email" required class="w-full border p-2 rounded-md mt-1">
            </div>
            <div class="w-1/2">
                <label class="block font-medium text-gray-700">Téléphone *</label>
                <input type="tel" name="telephone" required class="w-full border p-2 rounded-md mt-1">
            </div>
        </div>

        <!-- 🟢 A PROPOS DE VOTRE ÉVÉNEMENT -->
        <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mt-6">À propos de votre événement</h3>

        <!-- Nature de l'événement (Liste dynamique) -->
        <label class="block font-medium text-gray-700 mt-3">Nature de l'événement *</label>
        <x-event-select />

        <!-- Date avec Flatpickr -->
        <label class="block font-medium text-gray-700 mt-3">Date *</label>
        <input type="text" id="datepicker" name="date_event" required class="w-full border p-2 rounded-md mt-1">

        <!-- Heure de début et fin -->
        <div class="flex gap-4 mt-3">
            <div class="w-1/2">
                <label class="block font-medium text-gray-700">Heure de début *</label>
                <input type="time" name="heure_debut" required class="w-full border p-2 rounded-md mt-1">
            </div>
            <div class="w-1/2">
                <label class="block font-medium text-gray-700">Heure de fin *</label>
                <input type="time" name="heure_fin" required class="w-full border p-2 rounded-md mt-1">
            </div>
        </div>

        <!-- Nombre d'invités -->
        <label class="block font-medium text-gray-700 mt-3">Nombre d'invités *</label>
        <input type="number" name="nombre_invites" required class="w-full border p-2 rounded-md mt-1">

        <!-- Budget global estimé -->
        <label class="block font-medium text-gray-700 mt-3">Budget global estimé</label>
        <input type="text" name="budget" class="w-full border p-2 rounded-md mt-1">

        <!-- Détail de la demande -->
        <label class="block font-medium text-gray-700 mt-3">Détail de votre demande *</label>
        <textarea name="details" required class="w-full border p-2 rounded-md mt-1" rows="3"></textarea>

        <!-- Options -->
        <div class="mt-4">
            <label class="flex items-center">
                <input type="checkbox" name="newsletter" class="mr-2">
                J'accepte de recevoir la newsletter
            </label>
            <label class="flex items-center mt-2">
                <input type="checkbox" name="communications" class="mr-2">
                J'accepte de recevoir les communications du Groupe 1001Salles et de ses partenaires
            </label>
        </div>

        <!-- Bouton Envoyer -->
        <button
            type="submit"
            id="submitBtn"
            class="mt-4 w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition"
            {{ Auth::check() ? '' : 'disabled' }}>
            Envoyer
        </button>
    </form>
</div>

<!-- Flatpickr pour le calendrier -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    // Activer le calendrier Flatpickr sur le champ date
    flatpickr("#datepicker", {
        enableTime: false,
        dateFormat: "d/m/Y",
        minDate: "today"
    });

    // Vérification connexion avant soumission
    document.getElementById('contactForm').addEventListener('submit', function (event) {
        let isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};

        if (!isAuthenticated) {
            event.preventDefault();
            alert("Vous devez être connecté pour envoyer une demande.");
            window.location.href = "{{ route('login') }}";
        }
    });
</script>
