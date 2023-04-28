<?php

// fonction

function recupererLivre ($link) {
    //session_start();         QUAND TOM AURA FINI LES SESSIONS
    //$id = $_SESSION["id"];   QUAND TOM AURA FINI LES SESSIONS
    $sql = "SELECT DISTINCT l.titre, a.nomAuteur, g.nomGenre, l.description, l.couverture FROM livre l
            INNER JOIN ajoutcollection ac ON l.idLivre = ac.idLivre
            INNER JOIN ecritpar ep ON l.idLivre = ep.idLivre
            INNER JOIN auteur a ON ep.idAuteur = a.idAuteur
            INNER JOIN genre g ON l.idGenre = g.idGenre
            INNER JOIN livreestregistre er ON l.idLivre = er.idLivre
            INNER JOIN registre r ON er.idRegistre = r.idRegistre
            WHERE ac.idUtilisateur = 2"; // REMPLACER CHIFFRE PAR $idUtilisateur // PROBLEME CAR SI 2 AUTEUR ALORS 2 FOIS LA MEME LIGNE
    if (!empty($_POST)) {
        if (isset($_POST["titre"])) {
            $titre = $_POST["titre"];
            $sql .= " AND l.titre LIKE '%$titre%'";
        }
        if (isset($_POST["lu"])) {
            $sql .= " AND ac.lu = TRUE";
        }
        if (isset($_POST["possession"])) {
            $sql .= " AND ac.possede = TRUE";
        }
        if (isset($_POST["genre"])) {
            $genre = $_POST["genre"];
            $sqlGenre = " AND (";
            foreach ($genre as $nomGenre) {
                $sqlGenre .= "g.nomGenre = '$nomGenre' OR ";
            }
            $sqlGenre = substr($sqlGenre,0,-4);
            $sqlGenre .= ")";
            $sql .= $sqlGenre;
        }
        if (isset($_POST["registre"])) {
            $registre = $_POST["registre"];
            $sqlRegistre = " AND (";
            foreach ($registre as $nomRegistre) {
                $sqlRegistre .= "r.nomRegistre = '$nomRegistre' OR ";
            }
            $sqlRegistre = substr($sqlRegistre,0,-4);
            $sqlRegistre .= ")";
            $sql .= $sqlRegistre;
        }
    }
    if ($result = mysqli_query($link, $sql) ){
        if (mysqli_num_rows($result) == 0) {
            echo "Aucun livre trouvé...";
        } else {
            afficherLivre($result);
        }
    }
}

function afficherLivre ($result) {
    $result->data_seek(0);
    while ( $row = $result->fetch_assoc() ) {
        echo "<a class='livres' href='livre.html'>\n";
        echo "<img src='images/book-cover-picture.png' width='60px' alt='couverture du livre'>\n";
        echo "<div>\n";
        echo "<h3>".$row['titre']."</h3>\n";
        echo "<h4>De ".$row['nomAuteur']."</h4>";
        echo "<p id='description'>".$row['description']."</p>\n";
        echo "</div>\n";
        echo "</a>\n";
    }
    //echo "</mysql_free_result($result)";
}   

//script principal

    error_reporting(E_ALL);
    require_once ('dbConnect.php');
    //mysqli_report(MYSQLI_REPORT_OFF);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/collection.css">
    <link rel="stylesheet" href="styles/popup.css">
    <link rel="icon" href="images\ico-removebg-preview.png" type="image/png">
    <title>Ma Collection - Bookollection</title>
