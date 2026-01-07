<?php
    require_once __DIR__. "../../classes/Acheteur.php";
    $matches=Acheteur::consulte_matches();
    

    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Matchs Disponibles</title>
</head>
<body class="bg-gray-100">
    <div class="bg-green-900 text-white py-12 px-4 mb-10">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
        <div class="flex items-center gap-4">
            <a href="home.php" class="bg-white/10 hover:bg-white/20 p-2 rounded-full transition" title="Retour à l'accueil">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-4xl font-black uppercase text-white">Calendrier des Matchs</h1>
        </div>
        
        <div class="flex gap-4">
            <input type="text" placeholder="Rechercher une équipe..." class="px-4 py-2 rounded-lg text-black w-64 outline-none border-none">
            <select class="px-4 py-2 rounded-lg text-black border-none">
                <option>Tous les lieux</option>
                <option>Casablanca</option>
                <option>Rabat</option>
            </select>
        </div>
    </div>
</div>
    
        
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 pb-20">
        <?php foreach($matches as $match):?>
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-200">
    <div class="bg-gray-50 p-6 flex justify-between items-center border-b">
        <div class="text-center font-bold"><?= $match['equipe1'] ?></div>
        <div class="text-green-600 font-black italic text-xl underline decoration-double">VS</div>
        <div class="text-center font-bold"><?= $match['equipe2'] ?></div>
    </div>
    <div class="p-6">
        <div class="space-y-3 mb-6">
            <p class="text-gray-600 text-sm"><i class="fas fa-calendar mr-2"></i> <?= $match['date_match']." - ".$match['heure_match'] ?></p>
            <p class="text-gray-600 text-sm"><i class="fas fa-map-marker-alt mr-2"></i> <?= $match['lieu'] ?></p>
            <p class="text-green-700 font-bold"><?= $match['prix']." DH" ?></p>
        </div>
        
        <div class="flex gap-2">
            <a href="match_details.php?id=<?= $match['id'] ?>" class="flex-[3] text-center bg-gray-900 text-white py-3 rounded-xl font-bold hover:bg-black transition">
                Réserver
            </a>
            
            <a href="comment.php?id=<?= $match['id'] ?>" class="flex-1 flex items-center justify-center bg-white border-2 border-gray-100 text-gray-600 rounded-xl hover:border-green-500 hover:text-green-600 transition-all shadow-sm" title="Ajouter un commentaire">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
            </a>
        </div>
    </div>
</div>
        <?php endforeach;?>
    </div>
    
</body>
</html>