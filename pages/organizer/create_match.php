<?php
    
  require_once __DIR__ . '/../../classes/Organisateur.php';


  $user=Organisateur::findById($_SESSION['user_id']);
  $organizer=new Organisateur($user['nom'],$user['prenom'],$user['email'],$user['phone']
  ,$user['role'],$user['actif'],$user['pwd']);



  if($_SERVER['REQUEST_METHOD']=="POST"){

        $nb_place_V=(int) $_POST['nb_place_vip'];
        $nb_place_N=(int) $_POST['nb_place_normal'];
        $nb_places=$nb_place_V+$nb_place_N;

    $equipe1=$_POST['equipe1'];
    $equipe2=$_POST['equipe2'];
    $lieu=$_POST['lieu'];
    $date_match=$_POST['date_match'];
    $heure_match=$_POST['heure_match'];
    $prix_V=$_POST['prix_vip'];
    $prix=$_POST['prix_normal'];
    $nb_places=$nb_place_V+$nb_place_N;
    $duree="90";
    $statut="en_attente";
    $organisateur_id=$_SESSION['user_id'];
    $type_V="vip";
    $type="normal";

    $organizer->cree_event($equipe1,$equipe2,$date_match,$heure_match,$lieu,$duree,
    $nb_places,$statut,$organisateur_id,$type_V,$prix_V,$nb_place_V,$type,$prix,$nb_place_N);
  }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organisateur - Créer un Match | FootPass</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .stadium-gradient {
            background: linear-gradient(135deg, #111827 0%, #064e3b 100%);
        }
        select option {
            background-color: white;
            color: #1f2937;
            padding: 10px;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen pb-12">

    <div class="stadium-gradient text-white py-8 px-6 mb-10 shadow-lg">
        <div class="max-w-5xl mx-auto">
            <a href="stats.php" class="inline-flex items-center gap-2 text-green-400 hover:text-white transition-colors mb-6 group">
                <i class="fas fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
                <span class="text-xs font-black uppercase tracking-widest">Retour au Dashboard</span>
            </a>

            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-black italic tracking-tighter uppercase">Nouvel Événement</h1>
                    <p class="text-green-400 text-xs font-bold uppercase tracking-widest mt-1">Configuration officielle du match</p>
                </div>
                <div class="text-right">
                    <span class="block text-xs opacity-60 uppercase font-bold">ID Organisateur</span>
                    <span class="text-xl font-mono font-bold text-green-400">#<?php echo $_SESSION['user_id'] ?? '007'; ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4">
        <form action="" method="POST" class="space-y-8">
            
            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-gray-100">
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-green-100 text-green-700 w-10 h-10 rounded-full flex items-center justify-center font-bold">1</div>
                    <h2 class="text-xl font-black uppercase tracking-tight text-gray-800">Affiche du Match</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase text-gray-400 ml-1">Équipe Domicile</label>
                        <select name="equipe1" class="w-full bg-gray-50 border-2 border-gray-100 p-4 rounded-2xl focus:border-green-500 outline-none transition font-bold" required>
                            <option value="">Sélectionner l'adversaire...</option>
                            <option value="Raja CA (Casablanca)">Raja CA (Casablanca)</option>
                            <option value="Wydad AC (Casablanca)">Wydad AC (Casablanca)</option>
                            <option value="AS FAR (Rabat)">AS FAR (Rabat)</option>
                            <option value="RS Berkane (Berkane)">RS Berkane (Berkane)</option>
                            <option value="Fath US (Rabat)">Fath US (Rabat)</option>
                            <option value="Union Touarga (Rabat)">Union Touarga (Rabat)</option>
                            <option value="Olympique Safi (Safi)">Olympique Safi (Safi)</option>
                            <option value="MAS Fès (Fès)">MAS Fès (Fès)</option>
                            <option value="Hassania Agadir (Agadir)">Hassania Agadir (Agadir)</option>
                            <option value="Ittihad Tanger (Tanger)">Ittihad Tanger (Tanger)</option>
                            <option value="MAT Tétouan (Tétouan)">MAT Tétouan (Tétouan)</option>
                            <option value="JS Soualem (Had Soualem)">JS Soualem (Had Soualem)</option>
                            <option value="RCA Zemamra (Zemamra)">RCA Zemamra (Zemamra)</option>
                            <option value="SCC Mohammédia (Mohammédia)">SCC Mohammédia (Mohammédia)</option>
                            <option value="CODM Meknès (Meknès)">CODM Meknès (Meknès)</option>
                            <option value="Difaâ El Jadida (El Jadida)">Difaâ El Jadida (El Jadida)</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <span class="bg-gray-800 text-white w-12 h-12 flex items-center justify-center rounded-full mx-auto font-black italic shadow-xl">VS</span>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase text-gray-400 ml-1">Équipe Extérieur</label>
                        <select name="equipe2" class="w-full bg-gray-50 border-2 border-gray-100 p-4 rounded-2xl focus:border-green-500 outline-none transition font-bold" required>
                            <option value="">Sélectionner l'adversaire...</option>
                            <option value="Raja CA (Casablanca)">Raja CA (Casablanca)</option>
                            <option value="Wydad AC (Casablanca)">Wydad AC (Casablanca)</option>
                            <option value="AS FAR (Rabat)">AS FAR (Rabat)</option>
                            <option value="RS Berkane (Berkane)">RS Berkane (Berkane)</option>
                            <option value="Fath US (Rabat)">Fath US (Rabat)</option>
                            <option value="Union Touarga (Rabat)">Union Touarga (Rabat)</option>
                            <option value="Olympique Safi (Safi)">Olympique Safi (Safi)</option>
                            <option value="MAS Fès (Fès)">MAS Fès (Fès)</option>
                            <option value="Hassania Agadir (Agadir)">Hassania Agadir (Agadir)</option>
                            <option value="Ittihad Tanger (Tanger)">Ittihad Tanger (Tanger)</option>
                            <option value="MAT Tétouan (Tétouan)">MAT Tétouan (Tétouan)</option>
                            <option value="JS Soualem (Had Soualem)">JS Soualem (Had Soualem)</option>
                            <option value="RCA Zemamra (Zemamra)">RCA Zemamra (Zemamra)</option>
                            <option value="SCC Mohammédia (Mohammédia)">SCC Mohammédia (Mohammédia)</option>
                            <option value="CODM Meknès (Meknès)">CODM Meknès (Meknès)</option>
                            <option value="Difaâ El Jadida (El Jadida)">Difaâ El Jadida (El Jadida)</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-gray-100">
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-blue-100 text-blue-700 w-10 h-10 rounded-full flex items-center justify-center font-bold">2</div>
                    <h2 class="text-xl font-black uppercase tracking-tight text-gray-800">Date & Lieu</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase text-gray-400 ml-1">Stade / Lieu</label>
                        <input type="text" name="lieu" placeholder="Stade Mohammed V" class="w-full bg-gray-50 border-2 border-gray-100 p-4 rounded-2xl focus:border-blue-500 outline-none transition" required>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase text-gray-400 ml-1">Date du Match</label>
                        <input type="date" name="date_match" class="w-full bg-gray-50 border-2 border-gray-100 p-4 rounded-2xl focus:border-blue-500 outline-none transition" required>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase text-gray-400 ml-1">Heure du Coup d'envoi</label>
                        <input type="time" name="heure_match" class="w-full bg-gray-50 border-2 border-gray-100 p-4 rounded-2xl focus:border-blue-500 outline-none transition" required>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-gray-100">
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-amber-100 text-amber-700 w-10 h-10 rounded-full flex items-center justify-center font-bold">3</div>
                    <h2 class="text-xl font-black uppercase tracking-tight text-gray-800">Gestion des Places</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="p-6 rounded-3xl bg-amber-50 border-2 border-amber-100">
                        <h4 class="font-black uppercase text-amber-800 text-sm mb-4 flex items-center gap-2">
                            <i class="fas fa-crown"></i> Catégorie VIP
                        </h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold uppercase text-amber-600">Prix (DH)</label>
                                <input type="number" name="prix_vip" placeholder="500" class="w-full p-3 rounded-xl border-none outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold uppercase text-amber-600">Nombre de places</label>
                                <input type="number" name="nb_place_vip" placeholder="100" class="w-full p-3 rounded-xl border-none outline-none focus:ring-2 focus:ring-amber-500">
                            </div>
                        </div>
                    </div>

                    <div class="p-6 rounded-3xl bg-gray-50 border-2 border-gray-100">
                        <h4 class="font-black uppercase text-gray-700 text-sm mb-4 flex items-center gap-2">
                            <i class="fas fa-ticket-alt"></i> Catégorie Standard
                        </h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold uppercase text-gray-500">Prix (DH)</label>
                                <input type="number" name="prix_normal" placeholder="50" class="w-full p-3 rounded-xl border-none outline-none focus:ring-2 focus:ring-gray-400">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold uppercase text-gray-500">Nombre de places</label>
                                <input type="number" name="nb_place_normal" placeholder="1000" class="w-full p-3 rounded-xl border-none outline-none focus:ring-2 focus:ring-gray-400">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 p-4 bg-red-50 rounded-2xl border border-red-100">
                    <p class="text-xs text-red-600 font-medium italic">
                        <i class="fas fa-info-circle mr-1"></i> 
                        La capacité totale du match sera calculée automatiquement selon la somme des places par catégorie.
                    </p>
                </div>
            </div>

            <button type="submit" class="w-full stadium-gradient text-white py-6 rounded-[2rem] font-black uppercase tracking-[0.2em] shadow-2xl hover:scale-[1.02] transition active:scale-95">
                Soumettre la demande d'événement
            </button>

        </form>
    </div>

</body>
</html>