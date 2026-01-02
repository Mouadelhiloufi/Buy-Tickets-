<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin - FootPass</title>
</head>
<body class="flex min-h-screen bg-gray-100 font-sans">
    <aside class="w-64 bg-gray-900 text-white p-6">
        <div class="text-2xl font-black mb-10 italic underline decoration-green-500">ADMIN PANEL</div>
        <nav class="space-y-4">
            <a href="#" class="block text-green-400 font-bold">📊 Statistiques Globales</a>
            <a href="#" class="block hover:text-green-400">⚖️ Valider Matchs</a>
            <a href="#" class="block hover:text-green-400">👥 Utilisateurs</a>
            <a href="#" class="block hover:text-green-400">💬 Commentaires</a>
        </nav>
    </aside>

    <main class="flex-1 p-10">
        <h1 class="text-3xl font-black mb-10 uppercase italic">Vue d'ensemble du système</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-white p-6 rounded-3xl shadow-sm border-l-8 border-green-600">
                <p class="text-gray-400 text-sm">Billets Vendus</p>
                <p class="text-3xl font-black">4,520</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border-l-8 border-blue-600">
                <p class="text-gray-400 text-sm">Chiffre d'Affaires</p>
                <p class="text-3xl font-black">226,000 DH</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border-l-8 border-yellow-500">
                <p class="text-gray-400 text-sm">Matchs en attente</p>
                <p class="text-3xl font-black">12</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border-l-8 border-red-600">
                <p class="text-gray-400 text-sm">Utilisateurs</p>
                <p class="text-3xl font-black">8,900</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 border-b">Match Demandé</th>
                        <th class="p-4 border-b">Organisateur</th>
                        <th class="p-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-4 border-b font-bold italic">Real Madrid vs Barça (Amical)</td>
                        <td class="p-4 border-b italic">EventPRO Maroc</td>
                        <td class="p-4 border-b flex gap-2">
                            <button class="bg-green-600 text-white px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-tighter">Accepter</button>
                            <button class="bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-tighter">Refuser</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>