<?php
    require_once __DIR__."../../config/database.php";

    use Dompdf\Dompdf;
use Dompdf\Options;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';



    class Billet{
        private $id;
        private $acheteur_id;
        private $match_id;
        private $categorie_id;
        private $numero_place;
        private $prix;
        private $date_achat;
    

        public function __construct($id){
           $this->id=$id;
            $this->remplir_details();

        }

        function remplir_details(){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="SELECT * from billets where id=?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([$this->id]);
            $billet=$sql->fetch(PDO::FETCH_ASSOC);
            
            
            $this->acheteur_id=$billet['acheteur_id'];
            $this->match_id=$billet['match_id'];
            $this->categorie_id=$billet['categorie_id'];
            $this->prix=$billet['prix'];
            $this->date_achat=$billet['date_achat'];

            
        }

        static function acheter_billet($acheteur_id,$match_id,$categorie_id,$numero_place,$prix){
            try{
            $db=Database::getInstance()->getConnection();


        $sql_count = "SELECT COUNT(*) FROM billets WHERE acheteur_id = ? AND match_id = ?";
        $stmt_count = $db->prepare($sql_count);
        $stmt_count->execute([$acheteur_id, $match_id]);
        $deja_achetes = $stmt_count->fetchColumn();

        if ($deja_achetes >= 4) {
            header("location: home.php");
            exit();
            return ; 
        }



            $db->beginTransaction();
            $sql_prepare="INSERT into billets(acheteur_id,match_id,categorie_id,numero_place,prix)
            values(?,?,?,?,?)";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([
                $acheteur_id,
                $match_id,
                $categorie_id,
                $numero_place,
                $prix
            ]);

            $sql_pre="UPDATE categories set nb_places_restantes=nb_places_restantes-1 where id=?";
            $sql=$db->prepare($sql_pre);
            $sql->execute([
                $categorie_id
            ]);
            $db->commit();
            return true;
        }
        catch(Exception $e){
            $db->rollBack();
            return false;

        }

        }

        static function consulte_historique($acheteur_id){
            $db=Database::getInstance()->getConnection();
            $sql_prepare="SELECT B.prix,B.date_achat,E.equipe1,E.equipe2 from billets B
            inner join events E on B.match_id = E.id where B.acheteur_id=?";
            $sql=$db->prepare($sql_prepare);
            $sql->execute([$acheteur_id]);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

       



        static function genererEtEnvoyerBillet($billet_id, $user_email, $user_nom, $user_prenom, $equipe1, $equipe2) {
    // --- 1. CONFIGURATION DOMPDF ---
    $options = new \Dompdf\Options();
    $options->set('isRemoteEnabled', true); // Bach i-ban l-QR Code mn l-internet
    $dompdf = new \Dompdf\Dompdf($options);

    // --- 2. DESIGN DIAL L-BILLET (HTML) ---
    $html = "
    <div style='border: 4px solid #15803d; padding: 30px; font-family: sans-serif; width: 500px; margin: auto; border-radius: 20px;'>
        <h1 style='text-align: center; color: #15803d;'>FOOTPASS - BILLET</h1>
        <hr>
        <div style='margin: 20px 0;'>
            <h2 style='text-align: center;'>$equipe1 VS $equipe2</h2>
            <p><strong>Supporteur:</strong> $user_nom $user_prenom</p>
            <p><strong>Billet N°:</strong> #$billet_id</p>
        </div>
        <div style='text-align: center;'>
            <img src='https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=VALID-TICKET-$billet_id' width='120'>
        </div>
        <p style='font-size: 10px; color: #666; text-align: center; margin-top: 20px;'>
            Veuillez présenter ce billet à l'entrée du stade.
        </p>
    </div>";

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $pdf_content = $dompdf->output(); // Had $pdf_content hwa l-ficher PDF f la mémoire

    // --- 3. ENVOI GMAIL (PHPMailer) ---
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'houtm27@gmail.com'; 
        $mail->Password   = 'ytoqpktwipwkesdy'; // Hadak l-code dial 16 hrf mn Google
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom('ael46041@gmail.com', 'FootPass Store');
        $mail->addAddress($user_email);

        $mail->isHTML(true);
        $mail->Subject = "Votre billet pour $equipe1 vs $equipe2";
        $mail->Body    = "Bonjour $user_prenom, merci pour votre achat ! Votre billet est en pièce jointe.";

        // PIÈCE JOINTE : Hna fin kantsiftou l-PDF li t-ssweb
        $mail->addStringAttachment($pdf_content, "Billet_Match_$billet_id.pdf");

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Erreur d'envoi: {$mail->ErrorInfo}";
    }
}
        



    }

?>