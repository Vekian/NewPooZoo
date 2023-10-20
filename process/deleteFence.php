<?php
    require_once('../config/autoload.php');
    require_once('../config/db.php');

    if (isset($_GET['fenceId'])){
        $pokemonZoo = new Zoo($db, $_SESSION['LOGGED_USER']);
        $fenceId = $_GET['fenceId'];
        $employee = $pokemonZoo->getEmployee();
        $pokemons = $employee->examinePokemons($fenceId);
        $reserve= $pokemonZoo->getReserve();
        foreach($pokemons as $pokemon){
            $employee->movePokemonFromFence($pokemon->getId(), $reserve->getId(), $fenceId);
        }
        $pokemonZoo->deleteFence($fenceId);
    }
header('Location:../index.php');