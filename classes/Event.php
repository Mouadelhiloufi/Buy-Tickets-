<?php
    require_once __DIR__ . "../../classes/Category.php";
    require_once __DIR__ . "../../config/database.php";

    class Event{

        private $match_id;
        private $equipe1;
        private $equipe2;
        private $date_match;
        private $heure_match;
        private $lieu;
        private $duree;
        private $nb_places;
        private $statut;
        private $organisateur_id;
        private $categories=[];
        



       
        public function __construct($match_id,$equipe1,$equipe2,$date_match,$heure_match,$lieu,$duree
        ,$nb_places,$statut,$organisateur_id){
            $this->match_id=$match_id;
            $this->equipe1=$equipe1;
            $this->equipe2=$equipe2;
            $this->date_match=$date_match;
            $this->heure_match=$heure_match;
            $this->lieu=$lieu;
            $this->duree=$duree;
            $this->nb_places=$nb_places;
            $this->statut=$statut;
            $this->organisateur_id=$organisateur_id;
            self::remplirdetails();
        }

        public function remplirdetails(){
            $db=Database::getInstance()->getConnection();

            $sql_pre="SELECT * from events where id=?";
            $sql_match=$db->prepare($sql_pre);
            $sql_match->execute([
                $this->match_id
            ]);
            $events=$sql_match->fetchAll(PDO::FETCH_ASSOC);
            

            $sql_prepare="SELECT * from categories where match_id=?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([
                $this->match_id
            ]);
            $cat=$sql->fetchAll(PDO::FETCH_ASSOC);
            $CAT=[];
            foreach($cat as $c){
                $CAT[]=new Category($c['id'],$c['type'],$c['prix'],$c['nb_places_restantes']);        
            }
            $this->categories=$CAT;
        }
        
        
        




        static function show_match_details($id){
                $db=Database::getInstance()->getConnection();
                $sql_prepare="SELECT E.id as match_id,C.id as category_id,E.equipe1,
                E.equipe2,E.date_match,E.heure_match,E.lieu,E.nb_places,C.nb_places_restantes,
                C.type,C.prix from events E inner join categories C on E.id=C.match_id where E.id=?";
                $sql=$db->prepare($sql_prepare);
                $sql->execute([
                    $id
                ]);
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }

    



             

            

         static function cree_event($equipe1,$equipe2,$date_match,$heure_match,$lieu
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


    }


        



?>