</head>
<body>
    <header>
        <nav>
            <img alt="Logo de MyBookollection" src="images/ico-removebg-preview.png"> 
            <input class="nav_button" type="button" onclick="window.location.href = 'collection.php';" value="Ma collection">
            <input class="nav_button" type="button" onclick="window.location.href = 'actualites.html';" value="Actualités">
            <input class="nav_button" type="button" onclick="window.location.href = 'recherche.html';" value="Recherche">
        </nav>
        <h1>Bookollection</h1>


       <!-- Bouton popup -->
       <button id="bouton_compte"><img alt="compte" src="images/account_circle_clair-removebg-preview.png" id="img_compte"></button>

       <!-- popup -->
       <div id="myModal" class="modal">

           <!-- contenue popup -->
           <div class="modal-content">
                <span class="close">&times;</span>
                <img alt="compte" id="img_popup" src="images/account_circle_clair-removebg-preview.png">
                <p>Nom d'utilisateur: Roger bernard </p>
                <p>Mot de passe: *****************</p>
                <p>Email: roget_bernard@gmail.com</p>
                <p>Date de naissance: 19/06/1987</p>
           </div>

           <!-- categorie de bouton -->
           <div class="categories">
                <button class="category-button" data-category="profil">Profil</button>
                <button class="category-button" data-category="securite">Sécurité</button>
                <button class="category-button" data-category="soutenir">Soutenir</button>
                <button class="category-button" data-category="assistance">Assistance</button>
                <button class="category-button" data-category="a_propos">A Propos</button>
           </div>
       </div>
    </header>

    <div id="contenu">
        
        <div id="gauche">
            <form name="form" id="filtre" action="collection.php" method="post">
                <h2>Filtres</h2>
                <label for="" id="genre">
                    Genre :<br>
                    <div id="div_input_genre1">
                        <label class="label_genre"><input type="checkbox" class="input_genre1" name="genre[]" value="roman"> Roman</label><br>
                        <label class="label_genre"><input type="checkbox" class="input_genre1" name="genre[]"  value="manga"> Manga</label><br>
                        <label class="label_genre"><input type="checkbox" class="input_genre1" name="genre[]" value="bd"> Bande Dessinée</label><br>
                    </div>
                    <div id="div_input_genre2">
                        <label class="label_genre"><input type="checkbox" class="input_genre2" name="genre[]"  value="théâtre"> Théâtre</label><br>
                        <label class="label_genre"><input type="checkbox" class="input_genre2" name="genre[]" value="poésie"> Poésie</label><br>
                    </div>
                </label>
                <br>
                <br>
                <br>
                <br>
                <label for="" id="registre">
                    Registre :<br>
                    <div id="div_input_registre1"> 
                        <label class="label_registre"><input type="checkbox" class="input_registre1" name="registre[]" value="policier / thriller"> Policier</label><br>
                        <label class="label_registre"><input type="checkbox" class="input_registre1" name="registre[]" value="action / aventure"> Action</label><br>
                        <label class="label_registre"><input type="checkbox" class="input_registre1" name="registre[]" value="romance"> Romance</label><br>
                        <label class="label_registre"><input type="checkbox" class="input_registre1" name="registre[]" value="fantasy"> Fantastique</label><br>
                        <label class="label_registre"><input type="checkbox" class="input_registre1" name="registre[]" value="science-fiction"> Sci-Fi</label><br>
                        <label class="label_registre"><input type="checkbox" class="input_registre1" name="registre[]" value="lyrique"> Lyrique</label><br>
                        <label class="label_registre"><input type="checkbox" class="input_registre1" name="registre[]" value="satyrique"> Satyrique</label><br>
                    </div>
                    <div id="div_input_registre2"> 
                        <label class="label_registre"><input type="checkbox" class="input_registre2" name="registre[]" value="tragique"> Tragique</label><br>
                        <label class="label_registre"><input type="checkbox" class="input_registre2" name="registre[]" value="comique"> Comique</label><br>
                        <label class="label_registre"><input type="checkbox" class="input_registre2" name="registre[]"  value="dystopique"> Dystopique</label><br>
                        <label class="label_registre"><input type="checkbox" class="input_registre2" name="registre[]"  value="shonen"> Shonen</label><br>
                        <label class="label_registre"><input type="checkbox" class="input_registre2" name="registre[]" value="seinen"> Seinen</label><br>
                        <label class="label_registre"><input type="checkbox" class="input_registre2" name="registre[]" value="shojo"> Shojo</label><br>
                    </div>
                </label>
                <br>
                <br>
                <br>
                <label for="" id="lu">
                    <input type="checkbox" name="lu" id="checkbox_lu" value="lu">
                    Lu
                </label>
                <label for="" id="possession">
                    <input type="checkbox" name="possession" id="checkbox_possession" value="possession">
                    Possedé
                </label>
                <br>
                <input type="submit" id="submit_form">  <!-- GARDER LES CHAMPS REMPLIS APRES LE SUBMIT -->
            </form>
        </div>
        
        <div id="droite">
            <input type="text" id="input_recherche" name="titre" form="filtre" placeholder="Rechercher un livre, un auteur, ...">
            <div class="contenu_droite">
            <?php
                $link = dbConnect();

                recupererLivre($link);

                if ($link) {
                    mysqli_close($link);
                }
            ?>
            </div>
        </div>

    </div>
    <script src="JSscripts/popup.js"></script>
    <script src="JSscripts/theme.js"></script>
</body>
</html>