<?php
    class Forest extends Fence {
        public static $types = ["Vol", "Insecte", "Plante", "Poison"];


        public function __construct (array $data){
            $this->hydrate($data);
        }
        public function hydrate ($data) {
            parent::hydrate($data);
        }
    }
?>