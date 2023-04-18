<?php

// fonction

function recupererLivre ($link) {
    if (empty($_POST)) {
        $sql = "SELECT l.titre, a.nomAuteur, g.nomGenre, l.description, l.couverture FROM livre l
                INNER JOIN ajoutCollection ac ON l.isbn = ac.isbn
                INNER JOIN utilisateur u ON ac.idUtilisateur = u.idUtilisateur
                INNER JOIN ecritPar ep ON l.isbn = ep.isbn
                INNER JOIN auteur a ON ep.idAuteur = a.idAuteur
                INNER JOIN genre g ON l.idGenre = g.idGenre
                INNER JOIN estRegistre er ON l.isbn = er.isbn
                INNER JOIN registre r ON er.idRegistre = r.idRegistre";
        if ($result = mysqli_query($link, $sql) ){
            afficherLivre($result);
        }
    } else {

        if (isset($_POST["lu"])) {
            $lu = "TRUE";
        } else {
            $lu = "FALSE";
        }
        if (isset($_POST["possession"])) {
            $possession = "TRUE";
        } else {
            $possession = "FALSE";
        }
        if ( isset($_POST["genre"]) && isset($_POST["registre"]) && isset($_POST["titre"])) {
            $titre = $_POST["titre"];
            $genre = $_POST["genre"];
            $registre = $_POST["registre"];
            $sql = "SELECT l.titre, a.nomAuteur, g.nomGenre, l.description, l.couverture FROM livre l
                    INNER JOIN ajoutCollection ac ON l.isbn = ac.isbn
                    INNER JOIN utilisateur u ON ac.idUtilisateur = u.idUtilisateur
                    INNER JOIN ecritPar ep ON l.isbn = ep.isbn
                    INNER JOIN auteur a ON ep.idAuteur = a.idAuteur
                    INNER JOIN genre g ON l.idGenre = g.idGenre
                    INNER JOIN estRegistre er ON l.isbn = er.isbn
                    INNER JOIN registre r ON er.idRegistre = r.idRegistre
                    WHERE l.titre LIKE '%$titre%'"; // RAJOUTER CONDITION AND u.idUtilisateur = '$idUtilisateur'
            if ($genre) {
                $sqlGenre = " AND (";
                foreach ($genre as $nomGenre) {
                    $sqlGenre .= "g.nomGenre = '$nomGenre' OR ";
                }
                $sqlGenre = substr($sqlGenre,0,-4);
                $sqlGenre .= ")";
                $sql .= $sqlGenre;
            }
            if ($registre) {
                $sqlRegistre = " AND (";
                foreach ($registre as $nomRegistre) {
                    $sqlRegistre .= "r.nomRegistre = '$nomRegistre' OR ";
                }
                $sqlRegistre = substr($sqlRegistre,0,-4);
                $sqlRegistre .= ")";
                $sql .= $sqlRegistre;
            }
            if ($lu) {
                $sql .= " AND ac.lu = TRUE";
            }
            if ($possession) {
                $sql .= " AND ac.possede = TRUE";
            }

            if ($result = mysqli_query($link, $sql) ){
                afficherLivre($result);
            }
        }
    }
}

function afficherLivre ($result) {
    $result->data_seek(0);
    while ( $row = $result->fetch_assoc() ) {
        echo "<a class='livres' href='livre.html'>";
        echo "<img src='images/".$row['couverture']."' width='60px' alt='couverture du livre'>";
        echo "<div>";
        echo "<h3>".$row['titre']."</h3>";
        echo "<p>".$row['description']."</p>";
        echo "</div>";
        echo "</a>";
    }
    //echo "</free_result($result)"; PK CA FONCTIONNE PAS     mysql_free_result()
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
                    <label class="label_genre"><input type="checkbox" class="input_genre" name="genre[]" value="roman"> Roman</label><br>
                    <label class="label_genre"><input type="checkbox" class="input_genre" name="genre[]" value="bd"> Bande Dessinée</label><br>
                    <label class="label_genre"><input type="checkbox" class="input_genre" name="genre[]" value="poésie"> Poésie</label><br>
                    <label class="label_genre"><input type="checkbox" class="input_genre" name="genre[]"  value="autobiographie"> Autobiographie</label>
                </label>
                <br>
                <br>
                <label for="" id="registre">
                    Registre :<br>
                    <label class="label_registre"><input type="checkbox" class="input_registre" name="registre[]" value="fantastique"> Fantastique</label><br>
                    <label class="label_registre"><input type="checkbox" class="input_registre" name="registre[]" value="policier"> Policier</label><br>
                    <label class="label_registre"><input type="checkbox" class="input_registre" name="registre[]" value="comique"> Comique</label><br>
                    <label class="label_registre"><input type="checkbox" class="input_registre" name="registre[]"  value="epique"> Epique</label><br>
                    <label class="label_registre"><input type="checkbox" class="input_registre" name="registre[]"  value="tragique"> Tragique</label><br>
                </label>
                <label for="" id="lu">
                    <input type="checkbox" name="lu" id="checkbox_lu" value="lu">
                    Lu
                </label>
                <br>
                <br>
                <label for="" id="possession">
                    <input type="checkbox" name="possession" id="checkbox_possession" value="possession">
                    Possession
                </label>
                <br>
                <input type="submit" id="submit_form">
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
