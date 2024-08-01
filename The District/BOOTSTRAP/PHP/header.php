<!DOCTYPE html>
<?php
session_start();
require_once('DAO.php');

$servername = "localhost";
$username = "admin";
$password = "Afpa1234";
$dbname = "district";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // configurer le mode d'erreur PDO pour générer des exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/plats.css">
    <?php
    if ($_SERVER['REQUEST_URI'] == "/PHP/Accueil.php") {
        echo
        '<link rel="stylesheet" href="../CSS/new.css">';
    } else {
        echo
        '<link rel="stylesheet" href="../CSS/plats.css">';
    }
    ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../IMG/img brand/logo_transparent.png" alt="logo" width="170" height="145"> <!--logo image-->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-1" id="navbarSupportedContent"> <!-- justify-content-center -->
                <ul class="navbar-nav mb-2 mb-lg-0 bottomnav"> <!--if write bottomnav and add css then responsive mode the navigation links comes on the navbar-->

                    <?php
                    $currentFile = basename($_SERVER['REQUEST_URI']); //this tage show that which page is active mean that on which page i am active
                    ?>

                    <li class="nav-item">
                        <a class="nav-link mx-md-4 <?php if ($currentFile == "Accueil.php") {
                                                        echo "active";
                                                    } ?> espace" href="Accueil.php">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-md-4 <?php if (in_array($currentFile, ["categorie.php"])) {
                                                        echo "active";
                                                    } ?> espace " href="categorie.php">CATEGORIE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-md-4 <?php if ($currentFile == "plats.php") {
                                                        echo "active";
                                                    } ?> espace " href="plats.php">PLATS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-md-4 <?php if ($currentFile == "Contact.php") {
                                                        echo "active";
                                                    } ?> espace " href="Contact.php">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="image-container">
        <!-- < ?php if ($_SERVER['REQUEST_URI']!== "/PHP/Commande.php") {?> -->
        <?php if ($showVideo) { ?> <!--this is one is added on place the above to show video on certain pages-->
            <video id="video" class="col-12" src="../IMG/mixk.mp4" style="width: 100%; height: 40vh;" playsinline autoplay loop muted></video>
    </div>
<?php } ?>
<?php if (basename($_SERVER['REQUEST_URI']) == "Accueil.php") { ?>
    <!-- <div class="ongletrecherche">
                    <input class="form-control me rounded-pill" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </div> 
                <!-- <div  class="ongletrecherche">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </div> -->
    <!-- header.php -->
    <!-- <div class="ongletrecherche">
  <form action="search.php" method="get">
    <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div> -->

<?php } ?>