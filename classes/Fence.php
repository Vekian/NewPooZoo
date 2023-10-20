<?php
    class Fence {
        private int $id;
        private string $name;
        private string $cleanliness;
        private string $background;
        private string $type;
        private int $population;
        private int $zooId;
        private static int $maxPokemons = 6;
        public static $fenceTypes = ['Normal', 'Forest', 'Aquarium', 'Reserve', 'Cavern', 'City', 'Legendaire'];

        /**
         * Get the value of id
         */
        public function getId(): int
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId(int $id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of name
         */
        public function getName(): string
        {
                return $this->name;
        }

        /**
         * Set the value of name
         */
        public function setName(string $name): self
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of cleanliness
         */
        public function getCleanliness(): string
        {
                return $this->cleanliness;
        }

        /**
         * Set the value of cleanliness
         */
        public function setCleanliness(string $cleanliness): self
        {
                $this->cleanliness = $cleanliness;

                return $this;
        }

        /**
         * Get the value of zooId
         */
        public function getZooId(): int
        {
                return $this->zooId;
        }

        /**
         * Set the value of zooId
         */
        public function setZooId(int $zooId): self
        {
                $this->zooId = $zooId;

                return $this;
        }

        /**
         * Get the value of background
         */
        public function getBackground(): string
        {
                return $this->background;
        }

        /**
         * Set the value of background
         */
        public function setBackground(string $background): self
        {
                $this->background = $background;

                return $this;
        }


        /**
         * Get the value of type
         */
        public function getType(): string
        {
                return $this->type;
        }

        /**
         * Set the value of type
         */
        public function setType(string $type): self
        {
                $this->type = $type;

                return $this;
        }

                /**
         * Get the value of population
         */
        public function getPopulation(): int
        {
                return $this->population;
        }

        /**
         * Set the value of population
         */
        public function setPopulation(int $population): self
        {
                $this->population = $population;

                return $this;
        }
        public function hydrate($data) {
                $this->setId($data['id']);
                $this->setName($data['nameFence']);
                $this->setCleanliness($data['cleanliness']);
                $this->setZooId($data['zoo_id']);
                $this->setBackground($data['background']);
                $this->setType($data['type']);
                $this->setPopulation($data['population']);
            }
    
            public function __construct($data) {
                $this->hydrate($data);
            }
        public function showRandomPokemons($pokemons){
                shuffle($pokemons);
                $arrayOfPokemons= array_slice($pokemons, 0, 2);
                foreach($arrayOfPokemons as $pokemonData){
                        $pokemonHeight = $pokemonData->getHeight() + 50;
                        echo('<img id="imgPokemonFence" src="' . $pokemonData->getAvatar() . '" height="'. $pokemonHeight .'px" class="mb-5">');
                    }
        }

        public function getDirty($db){
                $random = rand(0, 15);
                if ($random <= $this->population) {
                        if ($this->getCleanliness() === 'Propre'){
                                $this->setCleanliness('Correct');
                                $q = $db->prepare('UPDATE fences SET cleanliness = "Correct" WHERE id = :id');
                                $q->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                                $q->execute();
                        }
                        else if($this->getCleanliness() === 'Correct'){
                                $this->setCleanliness('Sale');
                                $q = $db->prepare('UPDATE fences SET cleanliness = "Sale" WHERE id = :id');
                                $q->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                                $q->execute();  
                        }
                }
        }

        public function checkCleanliness($db) {
                if ($this->getCleanliness() === 'Sale'){
                $q = $db->prepare('UPDATE pokemons SET health = health - 5 WHERE fence_id = :fence_id');
                $q->bindValue(':fence_id', $this->getId(), PDO::PARAM_INT);
                $q->execute();
                }
        }
    }
?>