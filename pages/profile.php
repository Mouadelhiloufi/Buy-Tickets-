<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Mon Profil FootPass</title>
</head>
<body class="bg-gray-100">
    <div class="max-w-6xl mx-auto p-6 flex flex-col md:flex-row gap-8">
        <div class="w-full md:w-1/3 bg-white p-8 rounded-3xl shadow-lg h-fit">
            <div class="w-24 h-24 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center text-3xl">👤</div>
            <h2 class="text-center font-bold text-xl">Ahmed Alami</h2>
            <p class="text-center text-gray-500 mb-6 italic">Supporteur Passionné</p>
            <nav class="space-y-2">
                <a href="#" class="block p-3 bg-green-50 text-green-800 rounded-xl font-bold italic">Mes Billets</a>
                <a href="#" class="block p-3 hover:bg-gray-50 rounded-xl transition italic">Paramètres</a>
                <a href="logout.php" class="block p-3 text-red-600 hover:bg-red-50 rounded-xl transition italic">Déconnexion</a>
            </nav>
        </div>

        <div class="flex-1 bg-white p-8 rounded-3xl shadow-lg">
            <h2 class="text-2xl font-black mb-6 uppercase border-b-2 border-green-600 inline-block">Historique des Achats</h2>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 border rounded-2xl hover:bg-gray-50">
                    <div>
                        <p class="font-bold">WAC vs RSB</p>
                        <p class="text-xs text-gray-400">Acheté le 10/05/2025</p>
                    </div>
                    <div class="text-right">
                        <p class="text-green-600 font-bold">150 DH</p>
                        <button class="text-xs bg-gray-900 text-white px-3 py-1 rounded-full">PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>