<?php
require_once __DIR__ ."../../config/database.php";
require_once __DIR__."../../classes/User.php";
require_once __DIR__."../../classes/Profile.php";

    Class Acheteur extends User implements Profile{

        static function findById($id){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="SELECT * from users where id=?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([
                $id
            ]);
            $result=$sql->fetch(PDO::FETCH_ASSOC);

            return $result;

        }

        static function get_profile($id){
            return self::findById($id);
            }

            static function update_profile($nom,$prenom,$email,$phone,$id){
                $db=Database::getInstance()->getConnection();
                $sql_prepare="UPDATE users set nom=?,prenom=?,email=?,phone=? where id=?";
                $sql=$db->prepare($sql_prepare);
                $sql->execute([
                    $nom,
                    $prenom,
                    $email,
                    $phone,
                    $id
                ]);
            }


            static function consulte_matches(){
                $db=Database::getInstance()->getConnection();
                $sql_prepare="SELECT E.id,E.equipe1,E.equipe2,E.date_match,E.heure_match,E.lieu,C.prix,C.type from events E 
                inner join categories C on C.match_id=E.id where E.statut='valide' and C.type='normal'";
                $sql=$db->prepare($sql_prepare);
                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }

            static function show_match_details($match_id){
                $db=Database::getInstance()->getConnection();
                $sql_prepare="SELECT E.id as match_id,C.id as category_id,E.equipe1,E.equipe2,E.date_match,E.heure_match,E.lieu,E.nb_places,C.nb_places_restantes,
                C.type,C.prix from events E inner join categories C on E.id=C.match_id where E.id=?";
                $sql=$db->prepare($sql_prepare);
                $sql->execute([
                    $match_id
                ]);
                return $sql->fetchAll(PDO::FETCH_ASSOC);
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
    }

?>
