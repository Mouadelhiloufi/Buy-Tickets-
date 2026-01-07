<?php
    class Category {
        public $id;
        public $type;
        public $prix;
        public $nb_places_restantes;

        public function __construct($id, $type, $prix, $nb) {
        $this->id = $id;
        $this->type = $type;
        $this->prix = $prix;
        $this->nb_places_restantes = $nb;
    }
    
}
?>