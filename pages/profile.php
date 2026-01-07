<?php
    session_start();
    require_once __DIR__."../../classes/Billets.php";
    
    $tickets=Billet::consulte_historique($_SESSION['user_id']);
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Mon Profil FootPass</title>
</head>
<body class="bg-gray-100">
    <div class="max-w-6xl mx-auto p-6 flex flex-col md:flex-row gap-8">
        <div class="w-full md:w-1/3 bg-white p-8 rounded-3xl shadow-lg h-fit">
    <div class="w-24 h-24 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center text-3xl">👤</div>
    <h2 class="text-center font-bold text-xl">Ahmed Alami</h2>
    <p class="text-center text-gray-500 mb-6 italic">Supporteur Passionné</p>
    
    <nav class="space-y-2">
        <a href="home.php" class="flex items-center gap-2 p-3 hover:bg-gray-50 rounded-xl transition italic text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Retour à l'accueil
        </a>

        
        <a href="edit_profil.php" class="block p-3 hover:bg-gray-50 rounded-xl transition italic text-gray-700">Edit profile</a>
        
        <hr class="my-2 border-gray-100"> <a href="../auth/logout.php" class="block p-3 text-red-600 hover:bg-red-50 rounded-xl transition italic font-medium">Déconnexion</a>
    </nav>
</div>

        <div class="flex-1 bg-white p-8 rounded-3xl shadow-lg">
            <h2 class="text-2xl font-black mb-6 uppercase border-b-2 border-green-600 inline-block">Historique des Achats</h2>
            <div class="space-y-4">
                <?php foreach($tickets as $ticket): ?>
                <div class="flex items-center justify-between p-4 border rounded-2xl hover:bg-gray-50">
                    <div>
                        <p class="font-bold"><?= $ticket['equipe1']." vs ".$ticket['equipe2'] ?></p>
                        <p class="text-xs text-gray-400">Acheté le <?=$ticket['date_achat'] ?></p>
                    </div>
                    <div class="text-right">
                        <p class="text-green-600 font-bold"><?= $ticket['prix'] ?> DH</p>
                        <button class="text-xs bg-gray-900 text-white px-3 py-1 rounded-full">PDF</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>