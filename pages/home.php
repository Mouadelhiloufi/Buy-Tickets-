<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FootPass - Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1508098682722-e99c43a406b2?auto=format&fit=crop&w=1350&q=80');
            background-size: cover; background-position: center;
        }
    </style>
</head>
<body class="bg-gray-50">
    <nav class="bg-green-800 text-white sticky top-0 z-50 shadow-xl">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-2xl font-black italic tracking-tighter uppercase">⚽ FootPass</div>
            <div class="hidden md:flex gap-8 font-semibold">
                <a href="home.php" class="hover:text-green-300 transition">Accueil</a>
                <a href="matches.php" class="hover:text-green-300 transition">Matchs</a>
                <a href="profile.php" class="hover:text-green-300 transition">Mon Profil</a>
                <a href="../auth/logout.php" class="bg-white text-green-800 px-5 py-1 rounded-full text-sm">Deconnexion</a>
            </div>
        </div>
    </nav>

    <div class="hero-section h-[60vh] flex items-center justify-center text-center text-white">
        <div class="max-w-3xl px-4">
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 uppercase tracking-tighter">Le Football commence ici</h1>
            <p class="text-xl mb-8 text-gray-200">Réservez vos places en quelques clics pour les plus grandes compétitions nationales et internationales.</p>
            <a href="matches.php" class="bg-green-600 hover:bg-green-500 px-10 py-4 rounded-lg font-bold text-lg transition inline-block">Acheter un billet</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="bg-white p-8 rounded-2xl shadow-sm border-b-4 border-green-600 text-center">
                <i class="fas fa-ticket-alt text-4xl text-green-600 mb-4"></i>
                <h3 class="font-bold text-xl mb-2">Achat Rapide</h3>
                <p class="text-gray-600">Jusqu'à 4 billets par match en moins de 2 minutes.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border-b-4 border-green-600 text-center">
                <i class="fas fa-qrcode text-4xl text-green-600 mb-4"></i>
                <h3 class="font-bold text-xl mb-2">E-Billet Immédiat</h3>
                <p class="text-gray-600">Recevez votre ticket PDF avec QR Code par email.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border-b-4 border-green-600 text-center">
                <i class="fas fa-shield-alt text-4xl text-green-600 mb-4"></i>
                <h3 class="font-bold text-xl mb-2">Paiement Sécurisé</h3>
                <p class="text-gray-600">Une plateforme fiable pour tous les supporters.</p>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 text-white py-12 border-t-4 border-green-700">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-xl font-bold mb-4 italic">FOOTPASS 2025</p>
            <p class="text-gray-500">La plateforme officielle de billetterie sportive.</p>
        </div>
    </footer>
</body>
</html>