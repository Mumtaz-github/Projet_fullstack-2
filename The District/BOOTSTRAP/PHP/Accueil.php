<?php $showVideo = true; ?>
<?php

session_start();  // Start the session to store the CSRF token
$csrfToken = bin2hex(random_bytes(32));  // Generate a CSRF token
$_SESSION['csrf_token'] = $csrfToken;  // Store the CSRF token in the session



require_once('header.php');
require_once('database.php');
require_once('DAO.php');  //  likely contains the Data Access Object (DAO) class to interact with database

$dao = new DAO($conn);  // Create a new instance of the DAO class, passing in the database connection

$categories = $dao->getPopularCategories(); // Use prepared statements to prevent SQL injection attacks
$bestSellingDishes = $dao->getBestSellingDishes();

$searchQuery = trim($_GET['q']);   // Validate user input (e.g. search query)
$searchQuery = htmlspecialchars($searchQuery, ENT_QUOTES, 'UTF-8');
echo htmlentities($searchQuery); // HTML encode output to prevent XSS
?>

<?php require_once('../PHP/header.php') ?>

<body id="parallax">
  <div class="container py-0">
    <h1 class="text-center mb-4">CATÉGORIES POPULAIRES</h1> <!--parite 6 plats-->
    <div class="row row-cols-1 row-cols-md-3 g-5">
      <?php foreach ($categories as $category) : ?> <!-- Start a foreach loop to iterate over the $categories array, This code will be executed for each element in the $categories array
        // The value of each element will be assigned to the $category variable-->
        <div class="col-md-4">
          <a href="plats.php?category_id=<?= $category['id']; ?>">
            <div class="card">
              <img src="img/<?= $category['image']; ?>" class="card-img-top" alt="<?= $category['libelle']; ?>">
              <div class="card-img-overlay text-center">
                <div class="card-body ">
                  <h5 class="card-title" style="position: absolute; bottom: 0; left: 0; width: 100%;"><?= $category['libelle']; ?></h5>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <h1 class="text-center mt-5 mb-4">PLUS VENDUS PLATS</h1> <!--partie 3 plats-->
    <div class="row row-cols-1 row-cols-md-3 g-5">
      <?php foreach ($bestSellingDishes as $dish) : ?> <!--foreash is loop,is syntax for loop, saying take $bestselingdihses array et iterate over it,assigning eash value to a new variable $dish-->
        <div class="col-md-4">
          <!-- <a href="plats.php">  the plats images no longer clickable    Anchor eleme  linking to the plats.php page -->
          <div class="card plats-card-no-zoom"> <!--j'ai utilisé plats-card-no-zoom pour 3 plats, je ne veux pas zooming sur  -->
            <img src="img/<?= $dish['image']; ?>" class="dis-img-top" alt="<?= $dish['libelle']; ?>"> <!-- Image element for each best-selling dish -->
            <div class="card-img-overlay text-center"> <!-- Card overlay element that is positioned on top of another-->
              <div class="card-body ">
                <h5 class="card-title" style="position: absolute; bottom: 0; left: 0; width: 100%;"><?= $dish['libelle']; ?></h5>
              </div>
            </div>
          </div>
          <!-- </a> -->
        </div>
      <?php endforeach; ?>
    </div>
  </div>


  <form action="plats.php" method="get" class="ongletrecherche"> <!-- Add a search form -->
    <input type="search" name="q" placeholder="Rechercher..."> <!-- Search input element -->
    <button type="submit">Rechercher</button>
  </form>
  <!--Add a container for search results -->
  <section id="search-results-container">
    <h2 class="text-center mb-4"></h2>
    <div id="search-results">
    </div>
  </section>





  <!-- 
 <div class="container mt-3">
  <form action="" method="GET" class="form-inline justify-content-center">
    <input type="text" name="search" class="form-control mr-sm-2" 
    placeholder="Rechercher..." value="< ?php echo htmlspecialchars($searchTerm, ENT_QUOTES, 'UTF-8');?>">
      <button type="submit" class="btn btn-primary">Rechercher</button>
  </form>
</div> 
   -->

  <?php require_once('../PHP/footer.php') ?>
  <script src="../JAVASCRIPT/categplats.JS"></script>
  <script src="../JAVASCRIPT/searchbar.js"></script>