<?php
require_once('header.php');
?>
<?php $showVideo = false;?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentions Légales</title>
    <link rel="stylesheet" href=" ../CSS/plats.css"><!-- your main stylesheet -->
     
    <style>
        <?php if (basename($_SERVER['PHP_SELF']) == 'Mentions_légales.php') { ?>
            body {
                background-image: none; /* or any other background style you prefer */
            }
        <?php } ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body id="mentions-legales-page>
    <div class="container">
        <h1 class="text-center">A propos des mentions légales</h1>
        <p>Chaque site internet, quelque soit son activité : e-commerce, blog, forum… doit obligatoirement afficher de manière claire et suffisamment accessible, des mentions légales sous peine de voir son éditeur être sanctionné jusqu’à un an d’emprisonnement, outre 75 000 € d’amende pour les personnes physiques et 375 000 € pour les personnes morales.</p>
        <p>Bien que de manière générale, les visiteurs prennent rarement connaissance de ces mentions, l’éditeur doit particulièrement veiller à leur rédaction surtout que cette obligation est renforcée pour les professionnels.</p>
        <h2 class="text-center">La loi pour la confiance de l'économie numérique</h2>
        <p>La loi pour la confiance de l’économie numérique du 21 juin 2004 (Articles 6-III et 19 de la Loi n°2004-575) stipule que ces mentions contiennent :</p>
        <ul>
            <li>pour un entrepreneur individuel : nom, prénom, domicile</li>
            <li>pour une société : raison sociale, forme juridique, adresse de l’établissement ou du siège social (et non pas une simple boîte postale), montant du capital social</li>
            <li>adresse de courrier électronique et numéro de téléphone</li>
            <li>pour une activité commerciale : numéro d’inscription au registre du commerce et des sociétés (RCS)</li>
            <li>pour une activité artisanale : numéro d’immatriculation au répertoire des métiers (RM)</li>
            <li>en cas d’activité commerciale : numéro individuel d’identification fiscale numéro de TVA intracommunautaire</li>
            <li>pour une profession réglementée : référence aux règles professionnelles applicables et au titre professionnel</li>
            <li>nom et adresse de l’autorité ayant délivré l’autorisation d’exercer quand celle-ci est nécessaire</li>
            <li>nom du responsable de la publication</li>
            <li>coordonnées de l’hébergeur du site : nom, dénomination ou raison sociale, adresse et numéro de téléphone</li>
            <li>pour un site marchand, conditions générales de vente (CGV) : prix (exprimé en euros et TTC), frais et date de livraison, modalité de paiement, service après-vente, droit de rétractation, durée de l’offre, coût de la technique de communication à distance</li>
            <li>numéro de déclaration simplifiée Cnil, dans le cas de collecte de données sur les clients (non obligatoire, mais recommandé)</li>
        </ul>
        <h2 class="text-center">Cookies</h2>
        <p>Avant de déposer ou lire un cookie, les éditeurs de sites ou d’applications doivent :</p>
        <ul>
            <li>informer les internautes de la finalité des cookies,</li>
            <li>obtenir leur consentement,</li>
            <li>fournir aux internautes un moyen de les refuser.</li>
        </ul>
        <p>Ces mentions légales sont à distinguer des conditions générales de vente (CGV) également obligatoires sur les sites e-commerce, mais également des conditions générales d’utilisation (CGU – conseillées mais non obligatoires) dans lesquelles elles peuvent cependant être intégrées.</p>
        <p>Le lien pour accéder aux mentions légales et CGV/CGU doit être facilement accessible et présent sur toutes les pages du site.</p>
    </div>
</body>
</html>
<?php require_once('../PHP/footer.php') ?>