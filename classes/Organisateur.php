<?php

    // require_once __DIR__ . "/User.php";
    require_once __DIR__ . '/User.php';
    require_once __DIR__ . '/Profile.php';


    class Organisateur extends User implements Profile{
        
        

        function __construct($id){
            parent::__construct($id);

        }



        public function update_profile($nom,$prenom,$email,$phone){
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




        


        


         function Consult_statistique(){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="select count(B.id) as total_billets from users U inner join events 
            E on E.organisateur_id=U.id inner join billets B on B.match_id=E.id where U.id = ?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([
                $this->data['id']
            ]);

            $res=$sql->fetch(PDO::FETCH_ASSOC);
            $total_billets=$res['total_billets'];       
             

            $sql_pre="SELECT count(id) as total_events from events where organisateur_id=? and statut='valide'";
            $sql=$db->prepare($sql_pre);
            $sql->execute([
                $this->data['id']
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
                        where organisateur_id=?
                        GROUP BY e.id
                        ORDER BY total_reservations DESC
                        LIMIT 1;";
            $sql=$db->prepare($sql_prep);
            $sql->execute([$this->data['id']]);
            $max_vendu=$sql->fetch(PDO::FETCH_ASSOC);




            return[
            'total_billets'=>$total_billets,
            'total_events'=>$total_events,
            'max_vendu'=>$max_vendu
            ];
            
        }

             

            public function consult_comments(){
                $db=Database::getInstance()->getConnection();

                $sql_prepare="SELECT U.nom,U.prenom,E.equipe1,E.equipe2,C.contenu,C.note,C.date_commentaire
                from users U inner join commentaires C on C.acheteur_id=U.id 
                inner join events E on E.id=C.match_id where E.organisateur_id=?";

                $sql=$db->prepare($sql_prepare);
                $sql->execute([
                    $this->data['id']
                ]);
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }




        
        

    }


?>