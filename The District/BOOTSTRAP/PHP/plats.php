<?php $showVideo = true; ?>
<?php

// Start the session to store the CSRF token
// session_start();


$csrfToken = bin2hex(random_bytes(32)); // Generate a CSRF token
$_SESSION['csrf_token'] = $csrfToken; // Store the CSRF token in the session


$searchQuery = trim($_GET['q']);   // Validate user input (e.g. search query)
$searchQuery = htmlspecialchars($searchQuery, ENT_QUOTES, 'UTF-8');
echo $sanitized_input;
echo htmlentities($searchQuery); // HTML encode output to prevent XSS

require_once('header.php');
require_once('database.php');
require_once('DAO.php');


$dao = new DAO($conn);  // Create a new instance of the DAO class, passing in the database connection object./*  */


if (isset($_GET['q'])) {  /*for searchbar of page accueil*/
  $searchQuery = $_GET['q'];
  $dishes = $dao->search($searchQuery);
} elseif (isset($_GET['category_id'])) {
  $category_id = $_GET['category_id'];
  $dishes = $dao->getDishesByCategory($category_id);
} else {
  $dishes = $dao->getAllDishes();
}
?>

<body>
  <div class="container py-2">
    <h1 class="text-center mb-5">TOUTES LES PLATS</h1>
    <div id="carouselExample" class="carousel slide text-center" data-bs-ride="carousel">
      <div class="carousel-inner mb-5 mt-5"> <!--mb mean margin bottom and mt mean margin top-->
        <?php
        $numSlides = ceil(count($dishes) / 2);
        for ($i = 0; $i < $numSlides; $i++) :
        ?>
          <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
            <div class="row row-cols-1 row-cols-md-2 g-4">
              <?php foreach (array_slice($dishes, $i * 2, 2) as $dish) : ?> <!--if i take this line in comment and below line sans comment , the plats page show all plats in vertical-->
                <!-- < ?php foreach ($dishes as $dish):?> -->
                <div class="col-md-6">
                  <div class="card flex-row plats-card-zoom"> <!--plats-card-no-zoom added for css to out from card zooming of this page-->
                    <a href="plats.php?id=<?= $dish['id']; ?>">
                      <img class="dish-img-top" src="img/<?= $dish['image']; ?>" style="width:12rem; height:22rem" id="imgpla" alt="<?= $dish['libelle']; ?>">
                    </a>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title"><?= $dish['libelle']; ?></h5>
                        <p class="card-text"><?= $dish['description']; ?></p>
                        <p class="card-text m-0">Prix: <?= $dish['prix']; ?> €</p>
                        <a href="../PHP/Commande.php?id=<?= $dish['id']; ?>" class="btn btn-dark btn-lg rounded-pill command-button-custom" id="pla">Commander</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endfor; ?>
      </div>
      <!-- Carousel controls -->
      <div class="container-fluid mt-0 mb-0">
        <div class="col">
          <div class="col d-flex justify-content-between"> <!--justify-content-between, push the buttons towards y and x axis-->
            <button class="carousel-control-prev bg-primary d-none" id="carouselcatprec" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="btn btn-dark btn-lg rounded-pill col-md-1" onclick="precedent()" type="button" id="pre">Précédent</button>
            <button class="carousel-control-next d-none" id="carouselcatsuiv" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
            <button class="btn btn-dark btn-lg rounded-pill col-md-1" onclick="suivant()" type="button" id="nex">Suivant</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- ****************************socail media icons***************************-->
  <?php require_once('../PHP/footer.php') ?>

  <script src="../JAVASCRIPT/categplats.JS"></script>
  <script src="../JAVASCRIPT/searchbar.js"></script>