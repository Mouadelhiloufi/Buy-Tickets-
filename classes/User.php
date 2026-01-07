<?php
    // require_once "../config/database.php";
    require_once __DIR__ . '/../config/database.php';

    session_start();

    abstract class User{
        protected $data;
        

        public function __construct($id)
        {
            $sql_pre="SELECT * from users where id=?";
            $db=Database::getInstance()->getConnection();
            $sql=$db->prepare($sql_pre);
            $sql->execute([
                $id
            ]);
            $this->data=$sql->fetch(PDO::FETCH_ASSOC);
             
        }

        public function get($key){
            return $this->data[$key];
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


    }



    
        


        

    












    


?>
