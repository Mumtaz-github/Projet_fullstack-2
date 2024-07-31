<?php



// Generate a CSRF token
$csrfToken = bin2hex(random_bytes(32));

// Store the CSRF token in the session
$_SESSION['csrf_token'] = $csrfToken;

 // Validate user input (e.g. search query)
 $searchQuery = trim($_GET['q']);
 $searchQuery = htmlspecialchars($searchQuery, ENT_QUOTES, 'UTF-8');

echo $sanitized_input;

// HTML encode output to prevent XSS
echo htmlentities($searchQuery);

// $email = $_POST['email'];
// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     die("Invalid email address");
// }

// $username = $_POST['username'];
// if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
//     die("Invalid username");
// }

require_once 'mailcontact.php';
?>
<?php $showVideo = true; ?> <!--this one to stop video of header on page commande and contact, true to display and false undisplay-->




<body>
    <?php require_once('../PHP/header.php') ?>

    <!-- <img class="imagedefond img-fluid" src="../IMG/bg2.jpeg" height="10px" width="100%" position="relative:"> -->
    <!--<video id="video" class="mx-auto" src="../IMG/video.mp4" style="width: 100%; height: 35vh;" playsinline autoplay
            loop muted></video>-->
    <!-- <div class="container mt-5 p-5" style="justify-content: center;"> -->

    <div class="container mt-5 " style="justify-content: center;"> <!--p-5-->
        <form class="row g-3" id="formulaire" action="../PHP/mailcontact.php" method="post">
            <div class="col-md-6"><!--offset-md-2--> <!--all these option put contact page input box in middle of the page-->
                <div class="form-group">
                    <label for="a" class="form-label float-right">Nom</label>
                    <input type="text" name="Nom" class="form-control" id="a" style="background-color: rgb(174, 214, 236);">
                    <span>ce champ est obligatoire</span>
                </div>
            </div>
            <div class="col-md-6"><!--offset-md-2-->
                <div class="form-group">
                    <label for="b" class="form-label float-right">Prénom</label>
                    <input type="text" name="Prenom" class="form-control" id="b" style="background-color: rgb(174, 214, 236);">
                </div>
            </div>
            <div class="col-md-6 "><!--offset-md-2-->
                <div class="form-group">
                    <label for="c" class="form-label float-right">Email</label>
                    <input type="email" name="email" class="form-control" id="c" style="background-color: rgb(174, 214, 236);">
                </div>
            </div>
            <div class="col-md-6"><!--offset-md-2-->
                <div class="form-group">
                    <label for="d" class="form-label float-right">Phone Number</label>
                    <input type="text" name="PhoneNumber" class="form-control" id="d" placeholder="+33(....)" style="background-color: rgb(174, 214, 236);">
                    <span>ce champ est obligatoire</span>
                </div>
            </div>
            <div class="col-md-12"> <!--offset-md-2-->
                <div class="form-group">
                    <label for="e" class="form-label float-right">Votre Demande</label>
                    <textarea name="Demande" class="form-control" id="e" rows="3" style="background-color: rgb(174, 214, 236);"></textarea>
                </div>
            </div>
            <div class="col-md-12"> <!--col-md-10-->
                <button type="submit" class="btn  rounded-pill btn-dark btn-sm float-end " id="contact">Envoyer</button>
                <!--class="btn btn-primary-->
            </div>
        </form>
    </div>
    <?php require_once('../PHP/footer.php') ?>

    <script src="../JAVASCRIPT/searchbar.js"></script>
 
</body>

</html>