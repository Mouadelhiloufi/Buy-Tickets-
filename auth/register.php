<?php
    require_once "../classes/User.php";
    

    if($_SERVER["REQUEST_METHOD"]=='POST'){

        $nom=$_POST['lastname'];
        $prenom=$_POST['firstname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $pwd=$_POST['password'];
        $role=$_POST['role'];
        $actif="1";



        User::register($nom,$prenom,$email,$phone,$pwd,$role,$actif);
        header("location: login.php");

    }
    


    


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Officielle - FootPass</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .stadium-bg {
            background: linear-gradient(rgba(17, 24, 39, 0.85), rgba(6, 78, 59, 0.9)), url('https://images.unsplash.com/photo-1504450758481-7338eba7524a?auto=format&fit=crop&w=1500&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="stadium-bg min-h-screen flex items-center justify-center py-10 px-4">

    <div class="max-w-2xl w-full">
        <div class="text-center mb-8">
            <h1 class="text-5xl font-black italic tracking-tighter text-white uppercase leading-none">REJOINDRE LE CLUB</h1>
            <p class="text-green-300 font-bold uppercase tracking-widest text-xs mt-3 italic">Sélectionnez votre profil officiel</p>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border-b-8 border-green-700">
            <div class="p-8 md:p-12">
                
                <form action="" method="POST" class="space-y-6">
                    
                    <div class="space-y-3">
                        <label class="block text-xs font-black text-gray-400 uppercase ml-1 tracking-widest">Type de compte</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            
                            <label class="cursor-pointer group">
                                <input type="radio" name="role" value="acheteur" class="hidden peer" checked>
                                <div class="p-4 text-center border-2 border-gray-100 rounded-2xl transition-all peer-checked:border-green-600 peer-checked:bg-green-50 group-hover:border-green-200">
                                    <div class="text-2xl mb-1">🎟️</div>
                                    <div class="font-black uppercase text-[10px] tracking-tighter text-gray-700">Supporter</div>
                                </div>
                            </label>

                            <label class="cursor-pointer group">
                                <input type="radio" name="role" value="organisateur" class="hidden peer">
                                <div class="p-4 text-center border-2 border-gray-100 rounded-2xl transition-all peer-checked:border-green-600 peer-checked:bg-green-50 group-hover:border-green-200">
                                    <div class="text-2xl mb-1">🏟️</div>
                                    <div class="font-black uppercase text-[10px] tracking-tighter text-gray-700">Organisateur</div>
                                </div>
                            </label>

                            <label class="cursor-pointer group">
                                <input type="radio" name="role" value="admin" class="hidden peer">
                                <div class="p-4 text-center border-2 border-gray-100 rounded-2xl transition-all peer-checked:border-red-600 peer-checked:bg-red-50 group-hover:border-red-200">
                                    <div class="text-2xl mb-1">🛡️</div>
                                    <div class="font-black uppercase text-[10px] tracking-tighter text-gray-700">Admin Staff</div>
                                </div>
                            </label>

                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    <div class="space-y-1">
        <label class="text-xs font-black text-gray-700 uppercase ml-1 tracking-tighter">
            Prénom
        </label>
        <input type="text" name="firstname" placeholder="Ahmed"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition"
            required>
    </div>

    <div class="space-y-1">
        <label class="text-xs font-black text-gray-700 uppercase ml-1 tracking-tighter">
            Nom de famille
        </label>
        <input type="text" name="lastname" placeholder="Alami"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition"
            required>
    </div>

    <!-- EMAIL -->
    <div class="space-y-1">
        <label class="text-xs font-black text-gray-700 uppercase ml-1 tracking-tighter">
            Email professionnel
        </label>
        <input type="email" name="email" placeholder="nom@exemple.com"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition bg-gray-50"
            required>
    </div>

    <!-- TÉLÉPHONE -->
    <div class="space-y-1">
        <label class="text-xs font-black text-gray-700 uppercase ml-1 tracking-tighter">
            Numéro de téléphone mobile
        </label>
        <div class="relative">
            <span
                class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xs font-bold border-r pr-3 border-gray-200">
                +212
            </span>
            <input type="tel" name="phone" placeholder="6 00 00 00 00"
                class="w-full pl-20 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition"
                required>
        </div>
    </div>

    <!-- MOT DE PASSE -->
    <div class="space-y-1">
        <label class="text-xs font-black text-gray-700 uppercase ml-1 tracking-tighter">
            Mot de passe
        </label>
        <input type="password" name="password" placeholder="••••••••"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition"
            required>
    </div>

    <!-- CONFIRMATION -->
    <div class="space-y-1">
        <label class="text-xs font-black text-gray-700 uppercase ml-1 tracking-tighter">
            Confirmation
        </label>
        <input type="password" name="confirm_password" placeholder="••••••••"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition"
            required>
    </div>

</div>


                    <button type="submit" class="w-full bg-green-700 text-white py-4 rounded-xl font-black uppercase tracking-widest hover:bg-green-600 transition shadow-lg active:scale-95 mt-4">
                        Créer mon accès officiel
                    </button>
                </form>

                <div class="mt-8 text-center border-t border-gray-50 pt-6">
                    <p class="text-gray-400 text-sm italic font-medium">Déjà un compte ? 
                        <a href="login.php" class="text-green-700 font-black uppercase ml-1 hover:underline tracking-tighter transition-all">Se connecter</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>