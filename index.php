<?php
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['user_role']=="organisateur"){
        header("location: pages/organizer/stats.php");
        exit();
    }else if($_SESSION['user_role']=='admin'){
        header("location: pages/admin/dashboard.php");
        exit();
    }else if($_SESSION['user_role']=='acheteur'){
        header("location: index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootPass - Billetterie Officielle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-pattern {
            background-color: #064e3b;
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&w=1500&q=80');
            background-size: cover;
            background-position: center;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(21, 128, 61, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <span class="text-3xl">⚽</span>
                <span class="text-2xl font-black italic tracking-tighter text-green-800">FOOTPASS</span>
            </div>
            <nav class="hidden md:flex gap-8 font-bold text-sm uppercase tracking-widest">
                <a href="index.php" class="text-green-700 border-b-2 border-green-700">Accueil</a>
                <a href="pages/matches.php" class="hover:text-green-700 transition">Matchs</a>
                <a href="auth/login.php" class="hover:text-green-700 transition">Connexion</a>
            </nav>
            <a href="auth/register.php" class="bg-green-700 text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-green-800 transition shadow-lg">S'INSCRIRE</a>
        </div>
    </header>

    <section class="hero-pattern h-[400px] flex items-center justify-center text-center text-white px-4">
        <div>
            <h1 class="text-4xl md:text-6xl font-black uppercase mb-4 tracking-tighter italic">Réservez votre place au stade</h1>
            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto font-light">
                La plateforme n°1 pour acheter vos billets de football en toute sécurité.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <button class="bg-green-600 hover:bg-green-500 text-white px-8 py-3 rounded-lg font-bold transition flex items-center gap-2">
                    <i class="fas fa-search"></i> Explorer les matchs
                </button>
            </div>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-4 py-12">
        <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-6">
            <div class="flex gap-3 overflow-x-auto pb-2 w-full md:w-auto">
                <button class="px-6 py-2 bg-green-700 text-white rounded-full font-bold text-sm whitespace-nowrap">Tous les matchs</button>
                <button class="px-6 py-2 bg-white border border-gray-200 hover:border-green-700 rounded-full font-bold text-sm text-gray-600 whitespace-nowrap transition">Ligue 1</button>
                <button class="px-6 py-2 bg-white border border-gray-200 hover:border-green-700 rounded-full font-bold text-sm text-gray-600 whitespace-nowrap transition">Coupe du Trône</button>
                <button class="px-6 py-2 bg-white border border-gray-200 hover:border-green-700 rounded-full font-bold text-sm text-gray-600 whitespace-nowrap transition">International</button>
            </div>
            
            <div class="relative w-full md:w-80">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Rechercher une équipe ou ville..." class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100 card-hover transition duration-300">
                <div class="bg-gray-100 p-8 flex justify-center items-center gap-6 relative">
                    <span class="absolute top-4 left-4 bg-green-100 text-green-800 text-[10px] font-black px-2 py-1 rounded uppercase tracking-widest">En vente</span>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white rounded-full shadow-sm flex items-center justify-center text-2xl mb-2">🦁</div>
                        <p class="font-bold text-sm uppercase">Equipe A</p>
                    </div>
                    <div class="text-xl font-black italic text-gray-300 uppercase">VS</div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white rounded-full shadow-sm flex items-center justify-center text-2xl mb-2">🦅</div>
                        <p class="font-bold text-sm uppercase">Equipe B</p>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-gray-500 text-xs mb-4">
                        <i class="fas fa-calendar"></i> 20 Mai 2025
                        <span class="mx-2">•</span>
                        <i class="fas fa-map-marker-alt"></i> Casablanca
                    </div>
                    <div class="flex justify-between items-end">
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-tighter">À partir de</p>
                            <p class="text-2xl font-black text-green-700 uppercase tracking-tighter">50 DH</p>
                        </div>
                        <a href="pages/match_details.php" class="bg-gray-900 text-white px-6 py-2 rounded-lg font-bold text-sm hover:bg-black transition uppercase italic">Acheter</a>
                    </div>
                </div>
            </div>

            </div>
    </main>

    <footer class="bg-gray-900 text-white pt-16 pb-8 border-t-8 border-green-700">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            <div>
                <div class="text-2xl font-black italic tracking-tighter mb-4">⚽ FOOTPASS</div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Plateforme sécurisée pour la vente de billets sportifs. Vivez votre passion au plus près de l'action.
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-4 uppercase text-green-500 italic">Liens Rapides</h4>
                <ul class="text-gray-400 text-sm space-y-2">
                    <li><a href="#" class="hover:text-white transition">Comment ça marche ?</a></li>
                    <li><a href="#" class="hover:text-white transition">Support client</a></li>
                    <li><a href="#" class="hover:text-white transition">Conditions Générales</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4 uppercase text-green-500 italic">Newsletter</h4>
                <div class="flex gap-2">
                    <input type="email" placeholder="Votre email" class="bg-gray-800 border-none rounded-lg px-4 py-2 text-sm w-full outline-none focus:ring-1 focus:ring-green-500">
                    <button class="bg-green-700 px-4 py-2 rounded-lg hover:bg-green-600 transition"><i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </div>
        <div class="text-center border-t border-gray-800 pt-8">
            <p class="text-gray-500 text-xs uppercase tracking-widest font-bold">© 2025 FootPass - Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>