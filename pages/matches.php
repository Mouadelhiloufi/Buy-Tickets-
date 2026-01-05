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
            <h1 class="text-4xl font-black uppercase">Calendrier des Matchs</h1>
            <div class="flex gap-4">
                <input type="text" placeholder="Rechercher une équipe..." class="px-4 py-2 rounded-lg text-black w-64 outline-none">
                <select class="px-4 py-2 rounded-lg text-black">
                    <option>Tous les lieux</option>
                    <option>Casablanca</option>
                    <option>Rabat</option>
                </select>
            </div>
        </div>
    </div>
    <?php foreach($matches as $match):?>
        
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 pb-20">
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
                <a href="match_details.php?id=<?= $match['id'] ?>"  class="block w-full text-center bg-gray-900 text-white py-3 rounded-xl font-bold hover:bg-black transition">Réserver</a>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</body>
</html>