<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Détails du Match</title>
</head>
<body class="bg-gray-50">
    <div class="max-w-5xl mx-auto my-10 p-4">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="h-48 bg-green-800 flex items-center justify-around text-white">
                <div class="text-center"><div class="w-20 h-20 bg-white/20 rounded-full mb-2"></div><p class="font-bold">EQUIPE A</p></div>
                <div class="text-4xl font-black italic">VS</div>
                <div class="text-center"><div class="w-20 h-20 bg-white/20 rounded-full mb-2"></div><p class="font-bold">EQUIPE B</p></div>
            </div>
            
            <div class="p-10 grid md:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Infos Match</h2>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b py-2"><span>Date</span><span class="font-bold">12/07/2025</span></div>
                        <div class="flex justify-between border-b py-2"><span>Heure</span><span class="font-bold">21:00</span></div>
                        <div class="flex justify-between border-b py-2"><span>Lieu</span><span class="font-bold">Stade de Tanger</span></div>
                        <div class="flex justify-between border-b py-2"><span>Places dispo</span><span class="font-bold">1,240 / 2000</span></div>
                    </div>
                </div>

                <div class="bg-gray-100 p-8 rounded-2xl">
                    <h3 class="text-xl font-bold mb-4 italic text-green-800 underline">Acheter vos billets</h3>
                    <form action="buy_ticket.php" class="space-y-4">
                        <select class="w-full p-3 rounded-lg border">
                            <option>Catégorie VIP - 500 DH</option>
                            <option>Catégorie 1 - 100 DH</option>
                            <option>Catégorie 2 - 50 DH</option>
                        </select>
                        <input type="number" max="4" min="1" placeholder="Nombre de places" class="w-full p-3 rounded-lg border">
                        <button class="w-full bg-green-700 text-white py-4 rounded-xl font-bold text-lg hover:bg-green-600 shadow-lg">Confirmer l'achat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>