<!-- dashboard Accueil  admin -->
<x-dashboard-layout>
    <div class="py-3">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        <div class="text-2xl font-bold flex justify-between items-center text-gray-800"><h2 class="text-xl font-bold text-gray-800">Tableau de bord</h2>
                        <button class="bg-primary text-white px-3 py-2 rounded-lg shadow-md hover:bg-primary">🔔 Notifications</button></div>
                </div>
            </div>
        </div>

        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <!-- En-tête -->
                <div class="flex justify-between items-center mb-6">

                </div>

                <!-- Grid Principale -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                  <!-- Carte Statistique -->
                  <div class="bg-white p-6 rounded-2xl shadow-md flex items-center space-x-4">
                    <div class="p-4 bg-blue-100 rounded-full">
                      📌
                    </div>
                    <div>
                      <p class="text-gray-500">Salles Disponibles</p>
                      <h3 class="text-2xl font-bold">42</h3>
                    </div>
                  </div>

                  <div class="bg-white p-6 rounded-2xl shadow-md flex items-center space-x-4">
                    <div class="p-4 bg-green-100 rounded-full">
                      📅
                    </div>
                    <div>
                      <p class="text-gray-500">Réservations en cours</p>
                      <h3 class="text-2xl font-bold">18</h3>
                    </div>
                  </div>

                  <div class="bg-white p-6 rounded-2xl shadow-md flex items-center space-x-4">
                    <div class="p-4 bg-red-100 rounded-full">
                      ⚠️
                    </div>
                    <div>
                      <p class="text-gray-500">Validation en attente</p>
                      <h3 class="text-2xl font-bold">5</h3>
                    </div>
                  </div>

                  <div class="bg-white p-6 rounded-2xl shadow-md flex items-center space-x-4">
                    <div class="p-4 bg-yellow-100 rounded-full">
                      💰
                    </div>
                    <div>
                      <p class="text-gray-500">Revenus ce mois</p>
                      <h3 class="text-2xl font-bold">5 000€</h3>
                    </div>
                  </div>
                </div>
                <div class="max-w-full  sm:px-6 lg:px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    <!-- Transactions récentes -->
                    <div class="bg-white p-4 rounded-xl shadow-md">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold">Dernières transactions</h2>
                            <a href="#" class="text-blue-500">Tout voir</a>
                        </div>
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-gray-500 text-sm">
                                    <th class="pb-2">Transaction</th>
                                    <th class="pb-2">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t"><td class="py-2 font-medium">Bonnie Green</td><td class="py-2">23 avril 2021</td></tr>
                                <tr class="border-t"><td class="py-2 font-medium">#00910 (Remboursement)</td><td class="py-2">23 avril 2021</td></tr>
                                <tr class="border-t"><td class="py-2 font-medium">Échec #087651</td><td class="py-2">18 avril 2021</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Inscriptions utilisateurs -->
                    <div class="bg-white p-4 rounded-xl shadow-md flex flex-col items-center">
                        <h2 class="text-lg font-semibold">385</h2>
                        <p class="text-gray-500">Inscriptions cette semaine</p>
                        <canvas id="userChart" class="mt-4"></canvas>
                        <a href="#" class="text-primary mt-2">RAPPORT DES UTILISATEURS</a>
                    </div>

                    <!-- Visiteurs cette semaine -->
                    <div class="bg-white p-4 rounded-xl shadow-md flex flex-col items-center">
                        <h2 class="text-lg font-semibold">5 355</h2>
                        <p class="text-gray-500">Visiteurs cette semaine</p>
                        <canvas id="visitorChart" class="mt-4"></canvas>
                        <a href="#" class="text-primary mt-2">RAPPORT DE VISITES</a>
                    </div>
                </div>
                <!-- Section Graphique -->
                <div class="mt-6 bg-white p-6 rounded-2xl shadow-md">
                  <h3 class="text-xl font-bold mb-4">📊 Statistiques des Réservations</h3>
                  <canvas id="reservationChart"></canvas>
                </div>
              </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('reservationChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
      datasets: [{
        label: 'Réservations',
        data: [15, 20, 35, 40, 30, 50],
        borderColor: '#0891B2',
        backgroundColor: 'rgba(37, 99, 235, 0.2)',
        borderWidth: 3,
        fill: true,
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false }
      }
    }
  });

  // Graphique des utilisateurs
  new Chart(document.getElementById('userChart'), {
        type: 'bar',
        data: {
            labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            datasets: [{
                label: 'Inscriptions',
                data: [50, 75, 60, 80, 95, 40, 70],
                backgroundColor: '#0891B2'
            }]
        }
    });

    // Graphique des visiteurs
    new Chart(document.getElementById('visitorChart'), {
        type: 'line',
        data: {
            labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            datasets: [{
                label: 'Visiteurs',
                data: [1200, 1350, 1100, 1500, 1400, 1600, 1550],
                borderColor: '#10b981',
                fill: true,
                backgroundColor: 'rgba(16, 185, 129, 0.2)'
            }]
        }
    });
</script>

</x-dashboard-layout>
