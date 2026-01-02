<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Validation des Matchs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-gray-900 text-white p-4 shadow-xl">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-black italic tracking-tighter uppercase text-green-500">Panel Administration</h1>
            <a href="dashboard.php" class="text-sm hover:underline">Retour au Dashboard</a>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-10 px-4">
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-gray-800 uppercase italic">Validation des Événements</h2>
            <p class="text-gray-500">Gérez les demandes de publication envoyées par les organisateurs.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-5 uppercase text-xs tracking-wider">Événement / Équipes</th>
                        <th class="p-5 uppercase text-xs tracking-wider">Organisateur</th>
                        <th class="p-5 uppercase text-xs tracking-wider text-center">Date & Lieu</th>
                        <th class="p-5 uppercase text-xs tracking-wider text-center">Statut Actuel</th>
                        <th class="p-5 uppercase text-xs tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-5">
                            <div class="flex items-center gap-3">
                                <span class="text-2xl">⚽</span>
                                <div>
                                    <p class="font-black text-gray-800 uppercase">Raja CA vs Wydad AC</p>
                                    <p class="text-xs text-green-600 font-bold italic">Catégories: VIP, Zone A, Zone B</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-5 text-gray-600 font-medium italic text-sm">Organisateur #42 (Med Events)</td>
                        <td class="p-5 text-center">
                            <p class="text-sm font-bold">25/06/2025 - 20:00</p>
                            <p class="text-xs text-gray-400">Stade Mohamed V</p>
                        </td>
                        <td class="p-5 text-center">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-[10px] font-black uppercase tracking-widest border border-yellow-200">En attente</span>
                        </td>
                        <td class="p-5 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="confirmAction('valider')" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-xs font-bold uppercase transition shadow-md">
                                    Valider
                                </button>
                                <button onclick="confirmAction('refuser')" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-xs font-bold uppercase transition shadow-md">
                                    Refuser
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition opacity-75 bg-gray-50/50">
                        <td class="p-5">
                            <div class="flex items-center gap-3">
                                <span class="text-2xl">⚽</span>
                                <div>
                                    <p class="font-black text-gray-800 uppercase">Maroc vs Brésil</p>
                                    <p class="text-xs text-gray-400 italic">Match Amical International</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-5 text-gray-600 font-medium italic text-sm">Fédération Royale</td>
                        <td class="p-5 text-center">
                            <p class="text-sm font-bold">12/08/2025 - 21:00</p>
                            <p class="text-xs text-gray-400">Stade de Tanger</p>
                        </td>
                        <td class="p-5 text-center">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-black uppercase tracking-widest border border-green-200">Publié</span>
                        </td>
                        <td class="p-5 text-right">
                            <span class="text-gray-400 italic text-xs">Aucune action requise</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        </div>

    <script>
        function confirmAction(type) {
            const color = type === 'valider' ? 'vert' : 'rouge';
            if(confirm(`Voulez-vous vraiment ${type} cet événement ?`)) {
                alert(`L'événement a été ${type} avec succès.`);
                // Ici, vous ajouterez votre logique de redirection ou d'appel AJAX
            }
        }
    </script>

</body>
</html>