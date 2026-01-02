<?php


    class Organisateur extends User{

        function __construct($nom, $prenom, $email, $phone, $role, $actif, $pwd){
            parent::__construct($nom, $prenom, $email, $phone, $role, $actif, $pwd);
            
        }
        
            
        

    }


?>