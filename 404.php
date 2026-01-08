<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>404 - Page Introuvable</title>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center p-5">
    <div class="max-w-md w-full text-center">
        <div class="relative">
            <h1 class="text-[120px] font-black text-green-700/20 leading-none">404</h1>
            <div class="absolute inset-0 flex items-center justify-center">
                <span class="text-4xl font-bold text-gray-800">Hors-jeu !</span>
            </div>
        </div>

        <div class="mt-8 bg-white p-8 rounded-3xl shadow-xl">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Oups ! La page a quitté le terrain.</h2>
            <p class="text-gray-600 mb-8">
                Il semble que vous ayez tenté une passe dans le vide. La page que vous cherchez n'existe pas ou a été déplacée.
            </p>

            <div class="flex flex-col gap-3">
                <a href="matches.php" class="w-full bg-green-700 text-white py-3 rounded-xl font-bold hover:bg-green-600 transition-all shadow-lg shadow-green-200">
                    Retourner aux matches
                </a>
                <a href="javascript:history.back()" class="w-full bg-gray-100 text-gray-600 py-3 rounded-xl font-bold hover:bg-gray-200 transition-all">
                    Page précédente
                </a>
            </div>
        </div>

        <p class="mt-8 text-gray-400 text-sm">
            &copy; 2026 FootPass - Billetterie Officielle
        </p>
    </div>
</body>
</html>