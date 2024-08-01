<?php $showVideo = true; 
$csrfToken = bin2hex(random_bytes(32)); // Generate a CSRF token
$_SESSION['csrf_token'] = $csrfToken; // Store the CSRF token in the session


$searchQuery = trim($_GET['q']);  // Validate user input (e.g. search query)
$searchQuery = htmlspecialchars($searchQuery, ENT_QUOTES, 'UTF-8');

echo $sanitized_input;
echo htmlentities($searchQuery); // HTML encode output to prevent XSS

require_once('header.php');
require_once('database.php');
require_once('DAO.php');

$dao = new DAO($GLOBALS['conn']);


$bestSellingDishes = $dao->getBestSellingDishes(); // Retrieve the best-selling dishes
$categories = $dao->getCategories(); // Retrieve the categories from the database

$itemsPerSlide = 3; // Calculate the number of items per slide
$numSlides = ceil(count($categories) / $itemsPerSlide); // Calculate the number of slides

?>


<body>
  <div class="container plats-container"> <!--plats-container for css zooming cards-->
    <h1 class="text-center my-3">CATÉGORIES</h1>
    <div id="carouselExample" class="carousel slide text-center" data-bs-ride="carousel">
      <div class="carousel-inner carousel-no-scroll "> <!--mb mean margin bottom and mt mean margin top-->

        <?php for ($i = 0; $i < $numSlides; $i++) : ?> <!-- Loop through the number of slides-->
          <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>"> <!-- Carousel item, active class added for the first item-->
            <div class="row row-cols-1 row-cols-md-3 gx-5"> <!--gx give space between categories in horizantally-->
              <?php foreach (array_slice($categories, $i * $itemsPerSlide, $itemsPerSlide) as $category) : ?> <!-- Loop through the categories for this slide, using array_slice to get the correct subset-->
                <div class="col-md-4 mb-4 "> <!-- Column container for each category -->
                  <div class="card">

                    <!-- Link to category page with image and overlay -->
                    <a href="plats.php?category_id=<?= $category['id']; ?>" style="position:relative; z-index: 1;"> <!--z-index: 1 make image clickable-->
                      <img src="img/<?= $category['image']; ?>" class="card-img-top" alt="<?= $category['libelle']; ?>"> <!-- Category image -->
                      <div class="card-img-overlay text-center"> <!-- Image overlay with category title -->
                        <div class="card-body">
                          <!-- Category title -->
                          <h5 class="card-title" style="position: absolute; bottom: 0px; left: 0; width: 100%;"><?= $category['libelle']; ?></h5>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endfor; ?>
      </div>
      <!--*********************buttons********************-->
      <div class="container-fluid mt-3 mb-3">
        <div class="col">
          <div class="col d-flex justify-content-between"><!--justify-content-between push the button towards x and y axis-->
            <button class="carousel-control-prev bg-primary d-none" id="carouselcatprec" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="btn btn-dark btn-lg rounded-pill col-md-1 " onclick="precedent()" type="button" id="pre">Précédent</button>
            <button class="carousel-control-next d-none" id="carouselcatsuiv" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
            <button class="btn btn-dark btn-lg rounded-pill col-md-1" onclick="suivant()" type="button" id="nex">Suivant</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once('../PHP/footer.php') ?>
  <script src="../JAVASCRIPT/categplats.JS"></script>
  <script src="../JAVASCRIPT/searchbar.js"></script>



</body>

</html>