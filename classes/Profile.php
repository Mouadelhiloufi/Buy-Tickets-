<?php
    interface Profile{

        static function get_profile($id);
        static function update_profile($nom,$prenom,$email,$phone,$id);


    }
    ?>