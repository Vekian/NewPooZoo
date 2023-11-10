<?php

class Employee {
    private int $id;
    private string $name;
    private int $age;
    private string $sex;
    private PDO $db;

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
     * Get the value of db
     */
    public function getDb(): PDO
    {
        return $this->db;
    }

    /**
     * Set the value of db
     */
    public function setDb(PDO $db): self
    {
        $this->db = $db;

        return $this;
    }

    public function getPokemon($id) {
        $query = $this->db->query('SELECT * FROM species
                                    JOIN pokemons on species.id = pokemons.species_id WHERE pokemons.idPokemon = "' . $id .'"');
        $pokemonData = $query->fetch(PDO :: FETCH_ASSOC);
        $pokemon = new Species($pokemonData);
        return $pokemon;
    }

    public function getSpecies($id) {
        $query = $this->db->query('SELECT * FROM species WHERE id = "' . $id .'"');
        $pokemonData = $query->fetch(PDO :: FETCH_ASSOC);
        $pokemon = new Species ($pokemonData);
        return $pokemon;
    }

    public function getFence($id) {
        $query = $this->db->query('SELECT * FROM fences WHERE id = "' . $id .'"');
        $fenceData = $query->fetch(PDO :: FETCH_ASSOC);
        $fenceType = $fenceData['type'];
        $fence = new $fenceType($fenceData);
        return $fence;
    }

    public function feedPokemon($pokemon){
        if ($pokemon->getHungry() === true){
            $q = $this->db->prepare('UPDATE pokemons SET hungry = 0 WHERE idPokemon = :id');
            $q->bindValue(':id', $pokemon->getId(), PDO::PARAM_INT);
            $q->execute();
            $pokemon->setHungry(false);
        }
    }
    public function healPokemon($pokemon){
                $health = $pokemon->getHealth();
                if ($health < 100){
                    $health += 5;
                    if ($health > 100) {
                        $health = 100;
                    }
                }
                $q = $this->db->prepare('UPDATE pokemons SET sick = 0, health = :health WHERE idPokemon = :id');
                $q->bindValue(':health', $health, PDO::PARAM_INT);
                $q->bindValue(':id', $pokemon->getId(), PDO::PARAM_INT);
                $q->execute();
                $pokemon->setSick(false);
    }
    public function sleepPokemon($pokemon){
            if ($pokemon->getSleepy() === true){
                $q = $this->db->prepare('UPDATE pokemons SET sleepy = 0, sleeping = 1 WHERE idPokemon = :id');
                $q->bindValue(':id', $pokemon->getId(), PDO::PARAM_INT);
                $q->execute();
                $pokemon->setSleepy(false);
            }
    }

    public function cleanFence($fence){
        if(($fence->getCleanliness() === "Sale") || ($fence->getCleanliness() === "Correct")){
            $q = $this->db->prepare('UPDATE fences SET cleanliness = "Propre" WHERE id = :id');
            $q->bindValue(':id', $fence->getId(), PDO::PARAM_INT);
            $q->execute();
            $fence->setCleanliness("Propre");
        }
    }

    public function examinePokemons($idFence){
        $query = $this->db->query('SELECT * FROM species
                                    JOIN pokemons on species.id = pokemons.species_id
                                    WHERE health > 0 AND fence_id ="'. $idFence .'"
                                    ORDER BY pokemons.idPokemon ASC');
        $pokemonsAliveData = $query->fetchAll(PDO::FETCH_ASSOC);
        $pokemonsAlive = [];
        foreach($pokemonsAliveData as $pokemonAlive){
            $pokemon = new Species($pokemonAlive);
            array_push($pokemonsAlive, $pokemon);
        }
        return $pokemonsAlive;
    }

    public function displayFence($idFence, $pokemons){
        $query = $this->db->query('SELECT * FROM fences WHERE id = "' . $idFence .'"');
        $fenceData = $query->fetch(PDO :: FETCH_ASSOC);
        $fence = new Fence($fenceData);
        echo('<div  class="col-lg-6 col-12 d-flex align-items-end justify-content-around overflow-auto " id="imgFence" style="background-image: url(\'' . $fence->getBackground() . '\'); height: 400px; background-size: cover; background-position: bottom">');
        $fence->showRandomPokemons($pokemons);
        echo('</div>
            <div class=" col-lg-6 col-12 text-center d-flex flex-column justify-content-center h3" >
                <div class="infosZoo col-sm-8 col-12 mt-4 mt-lg-1 pt-3 mb-3 offset-sm-2 ">
                    <h2><b>'. htmlspecialchars($fence->getName()) .' </b></h2>
                    <p> Etat de l\'enclos: ' . $fence->getCleanliness() . '</p>
                    <p> Type d\'enclos: <span  id="namePopulation">' . $fence->getType() . '</span></p>
                    <p id="population"> Population : '. $fence->getPopulation() .'</p>
                </div>
                <div class="d-flex flex-wrap justify-content-center">');
        if ($fence->getCleanliness() === "Correct"){
            $priceCleanFence = $fence->getPopulation() * 3;
            echo('<form action="process/processCleanFence.php" method="GET">
            <input type="hidden" name="fenceId" value="'. $idFence .'" />
            <input type="hidden" name="price" value="'. $priceCleanFence .'" />
            <button type="submit" class="button col-12 mt-3"><span>Nettoyer l\'enclos : '. ($priceCleanFence) . ' <img src="images/pokedollar.png" height="20px" /></span></button>
            </form>');
        }
        else if ($fence->getCleanliness() === "Sale"){
            $priceCleanFence = $fence->getPopulation() * 5;
        echo('<form action="process/processCleanFence.php" method="GET">
        <input type="hidden" name="fenceId" value="'. $idFence .'" />
        <input type="hidden" name="price" value="'. $priceCleanFence .'" />
        <button type="submit" class="button col-12 mt-3"><span>Nettoyer l\'enclos : '. ($priceCleanFence) . ' <img src="images/pokedollar.png" height="20px" /></span></button>
        </form>');
        }
        echo('<button type="button" id="addPokemon" class="button col-xl-3 col-lg-5  col-sm-4 col-6 mt-3 ms-3');
        if ($idFence == 1) {
            echo(' d-none');
        }
        echo('" data-bs-toggle="modal" data-bs-target="#addModal"><span>
                        Ajouter un Pokemon</span>
                    </button>
                    <button type="button" id="removePokemon" class="button col-xl-3 col-lg-5  col-sm-4 col-6 ms-3 mt-3" data-bs-toggle="modal" data-bs-target="#removeModal">
                        <span>Libérer un pokemon</span>
                    </button>
                </div>
            </div>');
    }
    public function hydrate($data) {
        if (isset($data['id'])) {
        $this->setId($data['id']);
        }
        if (isset($data['nameEmployee'])) {
        $this->setName($data['nameEmployee']);
        }
        if (isset($data['age'])) {
        $this->setAge($data['age']);
        }
        if (isset($data['sex'])) {
        $this->setSex($data['sex']);
        }
    }

    public function __construct($db, $data) {
        $this->setDb($db);
        $this->hydrate($data);
    }

    public function addPokemon($speciesId, $fenceId) {
        $specie = $this->getSpecies($speciesId);
        $sex="";
        if ($specie->getSexData() === 'Random'){
            $random = rand(0, 1);
            if ($random === 0) {
                $sex = "female";
            }
            else {
                $sex = "male";
            }
        }
        else {
            $sex = strtolower($specie->getSexData());
        }

        $q = $this->db->prepare('INSERT INTO pokemons(age, sex, weight, height, health, hungry, sleepy, sleeping, sick, species_id, fence_id) VALUES (:age, :sex, :weight, :height, :health, :hungry, :sleepy, :sleeping, :sick, :species_id, :fence_id)');
        $q->bindValue(':age', 0);
        $q->bindValue(':sex', $sex);
        $q->bindValue(':weight', $specie->getMinWeight());
        $q->bindValue(':height', $specie->getMinHeight());
        $q->bindValue(':health', 100);
        $q->bindValue(':hungry', 1);
        $q->bindValue(':sleepy', 1);
        $q->bindValue(':sleeping', 0);
        $q->bindValue(':sick', 0);
        $q->bindValue(':species_id', $specie->getIdSpecies());
        $q->bindValue(':fence_id', $fenceId);
        $q->execute();

        $q = $this->db->prepare('UPDATE fences SET population = population + 1 WHERE id = ' . $fenceId);
        $q->execute();
    }

    public function removePokemonFromFence($pokemonId, $fenceId){
        $this->db->exec('DELETE FROM pokemons WHERE idPokemon = '.$pokemonId);

        $q = $this->db->prepare('UPDATE fences SET population = population - 1 WHERE id = ' . $fenceId);
        $q->execute();
    }

    public function updatePokemon($id, $age, $weight, $height, $health, $hungry, $sleepy, $sleeping, $sick, $species_id){
        $q = $this->db->prepare('UPDATE pokemons SET age = :age, weight = :weight, height = :height, health = :health, hungry = :hungry, sleepy = :sleepy, sleeping = :sleeping, sick = :sick, species_id = :species_id WHERE idPokemon = :id');
        $q->bindValue(':id', $id);
        $q->bindValue(':age', $age);
        $q->bindValue(':weight', $weight);
        $q->bindValue(':height', $height);
        $q->bindValue(':health', $health);
        $q->bindValue(':hungry', $hungry);
        $q->bindValue(':sleepy', $sleepy);
        $q->bindValue(':sleeping', $sleeping);
        $q->bindValue(':sick', $sick);
        $q->bindValue(':species_id', $species_id);
        $q->execute();
    }

    public function movePokemonFromFence($pokemonId, $newFenceId, $oldFenceId){
        $q = $this->db->prepare('UPDATE pokemons SET fence_id = :fence_id WHERE idPokemon = :id');
        $q->bindValue(':id', $pokemonId, PDO::PARAM_INT);
        $q->bindValue(':fence_id', $newFenceId , PDO::PARAM_INT);
        $q->execute();

        if ($newFenceId != $oldFenceId){
            $q = $this->db->prepare('UPDATE fences SET population = population - 1 WHERE id = ' . $oldFenceId);
            $q->execute();
            $q = $this->db->prepare('UPDATE fences SET population = population + 1 WHERE id = ' . $newFenceId);
            $q->execute();
        }
    }

    public function findCompatiblePokemons($fenceId){
        $fence= $this->getFence($fenceId);
        $fenceType = $fence->getType();
        $parameters= "";
        if ($fenceType != "Legendaire"){
        $fenceTypes = $fenceType::$types;
        $index= 0;
        $parameters .= " Legendary = 0 AND (";
        foreach($fenceTypes as $type){
            $parameters .= 'type1 = "'. $type .'" OR type2 = "'. $type .'"';
            if($index < count($fenceTypes) - 1){
                $parameters .= ' OR ';
                $index++;
            }
        }
        if (!(in_array("Normal", $fenceTypes))){
            $parameters .= ' OR name = "Metamorph"';
        }
        $parameters .= ")";}
        else {
            $parameters .= ' Legendary = 1';
        }

        $answer = 'SELECT * FROM species WHERE ' . $parameters;
        $query = $this->db->query($answer);
        $species = $query->fetchAll(PDO::FETCH_ASSOC);
        $answer = [];
        foreach ($species as $specie) {
            if ($specie['babyId'] == $specie['id']) {
                array_push($answer, $specie);
            }
        }

        return $answer;

    }
    public function findCompatibleFences($pokemon){
        $typeSpecie = $pokemon->getName();
        $parameters = "";
        $fenceId = $pokemon->getFenceId();
        if ($pokemon->isLegendary() === 1) {
            $parameters .= ' type = "Legendaire" AND zoo_id = '. $_SESSION['LOGGED_USER'] .' OR type = "Reserve" AND zoo_id = '. $_SESSION['LOGGED_USER'];
            
        }
        else {
        $type1 = $pokemon->getFirstType();
        $type2 = $pokemon->getSecondtype();
        $fenceTypes = Fence::$fenceTypes;
        $index= 0;
        foreach($fenceTypes as $fenceType) {
            $typesCompatibles = $fenceType::$types;
            foreach($typesCompatibles as $type) {
                if (($type1 == $type) || ($type2 == $type)) {
                    if(strlen($parameters) > 0){
                        $parameters .= ' OR ';
                        $index++;
                    }
                    $parameters .= 'type = "' . $fenceType . '"' . ' AND zoo_id = ' . $_SESSION['LOGGED_USER'];
                }
            }
        }}
        $answer = 'SELECT * FROM fences WHERE ' . $parameters;
        $query = $this->db->query($answer);
        $fencesData = $query->fetchAll(PDO::FETCH_ASSOC);
        $fencesArray = [];
            foreach($fencesData as $fenceData) {
                if (($fenceData['id'] != $fenceId) && (($fenceData['population'] < 6) || ($fenceData['nameFence'] === "Reserve"))){
                    array_push($fencesArray, new Fence($fenceData));
                }
            }
            return $fencesArray;
    }
    public function convertBool($bool) {
        if ($bool === true) {
                return 1;
        }
        else {
                return 0;
        }
    }
    public function evolution($pokemon, $pokemonZoo){
        if ($pokemon->getAgeEvolution() !== 0){
           if (($pokemon->getAge() >= $pokemon->getAgeEvolution()) && ($pokemon->getHealth() >= 50) && ($pokemon->getWeight() >= $pokemon->getMaxWeight()) && ($pokemon->getHeight() >= $pokemon->getMaxHeight())){
            $newSpecie = $this->getSpecies($pokemon->getIdEvolution());
            $pokemon->setweight($newSpecie->getMinWeight());
            $pokemon->setHeight($newSpecie->getMinHeight());
            $pokemon->setHealth(100);
            $pokemon->setSpeciesId($newSpecie->getIdSpecies());
            $this->updatePokemon($pokemon->getId(), $pokemon->getAge(), $pokemon->getWeight(), $pokemon->getHeight(), $pokemon->getHealth(), $this->convertBool($pokemon->getHungry()), $this->convertBool($pokemon->getSleepy()), 0, $this->convertBool($pokemon->getSick()), $pokemon->getSpeciesId());
            $pokemonZoo->gainPopularity(30);
            return $pokemon;
        }
        }
        return $pokemon;
    }

    public function reproduce($pokemons, $reserve) {
        $summary =[];
        for($i = 0; $i < count($pokemons) - 1; $i++){
            $sex = $pokemons[$i]->getSex();
            $fence = $this->getFence($pokemons[$i]->getFenceId());
            $random = rand(1, 7);
            $type= $pokemons[$i]->getName();
            for($j = ($i+1); $j < count($pokemons) - 1; $j++){
                $sex2 = $pokemons[$j]->getSex();
                $type2= $pokemons[$j]->getName();
                if (($pokemons[$i]->getName() == "NidoranF" && $pokemons[$j]->getName() == "NidoranM") || ($pokemons[$i]->getName() == "NidoranM" && $pokemons[$j]->getName() == "NidoranF")) {
                    $type = "Nidoran";
                    $type2 = "Nidoran";
                }
                
                    
                if(($type === $type2 || $type2 === "Metamorph") && ($sex != $sex2) && ($pokemons[$i]->getFenceId() === $pokemons[$j]->getFenceId()) && ($random <= 2) && ($pokemons[$i]->getFenceId() != $reserve->getId())){

                    if ($type === "Nidoran") {
                        $randomNidoran = rand(0,1);
                        if ($randomNidoran === 0) {
                            $type = "NidoranF";
                        }
                        else {
                            $type = "NidoranM";
                        }
                    }
                    
                    if ($fence->getPopulation() < 6) {
                        $this->addPokemon($pokemons[$i]->getBabyId(), $pokemons[$i]->getFenceId());
                        $babyName = $this->getSpecies($pokemons[$i]->getBabyId())->getName();
                        array_push($summary, $pokemons[$i]->getName() . " et " . $pokemons[$j]->getName() . " ont donné naissance à " . $babyName );
                    }
                    else {
                        $this->addPokemon($pokemons[$i]->getBabyId(), $reserve->getId());
                        $babyName = $this->getSpecies($pokemons[$i]->getBabyId())->getName();
                        array_push($summary, $pokemons[$i]->getName() . " et " . $pokemons[$j]->getName() . " ont donné naissance à " . $babyName . ", il a été emmené à la réserve");
                    }
                    $i++;
                    $j++;
                }
                
            }
        }
        return $summary;
    }

}

?>