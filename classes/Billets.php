<?php
    require_once __DIR__."../../config/database.php";
    class Billet{
        private $id;
        private $acheteur_id;
        private $match_id;
        private $categorie_id;
        private $numero_place;
        private $prix;
        private $date_achat;
    

        public function __construct($id){
           $this->id=$id;
            $this->remplir_details();

        }

        function remplir_details(){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="SELECT * from billets where id=?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([$this->id]);
            $billet=$sql->fetch(PDO::FETCH_ASSOC);
            
            
            $this->acheteur_id=$billet['acheteur_id'];
            $this->match_id=$billet['match_id'];
            $this->categorie_id=$billet['categorie_id'];
            $this->prix=$billet['prix'];
            $this->date_achat=$billet['date_achat'];

            
        }

        static function acheter_billet($acheteur_id,$match_id,$categorie_id,$numero_place,$prix){
            try{
            $db=Database::getInstance()->getConnection();


        $sql_count = "SELECT COUNT(*) FROM billets WHERE acheteur_id = ? AND match_id = ?";
        $stmt_count = $db->prepare($sql_count);
        $stmt_count->execute([$acheteur_id, $match_id]);
        $deja_achetes = $stmt_count->fetchColumn();

        if ($deja_achetes >= 4) {
            header("location: home.php");
            exit();
            return ; 
        }



            $db->beginTransaction();
            $sql_prepare="INSERT into billets(acheteur_id,match_id,categorie_id,numero_place,prix)
            values(?,?,?,?,?)";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([
                $acheteur_id,
                $match_id,
                $categorie_id,
                $numero_place,
                $prix
            ]);

            $sql_pre="UPDATE categories set nb_places_restantes=nb_places_restantes-1 where id=?";
            $sql=$db->prepare($sql_pre);
            $sql->execute([
                $categorie_id
            ]);
            $db->commit();
            return true;
        }
        catch(Exception $e){
            $db->rollBack();
            return false;

        }

        }

        static function consulte_historique($acheteur_id){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="SELECT B.prix,B.date_achat,E.equipe1,E.equipe2 from billets B
            inner join events E on B.match_id = E.id where B.acheteur_id=?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([$acheteur_id]);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        static function envoyerBillet($equipe1,$equipe2,$nom,$prenom,$numero_place,$prix,$billet_id){
            $html = "
<style>
    .ticket { border: 3px solid #15803d; border-radius: 15px; width: 500px; margin: auto; padding: 20px; font-family: sans-serif; }
    .header { text-align: center; border-bottom: 2px dashed #ddd; padding-bottom: 15px; }
    .match { font-size: 24px; font-weight: bold; color: #15803d; margin: 20px 0; text-align: center; }
    .details { display: flex; justify-content: space-between; margin-bottom: 10px; }
    .footer { font-size: 10px; color: #666; text-align: center; margin-top: 20px; }
</style>

<div class='ticket'>
    <div class='header'>
        <h1>FOOTPASS</h1>
        <p>Billet de Match Officiel</p>
    </div>
    
    <div class='match'>{$equipe1} VS {$equipe2}</div>
    
    <div class='details'>
        <p><strong>Supporteur:</strong> {$nom} {$prenom}</p>
        <p><strong>Place:</strong> N° {$numero_place}</p>
        <p><strong>Prix:</strong> {$prix} DH</p>
    </div>

    <div style='text-align: center; margin-top: 15px;'>
        <img src='https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=TICKET-{$billet_id}' />
    </div>

    <div class='footer italic'>
        Ce billet est personnel et non transmissible. Merci de le présenter à l'entrée.
    </div>
</div>
";
        }
        



    }

?>