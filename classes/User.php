<?php
    require_once "../config/database.php";

    session_start();

    abstract class User{
        protected $nom;
        protected $prenom;
        protected $email;
        protected $phone;
        protected $role;
        protected $actif;
        protected $pwd;

        public function __construct($nom,$prenom,$email,$phone,$role,$actif,$pwd)
        {
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->email=$email;
            $this->phone=$phone;
            $this->role=$role;
            $this->actif=$actif;
            $this->pwd=$pwd;
        }




        static function register($nom,$prenom,$email,$phone,$pwd,$role,$actif){
            $pwd_hash=password_hash($pwd, PASSWORD_DEFAULT);
            $sql_prepare="INSERT INTO users(nom,prenom,email,phone,pwd,`role`,actif)
            values(?,?,?,?,?,?,?)";
            $db=Database::getInstance()->getConnection();
            $sql=$db->prepare($sql_prepare);
            $sql->execute([
                $nom,
                $prenom,
                $email,
                $phone,
                $pwd_hash,
                $role,
                $actif
            ]);
        


        }



        static function login($email,$pwd){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="SELECT * from users where email=? LIMIT 1";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([
                $email
            ]);

            $user=$sql->fetch(PDO::FETCH_ASSOC);
            
            if(password_verify($pwd,$user['pwd'])){
                $_SESSION['user_id']=$user['id'];
                $_SESSION['user_role']=$user['role'];
                $_SESSION['user_nom']=$user['prenom'];
                var_dump($user);




            if($user['role']=='acheteur'){
                header("location: ../pages/home.php");
                exit();
            }else if($user['role']=="organisateur"){
                header("location: ../pages/organizer/stats.php");
                exit();
            }else if($user['role']=='admin'){
                header("location: ../pages/admin/dashboard.php");
                exit();
            }




            }

           
            


            }

    }



    
        


        

    












    


?>
