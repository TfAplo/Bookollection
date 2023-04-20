<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/actualites.css">
    <link rel="stylesheet" href="styles/popup.css">
    <link rel="icon" href="images\ico-removebg-preview.png" type="image/png">
    <title>Actualités - Bookollection</title>
</head>
<body>
<header>
<nav>
            <img alt="Logo de MyBookollection" src="images/ico-removebg-preview.png"> 
            <input class="nav_button" type="button" onclick="window.location.href = 'collection.html';" value="Ma collection">
            <input class="nav_button focus" type="button" onclick="window.location.href = 'actualites.html';" value="Actualités">
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
    
    <h2 id="haut">Top des livres *</h2>
        <p id="gauche">*Calculé en fonction des notes recensées</p>
    <div class="top">
        
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Angelique</h3>
            <p>par Guillaume Mussot - paru en Septembre 2022</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton boutonL">Voir plus</a>
        </div>
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Vivre vite</h3>
            <p>par Brigitte Giraud - paru en août 2022</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton boutonL">Voir plus</a>
        </div>
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Le Monde Sans Fin</h3>
            <p>par Jancovici et Blain - paru en Octobre 2021</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton boutonL">Voir plus</a>
        </div>
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Antigone</h3>
            <p>par Jean Anouilh - paru en Juin 2016</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton boutonL">Voir plus</a>
        </div>
        <div class="liv">
            <img class="book" src="images/book-cover-picture.png" alt="couverture du livre">
            <h3>Solo Leveling</h3>
            <p>par H-goon Chugong - paru en mars 2023</p>
            <p>Avec une note global de : -- / --</p>
            <a href="#" class="bouton boutonL">Voir plus</a>
        </div>
    </div>

    <h2>Les nouvelles sorties</h2>
    <?php
    require("livreEstEcritPar.php");
    require("date.php");
    $link = mysqli_connect('localhost','root','','bookollection',3306);
    if (!$link) {
        echo "Erreur: Impossible de se connecter à la base de données";
        exit;
    }

    
    echo "<div class='top'>";
    
    $req_new = "SELECT DISTINCT(ecritpar.idLivre),ecritpar.idAuteur FROM livre INNER JOIN ecritpar USING(idLivre) INNER JOIN auteur USING(idAuteur) GROUP BY idLivre ORDER BY dateParution DESC LIMIT 5";
    if($res_new = mysqli_query($link, $req_new)){
        if(mysqli_num_rows($res_new) > 0){
            while($row = mysqli_fetch_array($res_new)){
                $idL = $row['idLivre'];
                $idA = $row['idAuteur'];
                $req = "SELECT couverture,titre,prenomAuteur,nomAuteur,dateParution,idLivre FROM livre INNER JOIN ecritpar USING(idLivre) INNER JOIN auteur USING(idAuteur) WHERE idLivre = $idL AND idAuteur = $idA";
                if($res = mysqli_query($link, $req)){
                    if(mysqli_num_rows($res) > 0){
                        while($row = mysqli_fetch_array($res)){
                            echo "<div class='liv'>";
                            echo '<img class="book" src="images/livres/'.$row["couverture"].'" alt="couverture du livre">';
                            echo "<h3>".$row['titre']."</h3>";
                            echo "<p>par ".livreEstEcritPar($row['idLivre'])." - paru le ".dateFormat($row['dateParution'])."</p>";
                            echo "<p>Avec une note global de : -- / --</p>";
                            echo "<a href='#' class='bouton boutonL'>Voir plus</a>";
                            echo "</div>";
                        }
                    }
                }
            }
        }
    }echo "</div>";
    


    ?>




    <div class="box_fest">
        <div class="text_fest">
            <h4>Différents évenement pour les passionner de lecture !</h4>
            <br>
            <p>Partagez vos lectures du moment, avec les différents évenement autour des livres !
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>
            <a href="evenement.php" class="bouton bouton_fest">Voir plus</a>
        </div>
        <img class="affiche_fest" src="images/affiche_fest_2.png" alt="actu">
    </div>


    <footer>
        <form action="actualistes.php" method="post">
        <div class="topo_newsletter">
            <h3 class="text-news">S'inscrire à la newsletter</h3>
            <div class="newsletter">
                <input type="email" id="email" name="email" placeholder="Votre email">
                <input class="bouton_nl" type="submit" value="S'inscrire">
            </div>
        </div>
        <p>Bookollection - 2023</p>
    </footer>
    <script src="JSscripts/theme.js"></script>
    <script src="JSscripts/popup.js"></script>
</body>
</html>