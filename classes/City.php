<?php
    class City extends Fence {
        public static $types = ["Psy", "Normal", "Combat", "Electric"];


        public function __construct (array $data){
            $this->hydrate($data);
        }
        public function hydrate ($data) {
            parent::hydrate($data);
        }
    }
?>