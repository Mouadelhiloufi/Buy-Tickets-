<?php

    require_once __DIR__ . '/../../classes/Organisateur.php';
    $user=Organisateur::get_profile($_SESSION['user_id']);

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];

        $update=Organisateur::update_profile($nom,$prenom,$email,$phone,$_SESSION['user_id']);
        header("location: ". $_SERVER['PHP_SELF']);
    }


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil | FootPass</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .profile-gradient {
            background: linear-gradient(135deg, #064e3b 0%, #111827 100%);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen pb-12">

    <div class="max-w-4xl mx-auto px-4 py-10">
        
        <div class="flex items-center justify-between mb-8">
            <a href="stats.php" class="text-green-800 font-bold flex items-center gap-2 hover:gap-3 transition-all">
                <i class="fas fa-chevron-left"></i> Retour au Dashboard
            </a>
            <h1 class="text-2xl font-black uppercase italic text-gray-800 tracking-tighter">Paramètres du Profil</h1>
        </div>

        <div class="hidden bg-green-100 text-green-700 p-4 rounded-2xl mb-6 font-bold shadow-sm border-l-4 border-green-600 flex items-center gap-3">
            <i class="fas fa-check-circle text-xl"></i>
            <span>Vos modifications ont été enregistrées avec succès.</span>
        </div>

        <div class="grid grid-cols-1 gap-8">
            
            <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100">
                <div class="profile-gradient p-6 text-white flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-black uppercase tracking-tight italic">Informations de contact</h2>
                        <p class="text-green-400 text-[10px] font-bold uppercase tracking-widest">Identité officielle de l'organisateur</p>
                    </div>
                    <i class="fas fa-user-circle text-4xl opacity-50"></i>
                </div>

                <form action="#" method="POST" class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 ml-1">Nom de famille</label>
                            <input type="text" name="nom" value="<?php echo $user['nom']; ?>" placeholder="Ex: El Amrani" 
                                   class="w-full bg-gray-50 border-2 border-gray-100 p-4 rounded-2xl focus:border-green-600 outline-none transition font-bold text-gray-700">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 ml-1">Prénom</label>
                            <input type="text" name="prenom" value="<?php echo $user['prenom']; ?>" placeholder="Ex: Yassine" 
                                   class="w-full bg-gray-50 border-2 border-gray-100 p-4 rounded-2xl focus:border-green-600 outline-none transition font-bold text-gray-700">
                        </div>
                        <div class="space-y-2 md:col-span-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 ml-1">Adresse Email Professionnelle</label>
                            <input type="email" value="<?php echo $user['email']; ?>" name="email" placeholder="organisateur@footpass.ma" 
                                   class="w-full bg-gray-50 border-2 border-gray-100 p-4 rounded-2xl focus:border-green-600 outline-none transition font-bold text-gray-700">
                        </div>
                        <div class="space-y-2 md:col-span-2">
                            <label class="text-[10px] font-black uppercase text-gray-400 ml-1">Numéro de Téléphone</label>
                            <input type="tel" name="phone" value="<?php echo $user['phone']; ?>" placeholder="+212 600 000 000" 
                                   class="w-full bg-gray-50 border-2 border-gray-100 p-4 rounded-2xl focus:border-green-600 outline-none transition font-bold text-gray-700">
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-green-900 text-white font-black uppercase py-5 rounded-2xl shadow-lg hover:bg-green-800 transition transform active:scale-[0.98] tracking-widest">
                        Mettre à jour mes informations
                    </button>
                </form>
            </div>

            

            <div class="mt-4 p-6 border-2 border-dashed border-gray-200 rounded-[2.5rem] flex flex-col md:flex-row items-center justify-between gap-4">
                <div>
                    <h3 class="font-bold text-gray-800 text-sm">Zone de danger</h3>
                    <p class="text-xs text-gray-400 italic">La suppression du compte est irréversible.</p>
                </div>
                <button class="text-red-500 text-xs font-black uppercase hover:underline">
                    Désactiver mon compte organisateur
                </button>
            </div>

        </div>
    </div>

</body>
</html>