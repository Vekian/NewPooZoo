<?php
    require_once('../config/autoload.php');
    require_once('../config/db.php');

$pokemonZoo = new Zoo($db, $_SESSION['LOGGED_USER']);
    $employee = $pokemonZoo->getEmployee();
    if (isset($_POST['idPokemon'])){
        $idPokemon = $_POST['idPokemon'];
        $fenceId = $_POST['fenceId'];
        $price = $_POST['price'];
    }
$employee->removePokemonFromFence($idPokemon, $fenceId);
$pokemonZoo->addMoney($price);
header('Location:../fence.php?fenceId='. $fenceId);