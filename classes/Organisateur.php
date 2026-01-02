<?php
require_once "../classes/User.php";

    class Organisateur extends User{
        
        

        function __construct($nom, $prenom, $email, $phone, $role, $actif, $pwd){
            parent::__construct($nom, $prenom, $email, $phone, $role, $actif, $pwd);

        }
        function cree_event($equipe1,$equipe2,$date_match,$heure_match,$lieu
                            ,$duree,$nb_places,$statut,$organisateur_id,
                            $type_V,$prix_V,$type,$prix){
                              try{
                                $db=Database::getInstance()->getConnection();
                                $db->beginTransaction();
            
                $sql_prepare="INSERT into events(equipe1,equipe2,date_match,heure_match,lieu,
                duree,nb_places,statut,organisateur_id)values(?,?,?,?,?,?,?,?,?)";
                $sql=$db->prepare($sql_prepare);
                $sql->execute([
                    $equipe1,
                    $equipe2,
                    $date_match,
                    $heure_match,
                    $lieu,
                    $duree,
                    $nb_places,
                    $statut,
                    $organisateur_id
                ]);

                $match_id=$db->lastInsertedId();

                $sql_pre="INSERT into categories(type,prix,match_id)values(?,?,?)";
                $sql=$db->prepare($sql_pre);
                $sql->execute([
                    $type_V,
                    $prix_V,
                    $match_id
                ]);

                $sql_pr="INSERT into categories(type,prix,match_id)values(?,?,?)";
                $sql=$db->prepare($sql_pr);
                $sql->execute([
                    $type,
                    $prix,
                    $match_id
                ]);

                $db->commit();
                
                }catch(Exception $e){
                    $db->rollBack();
                    var_dump($e->getMessage());
                    
                }


        }
        
        
            
        

    }


?>