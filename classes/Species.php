<?php

class Species extends Pokemon
{
    protected int $idSpecies;
    protected string $name;
    protected string $sexData;
    protected string $diet;
    protected string $type1;
    protected string $type2;
    protected string $avatar;
    protected int $minWeight;
    protected int $minHeight;
    protected int $maxWeight;
    protected int $maxHeight;
    protected int $lifeExpectancy;
    protected int $ageEvolution;
    protected int $idEvolution;
    protected string $nameEvolution;
    protected int $popularity;
    protected int $babyId;
    protected bool $legendary;


    /**
     * Get the value of id
     */
    public function getIdSpecies(): int
    {
        return $this->idSpecies;
    }

    /**
     * Set the value of id
     */
    public function setIdSpecies(int $idSpecies): self
    {
        $this->idSpecies = $idSpecies;

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
     * Get the value of sex
     */
    public function getSexData(): string
    {
        return $this->sexData;
    }

    /**
     * Set the value of sex
     */
    public function setSexData(string $sexData): self
    {
        $this->sexData = $sexData;

        return $this;
    }

    /**
     * Get the value of diet
     */
    public function getDiet(): string
    {
        return $this->diet;
    }

    /**
     * Set the value of diet
     */
    public function setDiet(string $diet): self
    {
        $this->diet = $diet;

        return $this;
    }

    /**
     * Get the value of type1
     */
    public function getFirstType(): string
    {
        return $this->type1;
    }

    /**
     * Set the value of type1
     */
    public function setFirstType(string $type1): self
    {
        $this->type1 = $type1;

        return $this;
    }

    /**
     * Get the value of type2
     */
    public function getSecondType(): string
    {
        return $this->type2;
    }

    /**
     * Set the value of type2
     */
    public function setSecondType(string $type2): self
    {
        $this->type2 = $type2;

        return $this;
    }

    /**
     * Get the value of avatar
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     */
    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get the value of minWeight
     */
    public function getMinWeight(): int
    {
        return $this->minWeight;
    }

    /**
     * Set the value of minWeight
     */
    public function setMinWeight(int $minWeight): self
    {
        $this->minWeight = $minWeight;

        return $this;
    }

    /**
     * Get the value of minHeight
     */
    public function getMinHeight(): int
    {
        return $this->minHeight;
    }

    /**
     * Set the value of minHeight
     */
    public function setMinHeight(int $minHeight): self
    {
        $this->minHeight = $minHeight;

        return $this;
    }

    /**
     * Get the value of maxWeight
     */
    public function getMaxWeight(): int
    {
        return $this->maxWeight;
    }

    /**
     * Set the value of maxWeight
     */
    public function setMaxWeight(int $maxWeight): self
    {
        $this->maxWeight = $maxWeight;

        return $this;
    }

    /**
     * Get the value of maxHeight
     */
    public function getMaxHeight(): int
    {
        return $this->maxHeight;
    }

    /**
     * Set the value of maxHeight
     */
    public function setMaxHeight(int $maxHeight): self
    {
        $this->maxHeight = $maxHeight;

        return $this;
    }

    /**
     * Get the value of lifeExpectancy
     */
    public function getLifeExpectancy(): int
    {
        return $this->lifeExpectancy;
    }

    /**
     * Set the value of lifeExpectancy
     */
    public function setLifeExpectancy(int $lifeExpectancy): self
    {
        $this->lifeExpectancy = $lifeExpectancy;

        return $this;
    }

    /**
     * Get the value of ageEvolution
     */
    public function getAgeEvolution(): int
    {
        return $this->ageEvolution;
    }

    /**
     * Set the value of ageEvolution
     */
    public function setAgeEvolution(int $ageEvolution): self
    {
        $this->ageEvolution = $ageEvolution;

        return $this;
    }

    /**
     * Get the value of idEvolution
     */
    public function getIdEvolution(): int
    {
        return $this->idEvolution;
    }

    /**
     * Set the value of idEvolution
     */
    public function setIdEvolution(int $idEvolution): self
    {
        $this->idEvolution = $idEvolution;

        return $this;
    }

    /**
     * Get the value of nameEvolution
     */
    public function getNameEvolution(): string
    {
        return $this->nameEvolution;
    }

    /**
     * Set the value of nameEvolution
     */
    public function setNameEvolution(string $nameEvolution): self
    {
        $this->nameEvolution = $nameEvolution;

        return $this;
    }

    /**
     * Get the value of popularity
     */
    public function getPopularity(): int
    {
        return $this->popularity;
    }

    /**
     * Set the value of popularity
     */
    public function setPopularity(int $popularity): self
    {
        $this->popularity = $popularity;

        return $this;
    }

    /**
     * Get the value of babyId
     */
    public function getBabyId(): int
    {
        return $this->babyId;
    }

    /**
     * Set the value of babyId
     */
    public function setBabyId(int $babyId): self
    {
        $this->babyId = $babyId;

        return $this;
    }

    /**
     * Get the value of legendary
     */
    public function isLegendary(): bool
    {
        return $this->legendary;
    }

    /**
     * Set the value of legendary
     */
    public function setLegendary(bool $legendary): self
    {
        $this->legendary = $legendary;

        return $this;
    }

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate($data)
    {
        parent::hydrate($data);
        if (isset($data['species_id'])) {
            $this->setIdSpecies($data['species_id']);
        } else {
            $this->setIdSpecies($data['id']);
        }
        $this->setName($data['name']);
        $this->setSexData($data['sex']);
        $this->setDiet($data['diet']);
        $this->setFirstType($data['Type1']);
        if ($data['Type2'] !== null) {
            $this->setSecondType($data['Type2']);
        } else {
            $this->setSecondType("none");
        }
        $this->setAvatar($data['avatar']);
        $this->setMinWeight($data['minWeight']);
        $this->setMinHeight($data['minHeight']);
        $this->setMaxWeight($data['maxWeight']);
        $this->setMaxHeight($data['maxHeight']);
        $this->setLifeExpectancy($data['lifeExpectancy']);
        if (isset($data['ageEvolution'])) {
            $this->setAgeEvolution($data['ageEvolution']);
        } else {
            $this->setAgeEvolution(0);
        }
        if (isset($data['idEvolution'])) {
            $this->setIdEvolution($data['idEvolution']);
        }
        if (isset($data['nameEvolution'])) {
            $this->setNameEvolution($data['nameEvolution']);
        }
        $this->setPopularity($data['popularity']);
        $this->setBabyId($data['babyId']);
        $this->setLegendary($data['Legendary']);
    }

    public function move($fenceId)
    {
        if ($fenceId == 1) {
            $state = $this->getName(). " s'ennuie dans la réserve.";
        } else {
            $state = $this->getName(). " siffle sournoisement";
        }
        return $state;
    }

    public function showPokemon($fenceId, $employee)
    {
        $sex = "";
        $priceFeed = round(2 + ($this->getWeight() / 10));
        $fences = $employee->findCompatibleFences($this);
        $type = $this->getName();
        $imgMoney = "<img src='images/pokedollar.png' height='20px' />";
        if ($this->getSex() == "female") {
            $sex = '<i class="fa-solid fa-venus" style="color: #dc8add;"></i>';
        } else {
            $sex = '<i class="fa-solid fa-mars" style="color: #1c71d8;"></i>';
        }
        if (($this->getName() === "NidoranF") || ($this->getName() === "NidoranM")) {
            $name = 'Nidoran';
        } else {
            $name = $this->getName();
        }

        echo('<div class="card text-center '. strtolower($this->getFirstType()) .'" style="width: 14rem;">
        <img src="' . $this->getAvatar() . '" class="col-4 offset-4 imgPokemon" alt="' . $this->getName() . '" height="80px">
        <div class="card-body">
        <h5 class="card-title">' . $name . ' ' . $sex . '</h5>

        <nav class="my-3">
                <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active p-1 " id="nav-about-tab'. $this->getId() .'" data-bs-toggle="tab" data-bs-target="#nav-about'. $this->getId() .'" type="button" role="tab" aria-controls="nav-about'. $this->getId() .'" aria-selected="true"> Infos </button>
                        <button class="nav-link p-1 ms-2 me-1" id="nav-stats-tab'. $this->getId() .'" data-bs-toggle="tab" data-bs-target="#nav-stats'. $this->getId() .'" type="button" role="tab" aria-controls="nav-stats'. $this->getId() .'" aria-selected="true"> Stats </button>
                        <button class="nav-link p-1" id="nav-moves-tab'. $this->getId() .'" data-bs-toggle="tab" data-bs-target="#nav-moves'. $this->getId() .'" type="button" role="tab" aria-controls="nav-moves'. $this->getId() .'" aria-selected="true"> Actions </button>
                </div>
        </nav>
        <div class="tab-content" id="nav-tabContent'. $this->getId() .'">
                <div class="tab-pane fade show active" id="nav-about'. $this->getId() .'" role="tabpanel" aria-labelledby="nav-home-tab">'
                        . $this->getHealth() . ' <i class="fa-solid fa-heart me-2" style="color: #e01b24;"></i>'. $this->getPopularity() .'<i class="fa-solid fa-star ms-1" style="color: #ffff00;"></i>
                        <br /><b><i>'. $this->showStateOfPokemon($fenceId) .'</i></b><br />');
        if ($this->getHungry() === true) {
            echo('<a href="process/processFeedPokemon.php?id='. $this->getId() .'&fenceId=' . $this->getFenceId() . '&price=' . $priceFeed . '" class="comic-button">Nourrir : '. $priceFeed . ' ' . $imgMoney .'</a>');
        }
        if ($this->getSleepy() === true) {
            echo('<a href="process/processSleepPokemon.php?id='. $this->getId() .'&fenceId=' . $this->getFenceId() . '" class="comic-button">Reposer</a>');
        }
        if (($this->getSick() === true) || ($this->getHealth() < 100)) {
            echo('<a href="process/processHealPokemon.php?id='. $this->getId() .'&fenceId=' . $this->getFenceId() . '&price=10" class="comic-button">Soigner : 10 '. $imgMoney .'</a>');
        }
        echo('<br />Type(s) : <img src="images/' . strtolower($this->getFirstType()) . '.png" height="20px" alt="'. $this->getFirstType() .'" />');
        if ($this->getSecondType() !== "none") {
            echo('<img src="images/' . strtolower($this->getSecondType()) . '.png" height="20px" class="m" alt="'. $this->getSecondType() .'" />');
        }
        echo('  </div>
                <div class="tab-pane fade" id="nav-stats'. $this->getId() .'" role="tabpanel" aria-labelledby="nav-stats-tab">
                        <table class="table table-borderless m-1">
                                <tr>
                                <th class="text-muted" style="width: 10px;">HP</th>
                                <td style="width: 10px; text-align: right;">' . $this->getHealth() . '</td>
                                <td>
                                        <div class="progress my-2" style="height: 8px;">
                                                <div class="progress-bar" role="progressbar" style="width: ' . $this->getHealth() . '%;" aria-valuenow="' . $this->getHealth() . '" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                </td>
                                </tr>
        
                                <tr>
                                <th class="text-muted" style="width: 10px;">Âge</th>
                                <td style="width: 10px; text-align: right;">' . $this->getAge() . '</td>
                                <td>
                                        <div class="progress my-2" style="height: 8px;">
                                                <div class="progress-bar" role="progressbar" style="width: '. (($this->getAge() / $this->getLifeExpectancy()) * 100) .'%;" aria-valuenow="' . $this->getAge() . '" aria-valuemin="0" aria-valuemax="'. $this->getLifeExpectancy() .'"></div>
                                        </div>
                                </td>
                                </tr>
                                <tr>
                                <th class="text-muted" style="width: 10px;">Taille</th>
                                <td style="width: 10px; text-align: right;">' . $this->getHeight() . '</td>
                                <td>
                                <div class="progress my-2" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" style="width: ' . (($this->getHeight() / $this->getMaxHeight()) * 100) . '%;" aria-valuenow="' . $this->getHeight() . '" aria-valuemin="0" aria-valuemax="'. $this->getMaxHeight() .'"></div>
                                </div>
                                </td>
                                </tr>
                                <tr>
                                <th class="text-muted" style="width: 10px;">Poids</th>
                                <td style="width: 10px; text-align: right;">' . $this->getWeight() . '</td>
                                <td>
                                        <div class="progress my-2" style="height: 8px;">
                                                <div class="progress-bar" role="progressbar" style="width: ' . (($this->getWeight() / $this->getMaxWeight()) * 100) . '%;" aria-valuenow="' . $this->getWeight() . '" aria-valuemin="0" aria-valuemax="'. $this->getMaxWeight() .'"></div>
                                        </div>
                                </td>
                                </tr>
                        </table>
                </div>
                <div class="tab-pane fade" id="nav-moves'. $this->getId() .'" role="tabpanel" aria-labelledby="nav-moves-tab">
                        <button id="myBtn' . $this->getId() .'" class="comic-button  mt-2">
                                Déplacer le pokemon : -5 <img src="images/pokedollar.png" height="20px" />
                        </button>
                </div>
        </div>
        </div>');
        echo('</div>');

        echo('<div id="myModal'. $this->getid() .'" class="modalPerso">
        <div class="modal-contentPerso ">
                <div class="modal-headerPerso">
                        <span class="closePerso">&times;</span>
                        <h2>Déplacer un pokemon</h2>
                </div>
                <form action="process/movePokemonFromFence.php" method="POST" class="text-center m-4">
                        <input type="hidden" value="' . $fenceId . '" name="fenceId">
                        <input type="hidden" value="'. $this->getId() .'" name="pokemonId">
                        <label for="newFence" class="mt-1">Choisissez un enclos </label>
                        <select name="newFenceId" id="newFence" required>');
        echo('<option value="" selected disabled hidden>Choisir</option>');
        foreach ($fences as $fence) {
            echo('<option value="'. $fence->getId() . '">' . $fence->getName() . '</option>');
        };
        echo('          </select>
                        <input type="submit" value="Déplacer vers l\'enclos" class="comic-button">
                </form>
        </div>
</div>');
    }

    public function showStateOfPokemon($fenceId)
    {
        $state = "";
        if ($this->getSleepy() === true) {
            $state .= $this->getName() . " a sommeil";
            if ($this->getHungry() === true) {
                $state .= ", a faim";
                if ($this->getSick() === true) {
                    $state .= ", est malade";
                }
            } elseif ($this->getSick() === true) {
                $state .= ", est malade";
            }
        } elseif ($this->getHungry() === true) {
            $state = $this->getName() . " a faim";
            if ($this->getSick() === true) {
                $state .= ", est malade ";
            } elseif ($this->getSleeping() === true) {
                $state .= ", dort";
            }
        } elseif ($this->getSick() === true) {
            $state = $this->getName() . " est malade";
            if ($this->getSleeping() === true) {
                $state .= ", dort";
            }
        } elseif ($this->getSleeping() === true) {
            $state .= $this->getName() . " dort";
        } else {
            $state = $this->move($fenceId);
        }
        return $state;
    }

    public function gainWeight()
    {
        $maxWeight = $this->getMaxWeight();

        if ($this->getWeight() < $maxWeight) {
            $gainWeight = $maxWeight * 0.3;
            if ($gainWeight < 1) {
                $gainWeight = 1;
            }
            if ($this->getHungry() === true) {
                $this->setWeight(($this->getWeight()) + intval($gainWeight * 0.3));
            } else {
                $this->setWeight(($this->getWeight()) + intval($gainWeight));
            }
        }
        return $this->getWeight();
    }

    public function gainHeight()
    {
        $maxHeight = $this->getMaxHeight();

        if ($this->getHeight() < $maxHeight) {
            $gainHeight = $maxHeight * 0.3;
            if ($this->getSick() === true) {
                $this->setHeight(($this->getHeight()) + intval($gainHeight * 0.5));
            } else {
                $this->setHeight(($this->getHeight()) + intval($gainHeight));
            }
        }
        return $this->getHeight();
    }

}
