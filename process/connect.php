<?php
require_once('../config/autoload.php');
require_once('../config/db.php');

$query = 'SELECT * FROM zoo';
$sttm = $db-> prepare($query);
$sttm->execute();
$zoos = $sttm->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['pseudo']) && isset($_POST['password'])){
    foreach($zoos as $zoo) {
        if ($zoo['nameZoo'] === $_POST['pseudo'] && password_verify($_POST['password'], $zoo['password'])) {
            $loggedUser = [
                'zooId' => $zoo['id']
            ];
            $_SESSION['LOGGED_USER'] = intval($loggedUser['zooId']);
        }
        else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s%s)', $_POST['pseudo'], $_POST['password']);
        }
    }
}
header('Location:../index.php?error='.$errorMessage);