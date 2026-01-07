<?php
    session_start();
    require_once __DIR__."../../classes/Commentaire.php";

    $match_id = $_GET['id'];

    $date_match=Commentaire::date_match($match_id);
    $match_date=strtotime($date_match['date_match']);
    $today=strtotime(date('Y-m-d'));
    // var_dump($date_match);
    // var_dump($today);
    if($match_date>$today){
        header("location: home.php");
        exit();
    }


    if($_SERVER['REQUEST_METHOD']=='POST'){
        $acheteur_id=$_SESSION['user_id'];
        $contenu=$_POST['commentaire'];
        $note="10";
        
        Commentaire::add_comment($acheteur_id,$match_id,$contenu,$note);
        header("location: home.php");
        exit();
    }

    



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ajouter un commentaire</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-xl w-full bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-gray-100">
        <div class="bg-green-900 p-8 text-white text-center">
            <h2 class="text-2xl font-black uppercase tracking-widest">Votre Avis</h2>
            <p class="text-green-200 text-sm mt-2 italic">Partagez votre expérience sur ce match</p>
        </div>

        <div class="p-8">
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-8 rounded-r-xl">
                <p class="text-blue-700 text-sm font-bold">
                    Match ID: #<?= htmlspecialchars($match_id) ?>
                </p>
                <p class="text-blue-600 text-xs mt-1">Votre commentaire sera visible par tous les supporteurs.</p>
            </div>

            <form action="" method="POST" class="space-y-6">
                

                <div class="space-y-2">
                    <label class="block text-xs font-black uppercase text-gray-400 ml-1">Message</label>
                    <textarea 
                        name="commentaire" 
                        rows="5" 
                        placeholder="Qu'avez-vous pensé de l'ambiance, de l'organisation ou du stade ?"
                        class="w-full p-5 bg-gray-50 border border-gray-200 rounded-3xl focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-100 outline-none transition-all resize-none"
                        required
                    ></textarea>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl">
                    <span class="text-sm font-bold text-gray-700">Note globale</span>
                    <div class="flex gap-1 text-orange-400 text-xl">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span class="text-gray-300">★</span>
                    </div>
                </div>

                <div class="flex flex-col gap-3 pt-4">
                    <button type="submit" class="w-full bg-green-700 text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-green-800 hover:-translate-y-1 transition-all active:scale-95">
                        Publier le commentaire
                    </button>
                    <a href="matches.php" class="w-full text-center text-gray-500 text-sm font-bold hover:text-gray-800 transition">
                        Annuler et retourner
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>