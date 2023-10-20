<?php
    class Ranking {
        private int $id;
        private int $pokedollars;
        private string $nameZoo;
        private $createdAt;

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
         * Get the value of pokedollars
         */
        public function getPokedollars(): int
        {
                return $this->pokedollars;
        }

        /**
         * Set the value of pokedollars
         */
        public function setPokedollars(int $pokedollars): self
        {
                $this->pokedollars = $pokedollars;

                return $this;
        }

        /**
         * Get the value of nameZoo
         */
        public function getNameZoo(): string
        {
                return $this->nameZoo;
        }

        /**
         * Set the value of nameZoo
         */
        public function setNameZoo(string $nameZoo): self
        {
                $this->nameZoo = $nameZoo;

                return $this;
        }

        /**
         * Get the value of createdAt
         */
        public function getCreatedAt()
        {
                return $this->createdAt;
        }

        /**
         * Set the value of createdAt
         */
        public function setCreatedAt($createdAt): self
        {
                $this->createdAt = $createdAt;

                return $this;
        }

        public function __construct($data) {
            $this->hydrate($data);
        }

        public function hydrate($data) {
                $this->setId($data['id']);
            $this->setPokedollars($data ['pokedollars']);
            $this->setNameZoo($data['nameZoo']);
            $this->setCreatedAt($data['createdAt']);
        }
    }

?>