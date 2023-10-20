<?php
    require_once('../config/autoload.php');
    require_once('../config/db.php');

$pokemonZoo = new Zoo($db, $_SESSION['LOGGED_USER']);
if (isset($_GET['id'])){
     $id= $_GET['id'];
     $fenceId = $_GET['fenceId'];
}
$employee = $pokemonZoo->getEmployee();
$pokemon= $employee->getPokemon($id);
$employee->sleepPokemon($pokemon);
header('Location:../fence.php?fenceId=' . $fenceId);