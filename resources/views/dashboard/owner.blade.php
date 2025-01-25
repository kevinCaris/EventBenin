<!-- dashboard Accueil owner -->
<x-dashboard-layout>
    <div class="py-3">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="text-2xl font-bold text-gray-800">Bienvenue sur votre Dashboard</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carte des statistiques -->
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div class="text-2xl font-bold text-gray-800">Statistiques</div>
        <div class="grid grid-cols-3 gap-6 mt-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="text-lg font-semibold text-gray-700">Nombre de Réservations</div>
                <div class="text-3xl font-bold text-gray-900">42</div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="text-lg font-semibold text-gray-700">Salles Actives</div>
                <div class="text-3xl font-bold text-gray-900">10</div>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="text-lg font-semibold text-gray-700">Nouveaux Avis</div>
                <div class="text-3xl font-bold text-gray-900">5</div>
            </div>
        </div>
    </div>

</x-dashboard-layout>
