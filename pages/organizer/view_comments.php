<?php
    require_once __DIR__ ."/../../classes/Organisateur.php";
    $organisateur=new Organisateur($_SESSION['user_id']);
    $comments=$organisateur->consult_comments()
    // var_dump($comments);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires Clients | FootPass</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">

    <div class="flex">
        <aside class="w-64 bg-green-900 min-h-screen text-white p-6 hidden md:flex flex-col justify-between fixed h-full">
            <div>
                <div class="text-2xl font-black mb-10 italic">FOOTPASS</div>
                <nav class="space-y-4">
                    <a href="stats.php" class="block py-2.5 px-4 rounded transition hover:bg-green-800">
                        <i class="fas fa-chart-line mr-2"></i> Statistiques
                    </a>
                    <a href="create_match.php" class="block py-2.5 px-4 rounded transition hover:bg-green-800 italic">
                        <i class="fas fa-plus-circle mr-2"></i> Créer Événements
                    </a>
                    <a href="#" class="block py-2.5 px-4 rounded bg-green-700 font-bold shadow-lg">
                        <i class="fas fa-comments mr-2"></i> Commentaires
                    </a>
                    <a href="edit_profile.php" class="block py-2.5 px-4 rounded transition hover:bg-green-800">
                        <i class="fas fa-user-edit mr-2"></i> Mon Profil
                    </a>
                </nav>
            </div>

            <div class="border-t border-green-800 pt-6">
                <a href="#" class="flex items-center gap-3 py-2.5 px-4 rounded transition hover:bg-red-600 text-green-300 hover:text-white font-bold uppercase text-xs tracking-widest">
                    <i class="fas fa-sign-out-alt"></i> Se déconnecter
                </a>
            </div>
        </aside>

        <main class="flex-1 p-8 md:ml-64">
            
            <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
                <div>
                    <h1 class="text-3xl font-black text-gray-800 uppercase tracking-tighter">Retours Clients</h1>
                    <p class="text-gray-500">Gérez les avis et l'expérience de vos spectateurs.</p>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-3">
                        <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center font-black">
                            12
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase text-gray-400 leading-none">Total</p>
                            <p class="text-xs font-bold text-gray-800 uppercase">Avis reçus</p>
                        </div>
                    </div>
                </div>
            </header>

            <div class="space-y-6">

                <?php foreach($comments as $comment):?>
                <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-md transition-all group">
                    <div class="flex flex-wrap justify-between items-start gap-4 mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-green-900 rounded-[1.2rem] flex items-center justify-center text-white text-lg font-black shadow-inner">
                                AS
                            </div>
                            <div>
                                <h4 class="font-black text-gray-800 uppercase tracking-tight"><?= $comment['nom'] . $comment['prenom']?>?></h4>
                                <div class="flex items-center gap-2">
                                    <span class="text-[10px] font-black text-green-600 bg-green-50 px-2 py-0.5 rounded uppercase tracking-widest border border-green-100 italic">Vérifié</span>
                                    <span class="text-[10px] text-gray-400 font-bold italic"><?= $comment['date_commentaire'] ?>?></span>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-1 text-orange-400 text-xs">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>

                    <div class="relative bg-gray-50 p-5 rounded-2xl mb-4">
                        <i class="fas fa-quote-left absolute -top-2 -left-2 text-gray-200 text-2xl"></i>
                        <p class="text-gray-600 italic text-sm leading-relaxed">
                            <?= $comment['contenu'] ?>
                        </p>
                    </div>

                    <div class="flex items-center justify-between border-t border-gray-50 pt-4 mt-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-gray-100 rounded flex items-center justify-center">
                                <i class="fas fa-futbol text-[10px] text-gray-400"></i>
                            </div>
                            <span class="text-[10px] font-black uppercase text-gray-400 tracking-tighter">
                                Match : <span class="text-gray-800 font-black"><?= $comment['equipe1']."vs".$comment['equipe2'] ?></span>
                            </span>
                        </div>
                        <button class="text-[10px] font-black uppercase text-red-500 hover:text-red-700 transition">
                            <i class="fas fa-flag mr-1"></i> Signaler
                        </button>
                    </div>
                </div>
                <?php endforeach;?>

                <!-- <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-md transition-all group">
                    <div class="flex flex-wrap justify-between items-start gap-4 mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-gray-200 rounded-[1.2rem] flex items-center justify-center text-gray-500 text-lg font-black shadow-inner">
                                YB
                            </div>
                            <div>
                                <h4 class="font-black text-gray-800 uppercase tracking-tight">Yassine Benani</h4>
                                <div class="flex items-center gap-2">
                                    <span class="text-[10px] font-black text-green-600 bg-green-50 px-2 py-0.5 rounded uppercase tracking-widest border border-green-100 italic">Vérifié</span>
                                    <span class="text-[10px] text-gray-400 font-bold italic">Il y a 5 jours</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-1 text-orange-400 text-xs">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star text-gray-300"></i>
                        </div>
                    </div>

                    <div class="relative bg-gray-50 p-5 rounded-2xl mb-4">
                        <i class="fas fa-quote-left absolute -top-2 -left-2 text-gray-200 text-2xl"></i>
                        <p class="text-gray-600 italic text-sm leading-relaxed">
                            Bon match, mais l'accès au parking était un peu compliqué. À améliorer pour la prochaine fois.
                        </p>
                    </div>

                    <div class="flex items-center justify-between border-t border-gray-50 pt-4 mt-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-gray-100 rounded flex items-center justify-center">
                                <i class="fas fa-futbol text-[10px] text-gray-400"></i>
                            </div>
                            <span class="text-[10px] font-black uppercase text-gray-400 tracking-tighter">
                                Match : <span class="text-gray-800 font-black">Maroc vs France</span>
                            </span>
                        </div>
                        <button class="text-[10px] font-black uppercase text-red-500 hover:text-red-700 transition">
                            <i class="fas fa-flag mr-1"></i> Signaler
                        </button>
                    </div>
                </div> -->

            </div>

            <!-- <div class="mt-10 flex justify-center gap-2">
                <button class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:bg-green-900 hover:text-white transition shadow-sm">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="w-10 h-10 rounded-xl bg-green-900 border border-green-900 flex items-center justify-center text-white font-bold shadow-lg">1</button>
                <button class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-green-900 hover:text-white transition shadow-sm">2</button>
                <button class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:bg-green-900 hover:text-white transition shadow-sm">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div> -->

        </main>
    </div>

</body>
</html>