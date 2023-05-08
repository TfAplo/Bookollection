<?php

function afficherInfoCompte ($link) {
    $idutilisateur = $_SESSION['id']; 
    $sql = "SELECT nomUtilisateur, email, dateNaissance FROM utilisateur WHERE idUtilisateur $idutilisateur"; 
    $result = mysqli_query($link, $sql);
    $result->data_seek(0);
    $row = $result->fetch_assoc(); 
    echo "<p>Nom d'utilisateur : ".$row['nomUtilisateur']."</p>\n";
    echo "<p>Mot de passe: *********</p>\n"; 
    echo "<p>E-mail: ".$row['email']."</p>\n"; 
    echo "<p>Date de naissance : ".$row['dateNaissance']."</p>\n"; 
    mysqli_free_result($result); I 
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
                    <?php
                        $link = connexion();
                        afficherInfoCompte($link);
                        if ($link) {
                            myqsli_close($link);
                        }

                    ?>
                </div>
            </div>

            <div class="categorie">
                <h2 class="toggle">📔 Sécurité 📔</h2>
                
                <div class="contenu">
                <p>securité é é securité é é</p>
                
                </div>
            </div>

            <div class="categorie">
                <h2 class="toggle">📒 Soutenir 📒</h2>

                <div class="contenu">
                <p>na wash miné na wash minéné okay na wash mi né né wash mi né né </p>

                </div>
            </div>

            <div class="categorie">
                <h2 class="toggle">📕 Assistance 📕</h2>

                <div class="contenu">
                    <h2>FAQ</h2>
                    <h4>Esce que notre site est le meilleur ?</h4>
                    <p>UI</p>
                    <h4>Esce que evan est plus fort a valorant que bastien ?</h4>
                    <p>UI</p>
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