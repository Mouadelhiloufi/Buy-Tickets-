<?php

require_once __DIR__."../../classes/Acheteur.php";
require_once __DIR__."../../classes/Event.php";
require_once __DIR__."../../classes/Billets.php";
if(!isset($_SESSION['user_id'])){
    
        header("location: ../auth/login.php");
        exit();
}
    $match_id=$_GET['id'];
    $match_details=Event::show_match_details($match_id);


    if($_SERVER['REQUEST_METHOD']=="POST"){
        
        $acheteur_id=$_SESSION['user_id'];
        $match_id=$_POST['match_id'];
        $category_id=$_POST['category_id'];
        $numero_place=$_POST['nb_place'];
        $prix=$_POST['prix'];

        Billet::acheter_billet($acheteur_id,$match_id,$category_id,$numero_place,$prix);
        header("location: buy_ticket.php");
        exit();



    }

    
?>


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
                <div class="text-center"><div class="w-20 h-20 bg-white/20 rounded-full mb-2"></div><p class="font-bold"><?php echo $match_details[0]['equipe1']?></p></div>
                <div class="text-4xl font-black italic">VS</div>
                <div class="text-center"><div class="w-20 h-20 bg-white/20 rounded-full mb-2"></div><p class="font-bold"><?php echo $match_details[0]['equipe2']?></p></div>
            </div>
            
            <div class="p-10 grid md:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Infos Match</h2>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b py-2"><span>Date</span><span class="font-bold"><?php echo $match_details[0]['date_match'] ?></span></div>
                        <div class="flex justify-between border-b py-2"><span>Heure</span><span class="font-bold"><?php echo $match_details[0]['heure_match'] ?></span></div>
                        <div class="flex justify-between border-b py-2"><span>Lieu</span><span class="font-bold"><?php echo $match_details[0]['lieu'] ?></span></div>
                        <div class="flex justify-between border-b py-2"><span>Places dispo</span><span class="font-bold"><span id="places_restant"></span> / <?php echo $match_details[0]['nb_places'] ?></span></div>
                    </div>
                </div>

                <div class="bg-gray-100 p-8 rounded-2xl">
                    <h3 class="text-xl font-bold mb-4 italic text-green-800 underline">Acheter vos billets</h3>
                    <form method="POST" class="space-y-4">
    <input type="hidden" name="match_id" value="<?php echo $match_details[0]['match_id']?>">
    
    <select id="select" name="category_id" class="w-full p-3 rounded-lg border" required>
        <option value="">Sélectionnez une catégorie</option>
        
        <option data-prix="<?php echo $match_details[0]['prix']?>" 
                data-nb_places="<?php echo $match_details[0]['nb_places_restantes']?>" 
                value="<?php echo $match_details[0]['category_id']?>">
            Catégorie <?php echo $match_details[0]['type']." - ". $match_details[0]['prix']." DH" ?>
        </option>

        <option data-prix="<?php echo $match_details[1]['prix']?>" 
                data-nb_places="<?php echo $match_details[1]['nb_places_restantes']?>" 
                value="<?php echo $match_details[1]['category_id']?>">
            Catégorie <?php echo $match_details[1]['type']." - ". $match_details[1]['prix']." DH" ?>
        </option>
    </select>

    <input type="hidden" name="prix" id="input_prix" value="">
    
    <input name="nb_place" type="number" placeholder="Numéro de place" class="w-full p-3 rounded-lg border" required>
    
    <button class="w-full bg-green-700 text-white py-4 rounded-xl font-bold text-lg hover:bg-green-600 shadow-lg">
        Confirmer l'achat
    </button>
</form>
                </div>
            </div>
        </div>
    </div>
</body>


</html>

<script>
    const select = document.getElementById('select');
    const places = document.getElementById('places_restant');
    const inputPrix = document.getElementById('input_prix');

    select.addEventListener("change", function(e) {
        const selectedOption = this.options[this.selectedIndex];
        
        // Update places
        const nbPlaces = selectedOption.getAttribute('data-nb_places');
        places.textContent = nbPlaces || "0";

        // Update prix hidden input
        const prix = selectedOption.getAttribute('data-prix');
        inputPrix.value = prix || "";
    });
</script>