<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Confirmation d'Achat</title>
</head>
<body class="bg-green-50 flex items-center justify-center min-h-screen p-4">
    <div class="max-w-md w-full bg-white p-8 rounded-3xl shadow-xl text-center border-t-8 border-green-600">
        <div class="text-6xl text-green-500 mb-4">✅</div>
        <h1 class="text-2xl font-bold mb-2">Paiement Réussi !</h1>
        <p class="text-gray-600 mb-8">Votre billet a été généré avec succès. Vous allez le recevoir par email sous peu.</p>
        
       

        <div class="flex flex-col gap-4">
            <a href="home.php" class="w-full bg-green-600 text-white py-3 rounded-xl font-bold hover:bg-green-700 transition shadow-md">
                Retour à l'accueil
            </a>

            <a href="profile.php" class="text-green-700 font-bold hover:underline italic text-sm">
                Consulter mon historique →
            </a>
        </div>
    </div>
</body>
</html>