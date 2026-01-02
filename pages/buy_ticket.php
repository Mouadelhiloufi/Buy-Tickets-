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
        
        <div class="border-2 border-dashed border-gray-300 p-4 rounded-xl mb-8 text-left bg-gray-50">
            <p class="text-xs text-gray-400 uppercase font-bold">Billet Officiel #8829</p>
            <p class="font-bold text-lg">MAROC vs BRESIL</p>
            <p class="text-sm">Place : Rang B, Siège 42</p>
            <div class="mt-4 flex justify-center">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=Ticket8829" alt="QR Code">
            </div>
        </div>

        <a href="profile.php" class="inline-block text-green-700 font-bold hover:underline italic">Consulter mon historique →</a>
    </div>
</body>
</html>