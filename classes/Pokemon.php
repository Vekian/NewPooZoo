<?php
        abstract class Pokemon {
        protected int $id;
        protected int $age;
        protected string $sex;
        protected int $weight;
        protected int $height;
        protected int $health;
        protected bool $hungry;
        protected bool $sleepy;
        protected bool $sleeping;
        protected bool $sick;
        protected int $speciesId;
        protected int $fenceId;

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
         * Get the value of age
         */
        public function getAge(): int
        {
                return $this->age;
        }

        /**
         * Set the value of age
         */
        public function setAge(int $age): self
        {
                $this->age = $age;

                return $this;
        }

        /**
         * Get the value of sex
         */
        public function getSex(): string
        {
                return $this->sex;
        }

        /**
         * Set the value of sex
         */
        public function setSex(string $sex): self
        {
                $this->sex = $sex;

                return $this;
        }

        /**
         * Get the value of weight
         */
        public function getWeight(): int
        {
                return $this->weight;
        }

        /**
         * Set the value of weight
         */
        public function setWeight(int $weight): self
        {
                $this->weight = intval($weight);

                return $this;
        }

        /**
         * Get the value of height
         */
        public function getHeight(): int
        {
                return $this->height;
        }

        /**
         * Set the value of height
         */
        public function setHeight(int $height): self
        {
                $this->height = $height;

                return $this;
        }

        /**
         * Get the value of health
         */
        public function getHealth(): int
        {
                return $this->health;
        }

        /**
         * Set the value of health
         */
        public function setHealth(int $health): self
        {
                $this->health = $health;

                return $this;
        }

        /**
         * Get the value of hungry
         */
        public function getHungry(): bool
        {
                return $this->hungry;
        }

        /**
         * Set the value of hungry
         */
        public function setHungry(bool $hungry): self
        {
                $this->hungry = $hungry;

                return $this;
        }

        /**
         * Get the value of sleepy
         */
        public function getSleepy(): bool
        {
                return $this->sleepy;
        }

        /**
         * Set the value of sleepy
         */
        public function setSleepy(bool $sleepy): self
        {
                $this->sleepy = $sleepy;

                return $this;
        }

        
        /**
         * Get the value of sleeping
         */ 
        public function getSleeping()
        {
                return $this->sleeping;
        }

        /**
         * Set the value of sleeping
         *
         * @return  self
         */ 
        public function setSleeping($sleeping)
        {
                $this->sleeping = $sleeping;

                return $this;
        }

        /**
         * Get the value of sick
         */
        public function getSick(): bool
        {
                return $this->sick;
        }

        /**
         * Set the value of sick
         */
        public function setSick(bool $sick): self
        {
                $this->sick = $sick;

                return $this;
        }

        public function getFenceId(): int
        {
                return $this->fenceId;
        }

        /**
         * Set the value of fenceId
         */
        public function setFenceId(int $fenceId): self
        {
                $this->fenceId = $fenceId;

                return $this;
        }
        public function hydrate ($data){
                if (isset($data['age'])) {
                $this->setId($data['idPokemon']);
                $this->setAge($data['age']);
                $this->setSex($data['sex']);
                $this->setWeight($data['weight']);
                $this->setHeight($data['height']);
                $this->setHealth($data['health']);
                $this->setHungry($data['hungry']);
                $this->setSleepy($data['sleepy']);
                $this->setSleeping($data['sleeping']);
                $this->setSick($data['sick']);
                $this->setFenceId($data['fence_id']);
                $this->setSpeciesId($data['id']);
                }
        }

        public function checkHealth($reserveId){
                $health = $this->getHealth();
                if($this->getHungry() === true) {
                        $health -= 5;
                }
                if ($this->getSick() === true) {
                        $health -= (rand(10, 15));
                }
                if ($this->getFenceId() == $reserveId){
                        $health -= (rand(10, 20));
                }
                $this->setHealth($health);
                return $this->getHealth();
        }

        public function gainState() {
                if($this->getHungry() === false) {
                        $random = rand(0, 10);
                        if ($random > 5) {
                                $this->setHungry(true);
                        }
                }
                if ($this->getSick() === false) {
                        $random = rand(0, 10);
                        if (($random > 6) && ($this->getHungry() === true)) {
                                $this->setSick(true);
                        }
                        else if (($random > 5) && ($this->getSleepy() === true)) {
                                $this->setSick(true);
                        }
                        else if ($random > 8) {
                                $this->setSick(true);
                        }
                }
                if ($this->getSleepy() === false) {
                        $random = rand(0, 10);
                        if ($random > 7) {
                                $this->setSleepy(true);
                        }
                }
                if ($this->getSleeping() === true) {
                        $this->setSleeping(false);
                }
        }


        /**
         * Get the value of speciesId
         */
        public function getSpeciesId(): int
        {
                return $this->speciesId;
        }

        /**
         * Set the value of speciesId
         */
        public function setSpeciesId(int $speciesId): self
        {
                $this->speciesId = $speciesId;

                return $this;
        }
}
?>