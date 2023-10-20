<?php
    class Legendaire extends Fence {
        public static $types = ['Dragon'];

        public function __construct (array $data){
            $this->hydrate($data);
        }
        public function hydrate ($data) {
            parent::hydrate($data);
        }
    }
?>