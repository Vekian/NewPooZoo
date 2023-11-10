<?php
    include_once('header.php');
    
    
    if(isset($_SESSION['LOGGED_USER'])){ 
        $fences= $pokemonZoo->getFences();
?>
    <main class="text-center" id="infosFence">
        <div class="col-sm-8 col-12 offset-sm-2 infosZoo mt-3 mb-4">
            <h1>
                Bienvenue au <?php echo(htmlspecialchars($pokemonZoo->getName())); ?> !
            </h1>
            <h2>
                Il y a <?php  echo($pokemonZoo->numberTotal()); ?> pokemons dans le zoo. (dont <?php echo($fences[0]->getPopulation()) ?> dans la réserve)
            </h2>
            <div class="summary">
            <?php
            if($pokemonZoo->getSummary()){
                foreach($pokemonZoo->getSummary() as $dataSummary) {
                    
                    echo($dataSummary . "<br/>");
                } 
            }
            ?>
            </div>
        </div>

        <div id="fences" class="d-flex justify-content-center align-items-center flex-wrap">
            <?php 
                
                $pokemonZoo->displayFences();
            ?>
            <div>
                <button type="button" id="addFence" class="btn1 <?php
                if (count($pokemonZoo->getFences()) - 1 >= $pokemonZoo->getNumberMaxFences()) {
                    echo('d-none');
                }
                ?>" data-bs-toggle="modal" data-bs-target="#addFenceModal">
                    Ajouter un enclos
                </button>
            </div>
        </div>

        <div class="modal fade" id="addFenceModal" tabindex="-1" aria-labelledby="addFenceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addFenceModalLabel">Ajouter un enclos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3> Prix de l'enclos : <span id="priceFence"><?php echo($pokemonZoo->getPriceFence()); ?></span><img src='images/pokedollar.png' height='30px' /></h3>
                        <form action="process/addFence.php" method="POST" class="text-center m-4">
                            <label for="text" class="mt-1">Veuillez donner un nom à votre enclos : </label>
                            <input type="text" name="nameFence" id="nameFence" required><br />
                            <label for="typeFence" class="mt-1">Choisissez le type d'enclos : </label>
                            <select name="typeFence" id="typeFence" class="m-2" required >
                            <?php
                                echo('<option value="" selected disabled hidden>Choisir</option>');
                                $fenceTypes= Fence::$fenceTypes;
                                foreach($fenceTypes as $fenceType) {
                                    echo('<option value="'. $fenceType . '">' . $fenceType . '</option>');
                                }
                            ?>
                            </select class="btn btn-primary">
                            <input type="hidden" name="background" value="">
                            <input type="hidden" name="price" value="<?php echo($pokemonZoo->getPriceFence()); ?>">
                            <input type="submit" value="Créer un enclos" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    }
    else {
        if (isset($_GET['error'])){
            echo('<h5 class="text-center text-danger">' . $_GET['error'] . '</h5>');
        }
    ?>
    <div class="text-center">
        <div class="login col-8 offset-2 mt-3">
            <h4 class="m-3"> Veuillez vous connecter</h4>
            <form action="process/connect.php" method="POST" class="m-3">
                <label for="pseudo" >Identifiant (nom du zoo) : </label>
                <input type="text" id="pseudo" name="pseudo" required class="m-3" placeholder="Nom du Zoo" ><br />
                <label for="password">Mot de passe : </label>
                <input type="password" id="password" name="password" required class="mb-3 ms-3"><br />
                <button class="button bg-warning" type="submit" id="submit">Se connecter</button>
            </form>
        </div>
        <div class="login col-8 offset-2 mt-3">
            <h4> Ou créer un compte </h4>
            <form action="process/post-create-user.php" method="POST" class="m-3">
                <label for="pseudo" >Choisissez un nom pour votre zoo : </label>
                <input type="text" id="pseudo" name="pseudo" required class="m-3" placeholder="Nom du Zoo" ><br />
                <label for="password">Choisissez un mot de passe : </label>
                <input type="password" id="password" name="password" required class="mb-3 ms-3"><br />
                <label for="pseudoUser">Choisissez un nom pour votre employé : </label>
                <input type="text" id="pseudoUser" name="pseudoUser" required placeholder="Nom de l'employé">
                <label for="sex" class="mt-3">Choisissez le sexe votre employé : </label>
                <select name="sex" id="sex" required>
                    <option value="" selected disabled hidden>Choisir</option>
                    <option value="male" >Homme</option>
                    <option value="female" >Femme</option>
                </select><br />
                <label for="age" class="mt-3">Choisissez l'âge de votre employé : </label>
                <input type="number" id="age" name="age" required placeholder="Âge de l'employé" class="mb-3" min="16"><br />
                <button class="button bg-warning" type="submit" id="submit" >S'inscrire</button>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
    </main>
    <script>
    let selectFence = document.getElementById('typeFence');
    let price = document.getElementById('priceFence').textContent;
    selectFence.addEventListener("change", function (e) {
        let nameFence = e.target.value;
        let newPrice = parseInt(price);
        if (e.target.value === "Legendaire") {
            newPrice += 500;
        }
        document.getElementById('priceFence').textContent = newPrice;
    });
    </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>