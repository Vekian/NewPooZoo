<?php
    require_once('../config/autoload.php');
    require_once('../config/db.php');

    $pokemonZoo = new Zoo($db, $_SESSION['LOGGED_USER']);
    $employee = $pokemonZoo->getEmployee();
    if (isset($_POST['pokemonId'])){
        $idPokemon = $_POST['pokemonId'];
        $fenceId = $_POST['fenceId'];
        $newFenceId = $_POST['newFenceId'];
    }
    if(($pokemonZoo->getPokedollars() + $price) >= 0 ) {
    $employee->movePokemonFromFence($idPokemon, $newFenceId, $fenceId);
    $pokemonZoo->addMoney(-5);
    header('Location:../fence.php?fenceId='. $fenceId);
    } else {
        $alert = ["Vous n'avez pas assez de pokédollars pour déplacer ce pokémon"];
        $pokemonZoo->updateSummary(serialize($alert));
        header('Location:../index.php');
    }