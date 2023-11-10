<?php
    require_once('config/autoload.php');
    require_once('config/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Zoo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    if(isset($_SESSION['LOGGED_USER'])){
        $pokemonZoo = new Zoo($db, $_SESSION['LOGGED_USER']);
        $reserve = $pokemonZoo->getReserve();
    }?>
    <header>
        <nav class="navbar navbar-expand-lg ">
            <div class="d-flex align-items-center w-100 justify-content-around flex-wrap">
                <a class="nav-item dropdown ms-xl-5 ms-lg-3">
                    <a class="nav-link dropdown-toggle text-light text-decoration-none" href="index.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Accueil
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-light" href="index.php">Accueil</a></li>
                        <li><a class="dropdown-item text-light" href="rankings.php">Classements</a></li>
                        <li><?php if (isset($_SESSION['LOGGED_USER'])) {
                        echo('<a href="process/logout.php" class="dropdown-item text-light">Se déconnecter</a>');
                    }
                    ?></li>
                    </ul>
                </a>
                <a href="index.php" class=" offset-xxl-4 offset-xl-3 offset-lg-3"><img src="images/logo.png"  id="logo"></a>
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNavDropdown">
                    <ul class="navbar-nav d-flex flex-row justify-content-around ms-auto align-items-center">
                        <li class="nav-item me-xl-3 ">
                            <?php if (isset($_SESSION['LOGGED_USER'])){
                                echo('<a class="text-decoration-none text-light nav-link" href="fence.php?fenceId='. $reserve->getId() .'">Réserve</a>');} ?>
                        </li>
                        <?php if (isset($_SESSION['LOGGED_USER'])){ ?>
                            <?php if ($pokemonZoo->getTime() < 30){ ?>
                                <li class="nav-item me-xl-3">
                                <a href="process/endTheDay.php" class="text-decoration-none text-light nav-link">Finir journée</a>
                                </li>
                            <?php } ?>
                        <li class="nav-item">
                        <div id="gameInfos" class="text-light nav-link ">
                            <h5>Jour <?php echo($pokemonZoo->getTime()) ?></h5>
                            <h5><?php echo($pokemonZoo->getPokedollars()) ?><img src="images/pokedollar.png" height="30px" class="ms-2"></h5>
                        </div>
                        <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>