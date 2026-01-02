<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Statistiques - Organisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">

    <div class="flex">
        <aside class="w-64 bg-green-900 min-h-screen text-white p-6 hidden md:block">
            <div class="text-2xl font-black mb-10 italic">FOOTPASS</div>
            <nav class="space-y-4">
                
                <a href="#" class="block py-2.5 px-4 rounded bg-green-700 font-bold">Statistiques</a>
                <a href="create_match.php" class="block py-2.5 px-4 rounded transition hover:bg-green-800">Creé Événements</a>
            </nav>
        </aside>

        <main class="flex-1 p-8">
            <header class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-black text-gray-800 uppercase tracking-tighter">Analyses Globales</h1>
                    <p class="text-gray-500">Suivez l'impact de vos événements en temps réel.</p>
                </div>
                <div class="bg-white p-2 rounded-xl shadow-sm border border-gray-100">
                    <span class="text-sm font-bold text-gray-400 px-4">Période :</span>
                    <select class="outline-none bg-transparent font-bold text-green-700 pr-4">
                        <option>7 derniers jours</option>
                        <option>30 derniers jours</option>
                        <option>Cette année</option>
                    </select>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-[2rem] shadow-sm border-b-4 border-green-600">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center text-green-700 text-xl">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="text-green-500 font-bold text-sm">+12%</span>
                    </div>
                    <p class="text-gray-400 text-xs font-black uppercase tracking-widest">Total Participants</p>
                    <h3 class="text-3xl font-black text-gray-800">1,284</h3>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-sm border-b-4 border-blue-600">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-700 text-xl">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <span class="text-blue-500 font-bold text-sm">Active</span>
                    </div>
                    <p class="text-gray-400 text-xs font-black uppercase tracking-widest">Événements</p>
                    <h3 class="text-3xl font-black text-gray-800">8</h3>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-sm border-b-4 border-yellow-600">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-yellow-100 rounded-2xl flex items-center justify-center text-yellow-700 text-xl">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <span class="text-red-500 font-bold text-sm">-3%</span>
                    </div>
                    <p class="text-gray-400 text-xs font-black uppercase tracking-widest">Billets Vendus</p>
                    <h3 class="text-3xl font-black text-gray-800">850</h3>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-sm border-b-4 border-purple-600">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center text-purple-700 text-xl">
                            <i class="fas fa-euro-sign"></i>
                        </div>
                        <span class="text-green-500 font-bold text-sm">+25%</span>
                    </div>
                    <p class="text-gray-400 text-xs font-black uppercase tracking-widest">Chiffre d'Affaires</p>
                    <h3 class="text-3xl font-black text-gray-800">12,450 €</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm">
                    <h3 class="font-black text-gray-800 uppercase text-sm mb-6 tracking-widest">Fréquentation Mensuelle</h3>
                    <canvas id="participationChart" height="200"></canvas>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm">
                    <h3 class="font-black text-gray-800 uppercase text-sm mb-6 tracking-widest">Top Événements</h3>
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-200 rounded-xl overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1508098682722-e99c43a406b2?w=100" alt="match">
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-sm text-gray-800">Match Amical - Wydad vs Raja</h4>
                                <div class="w-full bg-gray-100 h-2 rounded-full mt-2">
                                    <div class="bg-green-600 h-2 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                            <span class="font-black text-green-700">85%</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-200 rounded-xl overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=100" alt="match">
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-sm text-gray-800">Tournoi de Quartier - Finale</h4>
                                <div class="w-full bg-gray-100 h-2 rounded-full mt-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: 62%"></div>
                                </div>
                            </div>
                            <span class="font-black text-blue-700">62%</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Configuration du graphique Chart.js
        const ctx = document.getElementById('participationChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Inscriptions',
                    data: [65, 59, 80, 81, 56, 95],
                    borderColor: '#15803d',
                    backgroundColor: 'rgba(21, 128, 61, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });
    </script>
</body>
</html>