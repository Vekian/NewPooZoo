<?php
    require_once('../config/autoload.php');
    require_once('../config/db.php');

    $pokemonZoo = new Zoo($db, $_SESSION['LOGGED_USER']);
    $employee = $pokemonZoo->getEmployee();
    if (isset($_POST['fenceId'])){
        $fenceId = $_POST['fenceId'];
        $idSpecies = $_POST['idSpecies'];
        $price = intval($_POST['price']) * (-1);
    }
    if(($pokemonZoo->getPokedollars() + $price) >= 0 ) {
    $employee->addPokemon($idSpecies, $fenceId);
    $pokemonZoo->addMoney($price);
    header('Location:../fence.php?fenceId='. $fenceId);
    } else {
        $alert = ["Vous n'avez pas assez de pokédollars pour acheter un nouveau pokémon"];
        $pokemonZoo->updateSummary(serialize($alert));
        header('Location:../index.php');
    }