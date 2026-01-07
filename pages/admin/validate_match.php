<?php

    require_once __DIR__ . "../../../classes/Admin.php";
    require_once __DIR__ . "../../../classes/Organisateur.php";


    $user=Organisateur::findById($_SESSION['user_id']);


    $admin=new Admin($_SESSION['user_id']);

  $matches=$admin->show_match();
  
 

  if($_SERVER['REQUEST_METHOD']=="POST"){

    $organisateur_id=$_POST['organisateur_id'];
    $event_id=$_POST['event_id'];


    if($_POST['action']=="valide"){
        $admin->valid_match($organisateur_id,$event_id);
        header("location: " .$_SERVER['PHP_SELF']);
        exit();
    }else{
        $admin->refuse_match($organisateur_id,$event_id);
        header("location: " .$_SERVER['PHP_SELF']);
        exit();
    }
  }


  





?>





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
                    <?php foreach($matches as $match): ?>
                        <form action="" method="POST">
                <input type="hidden" name="organisateur_id" value="<?= $match['organisateur_id'] ?>">
                <input type="hidden" name="event_id" value="<?= $match['id'] ?>">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-5">
                            <div class="flex items-center gap-3">
                                <span class="text-2xl">⚽</span>
                                <div>
                                    <p class="font-black text-gray-800 uppercase"><?= $match['equipe1'] ."vs". $match['equipe2'] ?></p>
                                    
                                </div>
                            </div>
                        </td>
                        <td class="p-5 text-gray-600 font-medium italic text-sm"><?= $match['nom'] . " ".$match['prenom'] ?></td>
                        <td class="p-5 text-center">
                            <p class="text-sm font-bold"><?= $match['date_match'] ."  - ".$match['heure_match'] ?> </p>
                            <p class="text-xs text-gray-400"><?= $match['lieu'] ?></p>
                        </td>
                        <td class="p-5 text-center">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-[10px] font-black uppercase tracking-widest border border-yellow-200"><?= $match['statut'] ?></span>
                        </td>
                        <td class="p-5 text-right">
                            <div class="flex justify-end gap-2">
                               <button type="submit" name="action" value="valide"
                             class="bg-green-600 text-white px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-tighter">Accepter</button>
                            <button type="submit" name="action" value="refuse"
                             class="bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-tighter">Refuser</button>
                            </div>
                        </td>
                    </tr>
                    </form>
                <?php endforeach;?>

                    

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