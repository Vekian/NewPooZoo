<?php
    class Cavern extends Fence {
        public static $types = ["Pierre", "Sol", "Spectre", "Poison"];


        public function __construct (array $data){
            $this->hydrate($data);
        }
        public function hydrate ($data) {
            parent::hydrate($data);
        }
    }
?>