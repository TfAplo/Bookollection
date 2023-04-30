<?php
require_once 'account.inc.php';

function rechercherLivres($barreRech = "", $genre = "", $registre = ""){
    $link = connexion();
    $result = mysqli_query($link, "SELECT DISTINCT l.titre, l.couverture, l.description FROM livre l
                                    INNER JOIN ecritpar ec ON l.idlivre = ec.idlivre
                                    INNER JOIN auteur a ON ec.idauteur = a.idauteur
                                    INNER JOIN livreestregistre li ON l.idlivre = li.idlivre
                                    INNER JOIN registre r ON li.idregistre = r.idregistre
                                    INNER JOIN genreestregistre gr ON r.idregistre = gr.idregistre
                                    INNER JOIN genre g ON gr.idgenre = g.idgenre
                                    WHERE (l.titre LIKE '$barreRech%' OR a.nomAuteur LIKE '$barreRech%' OR a.prenomAuteur LIKE '$barreRech%')
                                        AND r.nomRegistre LIKE '$registre%' AND g.nomGenre LIKE '$genre%'");
    if (mysqli_num_rows($result) == 0) {
        echo 'Aucun livre trouvé';
    }else{
        $result->data_seek(0);
        while ( $row = $result->fetch_assoc() ) {
        echo " <a class='livres' href='livre.php'>";
           echo " <img src='images/livres/".$row['couverture']."' width='100px' alt='couverture du livre'>";
           echo " <div>";
           echo "     <h3>".$row['titre']."</h3>";
           echo "     <p>". $row['description']."</p>";
           echo " </div>";
       echo " </a>";
    }
    }
    mysqli_free_result($result);
    if ($link) {
        mysqli_close($link);
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/recherche.css">
    <link rel="stylesheet" href="styles/popup.css">
    <link rel="icon" href="images\ico-removebg-preview.png" type="image/png">
    <title>Recherche - Bookollection</title>
</head>
<body>
    <header>
        <nav>
            <img alt="Logo de MyBookollection" src="images/ico-removebg-preview.png"> 
            <input class="nav_button" type="button" onclick="window.location.href = 'collection.html';" value="Ma collection">
            <input class="nav_button" type="button" onclick="window.location.href = 'actualites.html';" value="Actualités">
            <input class="nav_button focus" type="button" onclick="window.location.href = 'recherche.html';" value="Recherche">
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
                <p>Nom d'utilisateur: Sebastien Bernard </p>
                <p>Mot de passe: *****************</p>
                <p>Email: sebastien.bernard@gmail.com</p>
                <p>Date de naissance: 19/06/1975</p>
                <button id="deconnecter" onclick="location.replace('connexion.html')">Se déconnecter</button>
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
    <form action="recherche.php" method="post">
        <input type="text" id="recherche" name="recherche" placeholder="Recherchez un livre..."> <input type="submit" value="">
        <select name="genre" id="genre">
            <option value="" selected>Genre</option>
            <option value="roman">Roman</option>
            <option value="bd">Bande Dessinée</option>
            <option value="poésie">Poésie</option>
            <option value="autobiographie">Autobiographie</option>
        </select>
        <select name="registre" id="registre">
            <option value="" selected>Registre</option>
            <option value="fantastique">Fantastique</option>
            <option value="policier">Policier</option>
            <option value="comique">Comique</option>
            <option value="pique">Epique</option>
            <option value="tragique">Tragique</option>
        </select>
    </form>

    <div class="contenu">
        <?php 
        if (empty($_POST)) {
            rechercherLivres();
        }
        rechercherLivres($_POST['recherche'], $_POST['genre'], $_POST['registre']);
        ?>
    </div>

    <script src="JSscripts/theme.js"></script>
    <script src="JSscripts/popup.js"></script>
</body>
</html>