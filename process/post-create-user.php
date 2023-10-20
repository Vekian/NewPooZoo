<?php
require_once('../config/autoload.php');
require_once('../config/db.php');

if (!isset($_POST['pseudo']) && !isset($_POST['password'])){
    echo('Rentrez des identifiants valides');
    return;
}
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$name = $_POST['pseudo'];
$pseudoUser = $_POST['pseudoUser'];
$sex = $_POST['sex'];
$age = $_POST['age'];
$stmt = $db->prepare('INSERT INTO zoo (nameZoo, password, numberMaxFences, pokedollars, time, popularity) VALUES (:nameZoo, :password, :numberMaxFences, :pokedollars, :time, :popularity)');
$stmt->execute([
    'nameZoo' => $name,
    'password' => $hashedPassword,
    'numberMaxFences' => 4,
    'pokedollars' => 100,
    'time' => 0,
    'popularity' => 0
]);
$id = intval($db->lastInsertId());
$stmt = $db->prepare('INSERT INTO staff (nameEmployee, age, sex, zoo_id) VALUES (:nameEmployee, :age, :sex, :zoo_id)');
$stmt->execute([
    'nameEmployee' => $pseudoUser,
    'age' => $age,
    'sex' => $sex,
    'zoo_id' => $id
]);
$pokemonZoo = new Zoo($db, $id);
$pokemonZoo->addFence('Reserve', 'Reserve', 'images/reserve.jpg', $id);


$_SESSION['LOGGED_USER'] = $id;
header('Location:../index.php');