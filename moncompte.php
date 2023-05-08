<?php

error_reporting(E_ALL);
require_once ('connexionDB.php');
mysqli_report(MYSQLI_REPORT_OFF);
session_start();

function afficherInfoCompte ($link) {
    $idutilisateur = $_SESSION['id']; 
    $sql = "SELECT nomUtilisateur, email, dateNaissance FROM utilisateur WHERE idUtilisateur = $idutilisateur"; 
    $result = mysqli_query($link, $sql);
    $result->data_seek(0);
    $row = $result->fetch_assoc(); 
    echo "<p>Nom d'utilisateur : ".$row['nomUtilisateur']."</p>\n";
    echo "<p>Mot de passe: *********</p>\n"; 
    echo "<p>E-mail: ".$row['email']."</p>\n"; 
    echo "<p>Date de naissance : ".$row['dateNaissance']."</p>\n"; 
    mysqli_free_result($result);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contenu="IE=edge">
    <meta name="viewport" contenu="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images\ico-removebg-preview.png" type="image/png">
    <link rel="stylesheet" href="styles/moncompte.css">
    <title>Mon Compte - Bookollection</title>
    </head>
<body>
    <div id="bco">
        <div class="theme">
            <a class="clair" href="javascript:void(0)"><img src="images/wb_sunny.png" alt="" width="20px"></a>
            <a class="sombre" href="javascript:void(0)"><img src="images/brightness_2.png" alt="" width="20px"></a>
        </div>

        <div class="menu">
            <div class="categorie">
                <h2 class="toggle">📚 Profil 📚</h2>
                <div class="contenu">
                    <img id="createur" src="images/account_circle_clair-removebg-preview.png">
                    <?php
                        $link = connexion();
                        afficherInfoCompte($link);
                        if ($link) {
                            mysqli_close($link);
                        }
                    ?>
                </div>
            </div>

            <div class="categorie">
                <h2 class="toggle">📔 Sécurité 📔</h2>
                
                <div class="contenu">
                <p>La sécurité de notre site est une priorité absolue. Nous prenons des mesures pour protéger les informations personnelles de nos utilisateurs et pour éviter les accès non autorisés à notre site.Si vous avez des questions ou des préoccupations concernant la sécurité de notre site, n'hésitez pas à nous contacter.</p>
                
                </div>
            </div>

            <div class="categorie">
                <h2 class="toggle">📒 Soutenir 📒</h2>

                <div class="contenu">
                <p>Notre site web est gratuit et nous avons besoin de votre soutien pour continuer à fournir du contenu de qualité. Si vous appréciez notre travail, vous pouvez nous soutenir de différentes manières. Vous pouvez partager notre site avec vos amis et votre famille, nous suivre sur les réseaux sociaux, ou faire un don pour nous aider à couvrir les frais d'hébergement et de maintenance. Chaque geste compte et nous sommes reconnaissants de votre soutien.</p>

                </div>
            </div>

            <div class="categorie">
                <h2 class="toggle">📕 Assistance 📕</h2>

                <div class="contenu">
                    <p>Vous rencontrez des problèmes ? Envoyez nous un mail sur assistance@bookollection.fr ou contactez le service de maintenance téléphonique au 02.47.36.47.36</p>
                </div>
            </div>

            <div class="categorie">
                <h2 class="toggle">📜 A Propos 📜</h2>
                
                <div class="contenu">
                    <p id="contenuAPropos">Réseaux Sociaux</p>
                    <a href="https://www.instagram.com/bookollection_off/">Instagram</a>
                    <a href="https://fr-fr.facebook.com/bookcollectionuk/">Facebook</a>
                    <a href="https://twitter.com/BookCollections">Twitter</a>

                    <p id="contenuAPropos">Créateurs du site</p>
                    <figure>
                        <img id="createur" src="images/account_circle_clair-removebg-preview.png" alt="photo créateurs">
                        <figcaption>Florian biardeau</figcaption>
                    </figure>
                    <figure>
                        <img id="createur" src="images/account_circle_clair-removebg-preview.png" alt="photo créateurs">
                        <figcaption>Inconnue</figcaption>
                    </figure>
                    <figure>
                        <img id="createur" src="images/account_circle_clair-removebg-preview.png" alt="photo créateurs">
                        <figcaption>Raphaël malidin</figcaption>
                    </figure>
                    <figure>
                        <img id="createur" src="images/account_circle_clair-removebg-preview.png" alt="photo créateurs">
                        <figcaption>Bastien delamare</figcaption>
                    </figure>
                    <figure>
                        <img id="createur" src="images/account_circle_clair-removebg-preview.png" alt="photo créateurs">
                        <figcaption>Evan Beaufeton</figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <script src="JSscripts/moncompte.js"></script>
    <script src="JSscripts/theme.js"></script>
</body>
</html>