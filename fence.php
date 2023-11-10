<?php
    include_once('header.php');
    if (isset($_GET['fenceId'])){
        $fenceId = $_GET['fenceId'];
    }
    $employee = $pokemonZoo->getEmployee();
    $pokemons = $employee->examinePokemons($fenceId);
    $pokemonsId = [];
    foreach($pokemons as $pokemon){
        array_push($pokemonsId, $pokemon->getId());
    }
    $jsonPokemonsId = json_encode($pokemonsId);
    $species = $employee->findCompatiblePokemons($fenceId);
    $priceSpecies = [];
    $priceFree= [];
    $jsonSpecies = json_encode($species);
    $fence = $pokemonZoo->getFence($fenceId);
    ?>
<section id="displayTotalFence">
    
    <div class="d-flex flex-wrap" id="infosFence">
        <?php
            $employee->displayFence($fenceId, $pokemons);
        ?>
    </div>

    <div id="pokemons" class="d-flex justify-content-center flex-wrap mt-1">
        <div id="indicatorBefore" class="invisible">
        </div>
        <?php
            foreach($pokemons as $pokemon){
                $popularityFree = $pokemon->getPopularity() / 5;
                $priceFree[$pokemon->getName()] = $popularityFree;
                $pokemon->showPokemon($fenceId, $employee);
            }
            $jsonPriceFree = json_encode($priceFree);
        ?>
        <div id="indicatorNext"> 
        </div>
    </div>
</section>
<script>
    let cards = document.getElementsByClassName('card');
    let index = 0;
    let changed = false;
    window.onresize = detectWidth(cards);

    let fenceHeight = document.getElementById('infosFence').offsetHeight;
    let totalHeight = fenceHeight + 180;
    document.getElementById('displayTotalFence').style.height = totalHeight + "px";

    function detectWidth(cards) {
        if ((window.innerWidth < 900) && (cards.length != 1)){
            let buttonBefore = document.createElement('button');
            buttonBefore.setAttribute('id', 'before');
            buttonBefore.classList.add('btn', 'mt-5');
            buttonBefore.innerHTML = "<img src='images/gauche.png' height='50px' width='10px' />";
            let parentBefore = document.getElementById('indicatorBefore');
            parentBefore.appendChild(buttonBefore);

            let buttonNext = document.createElement('button');
            buttonNext.setAttribute('id', 'next');
            buttonNext.classList.add('btn', 'ms-3', 'mt-5');
            buttonNext.innerHTML = "<img src='images/droite.png' height='50px' width='10px' />";
            let parentNext = document.getElementById('indicatorNext');
            parentNext.appendChild(buttonNext);

            cards[index].classList.remove('d-none');
            for (let i = 0; i < cards.length; i++){
                if (i != index){
                    cards[i].classList.add('d-none');
                }
                cards[i].style.width = "12rem";
            }
        nextCard(cards, 3);
        beforeCard(cards, 3);
        }

        else if ((window.innerWidth < 1404) && (cards.length > 3)) {
            let buttonBefore = document.createElement('button');
            buttonBefore.setAttribute('id', 'before');
            buttonBefore.classList.add('btn', 'mt-5');
            buttonBefore.innerHTML = "<img src='images/gauche.png' height='50px' />";
            let parentBefore = document.getElementById('indicatorBefore');
            parentBefore.appendChild(buttonBefore);

            let buttonNext = document.createElement('button');
            buttonNext.setAttribute('id', 'next');
            buttonNext.classList.add('btn', 'ms-3', 'mt-5');
            buttonNext.innerHTML = "<img src='images/droite.png' height='50px' />";
            let parentNext = document.getElementById('indicatorNext');
            parentNext.appendChild(buttonNext);
            
            for (let i=0; i < cards.length; i++) {
            if (i >= 3) {
                cards[i].classList.add('d-none');
            }
            }  
        nextCard(cards, 3);
        beforeCard(cards, 3);
        }

        else if ((window.innerWidth >= 1404) && (cards.length > 6)){
            let buttonBefore = document.createElement('button');
            buttonBefore.setAttribute('id', 'before');
            buttonBefore.classList.add('btn', 'mt-5');
            buttonBefore.innerHTML = "<img src='images/gauche.png' height='50px' />";
            let parentBefore = document.getElementById('indicatorBefore');
            parentBefore.appendChild(buttonBefore);

            let buttonNext = document.createElement('button');
            buttonNext.setAttribute('id', 'next');
            buttonNext.classList.add('btn', 'ms-3', 'mt-5');
            buttonNext.innerHTML = "<img src='images/droite.png' height='50px' />";
            let parentNext = document.getElementById('indicatorNext');
            parentNext.appendChild(buttonNext);
            
            for (let i=0; i < cards.length; i++) {
            if (i >= 6) {
                cards[i].classList.add('d-none');
            }
            }  
        nextCard(cards, 6);
        beforeCard(cards, 6);
    }
    }
    function nextCard(cards, display) {
    document.getElementById('next').addEventListener('click', function(e){
        if ((window.innerWidth < 900) && (index < (cards.length - 1))) {
            if (index == 0){
                document.getElementById('indicatorBefore').classList.remove('invisible');
            }
            index++;
            if(index == (cards.length - 1)) {
                document.getElementById('indicatorNext').classList.add('invisible');
            }
            cards[index].classList.remove('d-none');
        }
        else {
            document.getElementById('indicatorNext').classList.add('invisible');
            document.getElementById('indicatorBefore').classList.remove('invisible');
        }
        for (let i=0; i < cards.length; i++) {
            if (window.innerWidth < 900){
                if (i != index){
                    cards[i].classList.add('d-none');
                }
            }
            else {
                if (i < display) {
                    cards[i].classList.add('d-none');
                }
                else {
                    cards[i].classList.remove('d-none')
                }
            }
        }
    });};

    function beforeCard(cards, display){
    document.getElementById('before').addEventListener('click', function(e){

        if ((window.innerWidth < 900) && (index > 0)) {
            if(index == (cards.length - 1)) {
                document.getElementById('indicatorNext').classList.remove('invisible');
            }
            index--;
            cards[index].classList.remove('d-none');
            if(index === 0) {
                document.getElementById('indicatorBefore').classList.add('invisible');
            }
        }
        else {
            document.getElementById('indicatorNext').classList.remove('invisible');
            document.getElementById('indicatorBefore').classList.add('invisible');
        }
        for (let i=0; i < cards.length; i++) {
            if ((window.innerWidth < 900)  && (index >= 0)){
                if (i != index){
                    cards[i].classList.add('d-none');
                }
            }
            else {
                if (i >= display) {
                    cards[i].classList.add('d-none');
                }
                else {
                    cards[i].classList.remove('d-none')
                }
            }
        }
    }
    );};


