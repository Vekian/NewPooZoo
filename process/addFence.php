<?php

require_once('../config/autoload.php');
require_once('../config/db.php');

if (isset($_POST['typeFence'])) {
    $pokemonZoo = new Zoo($db, $_SESSION['LOGGED_USER']);
    $background = 'public/images/' . (strtolower($_POST['typeFence'])) . '.jpg';
    $type = $_POST['typeFence'];
    $name = $_POST['nameFence'];
    $price = $_POST['price'] * (-1);
}
if (($pokemonZoo->getPokedollars() + $price) >= 0) {
    $pokemonZoo->addFence($name, $type, $background, $_SESSION['LOGGED_USER']);

    if ($type == "Legendaire") {
        $price -= 500;
    }
    $pokemonZoo->addMoney($price);
} else {
    $alert = ["Vous n'avez pas assez de pokédollars pour acheter un nouvel enclos"];
    $pokemonZoo->updateSummary(serialize($alert));
}
header('Location:../index.php');
