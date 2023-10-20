<?php
    class Normal extends Fence {
        public static $types = ["Feu", "Normal", "Combat", "Psy", "Glace", "Electric"];

        public function __construct (array $data){
            $this->hydrate($data);
        }
        public function hydrate ($data) {
            parent::hydrate($data);
        }
    }
?>