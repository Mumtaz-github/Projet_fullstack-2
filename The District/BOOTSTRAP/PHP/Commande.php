<?php
$csrfToken = bin2hex(random_bytes(32)); // Generate a CSRF token
$_SESSION['csrf_token'] = $csrfToken; // Store the CSRF token in the session

 
 $searchQuery = trim($_GET['q']);  // Validate user input (e.g. search query)
 $searchQuery = htmlspecialchars($searchQuery, ENT_QUOTES, 'UTF-8');

echo $sanitized_input;
echo htmlentities($searchQuery); // HTML encode output to prevent XSS

require_once('database.php'); // Include the database.php file
require_once('DAO.php');
require_once 'mail.php';

function getDishDetails($id)
{
  $dao = new DAO($GLOBALS['conn']);
  return $dao->getDishById($id);
}
$id = $_GET['id']; // Validate and sanitize this input
$dish = getDishDetails($id);

$id = $_GET['id']; // Validate and sanitize this input
$dish = getDishDetails($id);


$dishImage = $dish['image']; // display the dish image or plat
?>
<?php $showVideo = false; ?> <!--this one to stop video of header on page commande-->



<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commande</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/plats.css">
</head> -->
<?php require_once('../PHP/header.php') ?>

<!--line form and next input can be place above the container line but broke html input boxes-->
<div class="container mt-5 p-5 plats-container" style="justify-content: center;">
  <form id="formule" class="row g-3" action="mail.php" method="post"> <!--i replace  mail.php to Commandeformulaire.php to send email to mailhog not Commandeformularie.php-->
    <input type="hidden" name="libelle" value="<?php echo $dish['libelle']; ?>">
    <div class="card mb-5 text-center mx-auto p-2" style="max-width: 802px; background-color:#ff8c00">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="img/<?= $dishImage; ?>" class="img-fluid" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h4 class="card-title"><?= $dish['libelle']; ?></h4>
            <p class="card-text"><?= $dish['description']; ?></p>
            <div class="d-flex justify-content-end mt-auto p-4">
              <label> Quantité:</label>
              <input type="number" name="quantite" id="number" style="width: 15%;" min="0" max="50" value="1">
              <input type="hidden" name="prixUnitaire" id="prix" value="<?= $dish['prix']; ?>"> <!--hidden -->
            </div>
            <div class="d-flex justify-content-end mt-auto p-4">
              <span id="totalChamp">Total : <?= $dish['prix']; ?> €</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12"> <!--offset-md-2-->
      <div class="form-group">
        <label for="i" class="form-label float-right">Nom et Prénom</label>
        <input type="text" name="NomPrenom" class="form-control" id="i" style="background-color: rgb(174, 214, 236);">
        <span>ce champ est obligatoire</span>
      </div>
    </div>
    <br>
    <br><!-- added break line -->
    <div class="col-md-6"><!--offset-md-2-->
      <div class="form-group">
        <label for="j" class="form-label float-right">Email</label>
        <input type="email" name="email" class="form-control" id="email" style="background-color: rgb(174, 214, 236);">
        <span>ce champ est obligatoire</span> <!--id="j"-->
      </div>
    </div>
    <br>
    <br> <!-- added break line -->
    <div class="col-md-6"><!--offset-md-2-->
      <div class="form-group">
        <label for="k" class="form-label float-right">Phone Number</label>
        <input type="text" name="phone" class="form-control" id="k" style="background-color: rgb(174, 214, 236);">
        <span>ce champ est obligatoire</span>
      </div>
    </div>
    <br>
    <br> <!-- added break line -->
    <div class="col-md-12 "><!--offset-md-2-->
      <div class="form-group">
        <label for="l" class="form-label float-right">Votre Demande</label>
        <textarea name="demande" class="form-control" id="l" rows="3" style="background-color: rgb(174, 214, 236);"></textarea>
        <span>ce champ est obligatoire</span>
      </div>
    </div>
    <br>
    <br> <!-- added break line -->
    <div class="col-md-12"><!--col-md-10"-->
      <button type="submit" class="btn rounded-pill btn-dark btn-sm float-end" id="commande">Envoyer</button>
    </div>
    <input type="hidden" id="total" name="total">
  </form>
</div>
<?php require_once('footer.php') ?>

<!-- <script src="../JAVASCRIPT/searchbar.js"></script> -->
<script src="../JAVASCRIPT/commande.js"></script>
<script src="../JAVASCRIPT/categplats.JS"></script>
