<?php

// require_once __DIR__ . "/User.php";
    require_once __DIR__ . '/User.php';
    require_once __DIR__ . '/Profile.php';


    class Organisateur extends User implements Profile{
        
        

        function __construct($nom, $prenom, $email, $phone, $role, $actif, $pwd){
            parent::__construct($nom, $prenom, $email, $phone, $role, $actif, $pwd);

        }
        function cree_event($equipe1,$equipe2,$date_match,$heure_match,$lieu
                            ,$duree,$nb_places,$statut,$organisateur_id,
                            $type_V,$prix_V,$nb_place_V,$type,$prix,$nb_place_N){
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

                $match_id=$db->lastInsertId();

                $sql_pre="INSERT into categories(type,prix,match_id,nb_places_restantes)values(?,?,?,?)";
                $sql=$db->prepare($sql_pre);
                $sql->execute([
                    $type_V,
                    $prix_V,
                    $match_id,
                    $nb_place_V
                ]);

                $sql_pr="INSERT into categories(type,prix,match_id,nb_places_restantes)values(?,?,?,?)";
                $sql=$db->prepare($sql_pr);
                $sql->execute([
                    $type,
                    $prix,
                    $match_id,
                    $nb_place_N
                ]);

                $db->commit();
                
                }catch(Exception $e){
                    $db->rollBack();
                    var_dump($e->getMessage());
                    
                }


        }


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


        static function Consult_statistique($id){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="select count(B.id) as total_billets from users U inner join events 
            E on E.organisateur_id=U.id inner join billets B on B.match_id=E.id where U.id = ?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([
                $id
            ]);

            $res=$sql->fetch(PDO::FETCH_ASSOC);
            $total_billets=$res['total_billets'];       
             

            $sql_pre="select count(id) as total_events from events where organisateur_id=? and statut='valide'";
            $sql=$db->prepare($sql_pre);
            $sql->execute([
                $id
            ]);

            $res=$sql->fetch(PDO::FETCH_ASSOC);
            $total_events=$res['total_events'];

            


             $sql_prep="SELECT 
                        e.id,
                        e.equipe1,
                        e.equipe2,
                        COUNT(b.id) AS total_reservations
                        FROM events e
                        inner JOIN billets b on b.match_id = e.id
                        GROUP BY e.id
                        ORDER BY total_reservations DESC
                        LIMIT 1;";
            $sql=$db->prepare($sql_prep);
            $sql->execute();

            $max_vendu=$sql->fetch(PDO::FETCH_ASSOC);




            return[
            'total_billets'=>$total_billets,
            'total_events'=>$total_events,
            'max_vendu'=>$max_vendu
            ];


            
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



            




        
        

    }


?>