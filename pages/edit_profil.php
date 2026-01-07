<?php
    require_once __DIR__ ."../../classes/Acheteur.php";

    $user=new Acheteur($_SESSION['user_id']);

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $telephone=$_POST['telephone'];

        $user->update_profile($nom,$prenom,$email,$telephone);
        header("location: ".$_SERVER['PHP_SELF']);

    }
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Modifier Profil - FootPass</title>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-2xl w-full">
        <a href="profile.php" class="inline-flex items-center gap-2 text-sm font-bold text-green-700 hover:text-green-900 mb-6 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Retour au profil
        </a>

        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100">
            <div class="mb-10">
                <h1 class="text-3xl font-black text-gray-900 uppercase">Modifier mes infos</h1>
                <p class="text-gray-500 mt-2">Mettez à jour vos coordonnées personnelles en un clic.</p>
            </div>

            <form action="#" method="POST" class="space-y-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase text-gray-400 ml-1">Nom</label>
                        <input type="text" name="nom" placeholder="Ex: Alami" value="<?php echo $user->get('nom') ?>" 
                            class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-100 outline-none transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase text-gray-400 ml-1">Prénom</label>
                        <input type="text" name="prenom" placeholder="Ex: Ahmed"  value="<?php echo $user->get('prenom') ?>"
                            class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-100 outline-none transition-all">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 ml-1">Adresse Email</label>
                    <input type="email" name="email" placeholder="ahmed.alami@email.com" value="<?php echo $user->get('email') ?>" 
                        class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-100 outline-none transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-black uppercase text-gray-400 ml-1">Numéro de téléphone</label>
                    <input type="tel" name="telephone" placeholder="06 00 00 00 00"  value="<?php echo $user->get('phone') ?>"
                        class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-100 outline-none transition-all">
                </div>

                <div class="flex flex-col md:flex-row gap-4 pt-8">
                    <button type="submit" class="flex-1 bg-green-700 text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-green-800 transition-all active:scale-95">
                        Enregistrer les modifications
                    </button>
                    <a href="profile.php" class="flex-1 bg-gray-100 text-gray-600 py-4 rounded-2xl font-bold text-center hover:bg-gray-200 transition-all">
                        Annuler
                    </a>
                </div>

            </form>
        </div>
    </div>

</body>
</html>