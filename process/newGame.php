<?php
    require_once('../config/autoload.php');
    require_once('../config/db.php');

    $pokemonZoo = new Zoo($db, $_SESSION['LOGGED_USER']);

$pokemonZoo->deleteZoo($pokemonZoo->getId());
session_destroy();
header('Location:../index.php');