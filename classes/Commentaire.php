<?php

    require_once __DIR__."../../config/database.php";

    class Commentaire{
        private $id;
        private $acheteur_id;
        private $match_id;
        private $contenu;
        private $note;
        private $date_commentaire;

        public function __construct($id)
        {
            $this->id=$id;

        }

        public function remplir_details(){
             $db=Database::getInstance()->getConnection();
            $sql_prepare="SELECT * from billets where id=?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([$this->id]);
            $billet=$sql->fetch(PDO::FETCH_ASSOC);
            
            
            $this->acheteur_id=$billet['acheteur_id'];
            $this->match_id=$billet['match_id'];
            $this->contenu=$billet['contenu'];
            $this->note=$billet['note'];
            $this->date_commentaire=$billet['date_commentaire'];
        }

        static function date_match($match_id){$db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT date_match FROM events WHERE id = ?");
        $stmt->execute([$match_id]);
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }


        static function add_comment($acheteur_id,$match_id,$contenu,$note){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="INSERT into commentaires(acheteur_id,match_id,contenu,note)
            values(?,?,?,?)";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([$acheteur_id,
                            $match_id,
                            $contenu,
                            $note
                            ]);
        }




    }


?>