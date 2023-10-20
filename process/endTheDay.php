<?php
require_once('../config/autoload.php');
require_once('../config/db.php');

$pokemonZoo = new Zoo($db, $_SESSION['LOGGED_USER']);
if ($pokemonZoo->getTime() < 30) {
    $pokemonZoo->endOfTheDay();
}
else {
    $pokemonZoo->endOfTheGame();
}
header('Location:../index.php');