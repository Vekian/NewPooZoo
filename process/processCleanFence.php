<?php
require_once('../config/autoload.php');
require_once('../config/db.php');

$pokemonZoo = new Zoo($db, $_SESSION['LOGGED_USER']);
if (isset($_GET['fenceId'])){
 $fenceId = $_GET['fenceId'];
 $price = $_GET['price'] * (-1);
}
$employee = $pokemonZoo->getEmployee();
$fence= $employee->getFence($fenceId);
if(($pokemonZoo->getPokedollars() + $price) >= 0 ) {
    $employee->cleanFence($fence);
    $pokemonZoo->addMoney($price);
    header('Location:../fence.php?fenceId=' . $fenceId);
} else {
    $alert = ["Vous n'avez pas assez de pokédollars pour nettoyer l'enclos"];
    $pokemonZoo->updateSummary(serialize($alert));
    header('Location:../index.php');
}