</script>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModalLabel">Ajouter un pokemon dans l'enclos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="process/addPokemon.php" method="POST" class="text-center m-4">
                            <input type="hidden" value="<?php echo($fenceId); ?>" name="fenceId">
                            <label for="idSpecies" class="mt-1">Choisissez votre pokemon : </label>
                            <select name="idSpecies" id="idSpecies" class="m-2" required >
                            <?php
                                echo('<option value="" selected disabled hidden>Choisir</option>');
                                foreach($species as $specie) {
                                    array_push($priceSpecies, $specie['popularity']);
                                    echo('<option value="'. $specie['id'] . '">' . $specie['name'] . '</option>');
                                }
                                $jsonPriceSpecies = json_encode($priceSpecies);
                                
                            ?>
                            </select class="btn btn-primary">
                            <div>
                                Prix du pokemon : <span id="priceSpecies"></span>
                            </div>
                            <input type="hidden" id="price" name="price" value="">
                            <img id="img" src="" width="100px"/> 
                            <input type="submit" value="Ajouter à l'enclos" class="comic-button">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="removeModalLabel">Libérer un pokemon de l'enclos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="text-danger">ATTENTION ! Cette action enlèvera définitivement le pokémon.</p>
                        <p id='priceFree'></p>
                        <form action="process/removePokemonFromFence.php" method="POST" class="text-center m-4">
                            <input type="hidden" value="<?php echo($fenceId); ?>" name="fenceId">
                            <input type="hidden" value="" name="price" id="price2">
                            <label for="idSpecies2" class="mt-1">Choisissez un pokemon </label>
                            <select name="idPokemon" id="idSpecies2" class="m-2" required >
                            <?php
                                echo('<option value="" selected disabled hidden>Choisir</option>');
                                foreach($pokemons as $pokemon) {
                                    echo('<option value="'. $pokemon->getId() . '">' . $pokemon->getName() . '</option>');
                                }
                            ?>
                            </select class="btn btn-primary">
                            <input type="submit" value="Enlever de l'enclos" class="comic-button">
                        </form>
                    </div>
                </div>
            </div>
        </div>


        



<script>
let pokemonsId = <?= $jsonPokemonsId ?>;
    // Get the modal
    for(let i = 0; i < pokemonsId.length; i++){
        let span = document.getElementsByClassName("closePerso")[i];

        document.getElementById("myBtn" + pokemonsId[i]).onclick = function() {
        document.getElementById("myModal" + pokemonsId[i]).style.display = "block";
        }
        span.onclick = function() {
            document.getElementById("myModal" + pokemonsId[i]).style.display = "none";
        }
        window.onclick = function(event) {
        if (event.target == document.getElementById("myModal" + pokemonsId[i])) {
            document.getElementById("myModal" + pokemonsId[i]).style.display = "none";
        }

    }}


    let image = document.getElementById('img');
    let contentPrice = document.getElementById('priceSpecies');
    let species = <?= $jsonSpecies ?>;
    let priceSpecies = <?= $jsonPriceSpecies ?>;
    let pricesFree = <?= $jsonPriceFree ?>;
    cleanliness = '<?php echo($fence->getCleanliness()); ?>';
    let populationName = document.getElementById('namePopulation').textContent;
    
</script>
<?php
    include_once('footer.php');
?>