<?php
    require_once __DIR__."../../../classes/Admin.php";
    $comments=Admin::acceder_comments();

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation des Commentaires - FootPass</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen p-4 md:p-10">

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-black text-gray-800 uppercase tracking-tighter italic">Commentaires reçus</h1>
                <p class="text-gray-500 font-medium">Historique complet des avis laissés par les spectateurs.</p>
            </div>
            <a href="dashboard.php" class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-gray-200 text-xs font-black uppercase tracking-widest hover:bg-gray-50 transition-all">
                <i class="fas fa-arrow-left mr-2"></i> Retour
            </a>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="p-6 text-xs font-black uppercase text-gray-400 tracking-widest">Acheteur & Match</th>
                            <th class="p-6 text-xs font-black uppercase text-gray-400 tracking-widest">Avis</th>
                            <th class="p-6 text-xs font-black uppercase text-gray-400 tracking-widest">Note</th>
                            <th class="p-6 text-xs font-black uppercase text-gray-400 tracking-widest text-right">État</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php foreach ($comments as $comment):?>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="p-6">
                                <div class="font-bold text-gray-800"><?= $comment['nom'] ." ".$comment['prenom'] ?></div>
                                <div class="text-[10px] font-black text-green-600 uppercase italic"><?= $comment['equipe1']." vs ".$comment['equipe2'] ?></div>
                            </td>
                            <td class="p-6">
                                <p class="text-sm text-gray-600 max-w-sm italic leading-relaxed">
                                    <?= $comment['contenu'] ?>
                                </p>
                                <span class="text-[9px] text-gray-400 font-bold">Le 02/01/2026</span>
                            </td>
                            <td class="p-6">
                                <div class="flex text-orange-400 text-xs gap-0.5">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star text-gray-200"></i>
                                </div>
                            </td>
                            <td class="p-6 text-right">
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-[9px] font-black uppercase tracking-widest">
                                    <?= $comment['statut'] ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach;?>

                        

                    </tbody>
                </table>
            </div>
        </div>

        

</body>
</html>