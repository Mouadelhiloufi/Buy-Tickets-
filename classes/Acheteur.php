<?php
require_once __DIR__ ."../../config/database.php";
require_once __DIR__."../../classes/User.php";
require_once __DIR__."../../classes/Profile.php";

    Class Acheteur extends User implements Profile{

        function __construct($id){
            parent::__construct($id);

        }

       

            function update_profile($nom,$prenom,$email,$phone){
                $db=Database::getInstance()->getConnection();
                $sql_prepare="UPDATE users set nom=?,prenom=?,email=?,phone=? where id=?";
                $sql=$db->prepare($sql_prepare);
                $sql->execute([
                    $nom,
                    $prenom,
                    $email,
                    $phone,
                    $this->data['id']
                ]);
            }


            

             

            function acheter_billet($acheteur_id,$match_id,$category_id,$numero_place,$prix){
                $db=Database::getInstance()->getConnection();
                $sql_prepare="INSERT into billets(acheteur_id,match_id,category_id,numero_place,prix)
                values(?,?,?,?,?)";
                $sql=$db->prepare($sql_prepare);
                $sql->execute([
                    $acheteur_id,
                    $match_id,
                    $category_id,
                    $numero_place,
                    $prix
                ]);


            }
            static function consulte_matches(){
                $db=Database::getInstance()->getConnection();
                $sql_prepare="SELECT E.statut,E.id,E.equipe1,E.equipe2,E.date_match,E.heure_match,E.lieu,C.prix,C.type from events E 
                inner join categories C on C.match_id=E.id where E.statut='valide' and C.type='normal'";
                $sql=$db->prepare($sql_prepare);
                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            

    }

?>
