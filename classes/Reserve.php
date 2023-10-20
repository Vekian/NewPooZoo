<?php
    class Reserve extends Fence {
        public static $types = ["Eau", "Normal", "Feu", "Electric", "Poison", "Insecte", "Dragon", "Vol", "Roche", "Sol", "Plante", "Glace", "Psy", "Spectre"];

        public function __construct (array $data){
            $this->hydrate($data);
        }
        public function hydrate ($data) {
            parent::hydrate($data);
        }
    }
?>