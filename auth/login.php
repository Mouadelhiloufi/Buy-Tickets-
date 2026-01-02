<?php
require_once "../classes/User.php";

if($_SERVER['REQUEST_METHOD']=="POST"){

    $email=$_POST['email'];
    $pwd=$_POST['pwd'];

    User::login($email,$pwd);



}



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - FootPass</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .stadium-bg {
            background: linear-gradient(rgba(21, 128, 61, 0.9), rgba(6, 78, 59, 0.95)), url('https://images.unsplash.com/photo-1522778119026-d647f0596c20?auto=format&fit=crop&w=1500&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="stadium-bg min-h-screen flex items-center justify-center py-12 px-4">

    <div class="max-w-md w-full">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full shadow-2xl mb-4">
                <span class="text-4xl">⚽</span>
            </div>
            <h1 class="text-4xl font-black italic tracking-tighter text-white uppercase">FootPass</h1>
            <p class="text-green-100 font-light">Connectez-vous pour accéder au stade</p>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl p-8 border-b-8 border-green-600">
            <form action="" method="POST" class="space-y-5">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1 uppercase tracking-wider italic">Email</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="email" name="email" placeholder="supporter@email.com" class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1 uppercase tracking-wider italic">Mot de passe</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="password" name="pwd" placeholder="••••••••" class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition">
                    </div>
                    <div class="text-right mt-2">
                        <a href="#" class="text-xs text-green-700 hover:underline font-bold">Mot de passe oublié ?</a>
                    </div>
                </div>

                <button type="submit" class="w-full bg-green-700 text-white py-4 rounded-xl font-black uppercase tracking-widest hover:bg-green-600 transition shadow-lg active:scale-95">
                    Se Connecter
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100">
                <p class="text-center text-gray-500 text-sm mb-4 italic">Pas encore de compte ?</p>
                <a href="register.php" class="block w-full text-center bg-gray-900 text-white py-3 rounded-xl font-bold hover:bg-black transition uppercase text-sm">
                    Créer un compte supporter
                </a>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="../index.php" class="text-white/70 hover:text-white text-sm font-bold italic transition">
                <i class="fas fa-arrow-left mr-2"></i> Retour à l'accueil
            </a>
        </div>
    </div>

</body>
</html>