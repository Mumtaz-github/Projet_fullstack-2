<?php
require_once 'mailcontact.php';
?>
<?php $showVideo = true; ?> <!--this one to stop video of header on page commande and contact, true to display and false undisplay-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/plats.css">
</head>

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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>