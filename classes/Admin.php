<?php

    require_once __DIR__ . "/User.php";
    require_once __DIR__ . "/Profile.php";
    require_once __DIR__ . "../../config/database.php";


    class Admin extends User{

        function __construct($nom, $prenom, $email, $phone, $role, $actif, $pwd){
            parent::__construct($nom, $prenom, $email, $phone, $role, $actif, $pwd);

        }

        function show_match(){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="SELECT U.id as organisateur_id,E.id,U.nom,U.prenom,E.equipe1,
            E.equipe2,E.statut,E.lieu,E.heure_match,E.date_match from users U 
            inner join events E on E.organisateur_id=U.id";
            $sql=$db->prepare($sql_prepare);
            $sql->execute();
            $matches=$sql->fetchAll(PDO::FETCH_ASSOC);
            return $matches;

        }


        function valid_match($organisateur_id,$event_id){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="UPDATE events E inner join users U on E.organisateur_id=U.id 
            set E.statut='valide' where U.id=? and E.id=?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([
                $organisateur_id,
                $event_id
            ]);

        }

        function refuse_match($organisateur_id,$event_id){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="UPDATE events E inner join users U on E.organisateur_id=U.id 
            set E.statut='refuse' where U.id=? and E.id=?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([
                $organisateur_id,
                $event_id
            ]);
        }

        static function acceder_comments(){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="SELECT U.nom,U.prenom,E.equipe1,E.equipe2,E.statut,C.contenu,C.note from users U
            inner join events E on E.organisateur_id=U.id inner join
            commentaires C on C.match_id=E.id";
            $sql=$db->prepare($sql_prepare);
            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        static function show_users(){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="SELECT * from users where role='organisateur' or role='acheteur'";
            $sql=$db->prepare($sql_prepare);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        static function active($id){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="UPDATE users set actif=1 where id=?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([$id]);
        }

        static function desactive($id){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="UPDATE users set actif=0 where id=?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([$id]);
        }

    }
?>