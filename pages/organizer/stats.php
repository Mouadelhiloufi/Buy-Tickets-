<?php
    
    require_once __DIR__ . '/../../classes/Organisateur.php';
    
    // Récupération des statistiques réelles
    $stats = Organisateur::Consult_statistique($_SESSION['user_id']);
    
    // On extrait pour plus de lisibilité (basé sur ta fonction Consult_statistique)
    $totalBillets = $stats['total_billets'] ;
    $totalEvents  = $stats['total_events'];
    $topMatch     = $stats['max_vendu'] ;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Statistiques - Organisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">

    <div class="flex">
        <aside class="w-64 bg-green-900 min-h-screen text-white p-6 hidden md:flex flex-col justify-between">
            <div>
                <div class="text-2xl font-black mb-10 italic">FOOTPASS</div>
                <nav class="space-y-4">
                    <a href="#" class="block py-2.5 px-4 rounded bg-green-700 font-bold"><i class="fas fa-chart-line mr-2"></i> Statistiques</a>
                     <a href="create_match.php" class="block py-2.5 px-4 rounded transition hover:bg-green-800 italic">
                        <i class="fas fa-plus-circle mr-2"></i> Créer Événements
                    </a>
                    <a href="view_comments.php" class="block py-2.5 px-4 rounded transition hover:bg-green-800">
                    <i class="fas fa-comments mr-2 "></i> Commentaires
                    </a>
                    <a href="edit_profile.php" class="block py-2.5 px-4 rounded transition hover:bg-green-800">
                    <i class="fas fa-user-edit mr-2"></i> Mon Profil
                    </a>
                </nav>
            </div>

            <div class="border-t border-green-800 pt-6">
                <a href="../../auth/logout.php" class="flex items-center gap-3 py-2.5 px-4 rounded transition hover:bg-red-600 text-green-300 hover:text-white font-bold uppercase text-xs tracking-widest">
                    <i class="fas fa-sign-out-alt"></i>
                    Se déconnecter
                </a>
            </div>
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
                        <option>Global</option>
                        <option>Cette année</option>
                    </select>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-[2rem] shadow-sm border-b-4 border-green-600">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center text-green-700 text-xl">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                    </div>
                    <p class="text-gray-400 text-xs font-black uppercase tracking-widest">Total Billets Vendus</p>
                    <h3 class="text-3xl font-black text-gray-800"><?php echo $totalBillets; ?></h3>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-sm border-b-4 border-blue-600">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-700 text-xl">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                    <p class="text-gray-400 text-xs font-black uppercase tracking-widest">Matchs Organisés</p>
                    <h3 class="text-3xl font-black text-gray-800"><?php echo $totalEvents; ?></h3>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-sm border-b-4 border-purple-600">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center text-purple-700 text-xl">
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-400 text-xs font-black uppercase tracking-widest">Ventes Top Match</p>
                    <h3 class="text-3xl font-black text-gray-800">
                        <?php echo $topMatch ? $topMatch['total_reservations'] : '0'; ?>
                    </h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm">
                    <h3 class="font-black text-gray-800 uppercase text-sm mb-6 tracking-widest">Fréquentation Mensuelle</h3>
                    <canvas id="participationChart" height="200"></canvas>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm">
                    <h3 class="font-black text-gray-800 uppercase text-sm mb-6 tracking-widest">Match le plus populaire</h3>
                    <div class="space-y-6">
                        <?php if($topMatch): ?>
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-green-900 rounded-2xl flex items-center justify-center text-white font-bold text-center text-[10px] p-2">
                                TOP MATCH
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-sm text-gray-800 uppercase">
                                    <?php echo htmlspecialchars($topMatch['equipe1'] . " vs " . $topMatch['equipe2']); ?>
                                </h4>
                                <div class="w-full bg-gray-100 h-2 rounded-full mt-2">
                                    <div class="bg-green-600 h-2 rounded-full" style="width: 100%"></div>
                                </div>
                                <p class="text-[10px] text-gray-400 mt-2 font-bold uppercase">Succès maximum sur cet événement</p>
                            </div>
                            <div class="text-right">
                                <span class="font-black text-green-700"><?php echo $topMatch['total_reservations']; ?></span>
                                <p class="text-[8px] uppercase font-bold text-gray-400">Billets</p>
                            </div>
                        </div>
                        <?php else: ?>
                            <p class="text-gray-400 italic text-sm">Aucun billet vendu pour le moment.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        const ctx = document.getElementById('participationChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Ventes',
                    data: [12, 19, 3, 5, 2, 3], // Données à rendre dynamiques plus tard
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