<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/livrephp.css">
        <link rel="stylesheet" href="styles/popup.css">
        <link rel="icon" href="images\ico-removebg-preview.png" type="image/png">
        <title>Page d'un livre - Bookollection</title>
    </head>
    <body>


        <header>
            <nav>
                <img alt="Logo de MyBookollection" src="images/ico-removebg-preview.png"> 
                <input class="nav_button" type="button" onclick="window.location.href = 'collection.html';" value="Ma collection">
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

<?php
   /* if (isset($_POST['idLivre'])){
        $idLivre = $_POST['idLivre'];*/
        require('date.php');
        require('livreEstEcritPar.php');
        $link = mysqli_connect('localhost','root','','bookollection',3306);
        if (!$link) {
            echo "Erreur: Impossible de se connecter à la base de données";
            exit;
        }
        $idLivre = 1;
        $req_livre = "SELECT titre,description,couverture,dateParution,nomRegistre,nomGenre FROM livre INNER JOIN livreestregistre USING(idLivre) INNER JOIN registre ON registre.idRegistre = livreestregistre.idregistre INNER JOIN genre USING(idGenre) WHERE idLivre = $idLivre";
        if ($result_livre = mysqli_query($link,$req_livre)){
            $row = mysqli_fetch_row($result_livre);
            echo "<h1 id='titre'>".$row[0]."</h1>";
            echo "<div class='grid'>";
            echo "<div>";
            echo "<img id='imageLivre' src='images/livres/".$row[2]."'>";
            echo "</div>";
            echo "<div class='desc'>";
            echo "<h2 id='Tdescription'>Description :</h2>";
            echo "<p id='description'>".$row[1]."</p>";
            echo "</div>";
            echo "<div class='achat'>";
            echo "<h2 id='Tachat'>Acheter ce livre :</h2>";
            $req_site = "SELECT urlSite,logo FROM sitecommercial INNER JOIN enventesur USING(idSite) INNER JOIN livre USING(idLivre) WHERE idLivre = $idLivre";
            if ($result_site = mysqli_query($link,$req_site)){
                echo "<ul>";
                while ($row_site = mysqli_fetch_row($result_site)){
                    echo "<li class='puceSite'><a id='buyLink' href='".$row_site[0]."' target='__BLANK'><img id='logoSite' src='".$row_site[1]."'></a></li>";
                }
                echo "</ul>";
            }
            echo "</div>";
            echo "</div>";
            echo "<div class='rating'>";
            echo "<a href='#5' title='Donner 5 étoiles'>☆</a>";
            echo "<a href='#4' title='Donner 4 étoiles'>☆</a>";
            echo "<a href='#3' title='Donner 3 étoiles'>☆</a>";
            echo "<a href='#2' title='Donner 2 étoiles'>☆</a>";
            echo "<a href='#1' title='Donner 1 étoile'>☆</a>";
            echo "</div>";
            echo "<div class='info'>";
            echo "<h2 id='Tinfo'>Informations :</h2>";
            echo "<p id='info'>Date de parution : ".dateFormat($row[3])."</p>";
            echo "<p id='info'>Genre : ".$row[5]."</p>";
            echo "<p id='info'>Registre : ".$row[4]."</p>";
            echo "<p id='info'>Auteur(s) : ".livreEstEcritPar($idLivre)."";
            echo "</div>";
            
            mysqli_free_result($result_livre);
        }
        else {
            echo "Erreur: Impossible d'executer la requete $req_livre. " . mysqli_error($link);
            exit;
        }

   /* }*/
?>
        
        
       
            <div class="bookre">
                <label id="BookRead">
                    <input class="box" type="checkbox" >
                    Livre lu
                </label>
                <br>
                <label id="BookHave">
                    <input class="box" type="checkbox">
                    Livre possédé
                </label>
            </div>

                
               
            
        <script src="JSscripts/popup.js"></script>
        <script src="JSscripts/theme.js"></script>
    </body>
</html>
