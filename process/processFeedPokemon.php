<?php
    require_once('../config/autoload.php');
    require_once('../config/db.php');

$pokemonZoo = new Zoo($db, $_SESSION['LOGGED_USER']);
if (isset($_GET['id'])){
     $id= $_GET['id'];
     $fenceId = $_GET['fenceId'];
     $price = $_GET['price'] * (-1);
}
$employee = $pokemonZoo->getEmployee();
$pokemon= $employee->getPokemon($id);
if(($pokemonZoo->getPokedollars() + $price) >= 0 ) {
$employee->feedPokemon($pokemon);
$pokemonZoo->addMoney($price);
header('Location:../fence.php?fenceId=' . $fenceId);
} else {
    $alert = ["Vous n'avez pas assez de pokédollars pour nourrir " . $pokemon->getName()];
    $pokemonZoo->updateSummary(serialize($alert));
    header('Location:../index.php');
}