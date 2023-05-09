<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/actualites.css">
    <link rel="icon" href="images\ico-removebg-preview.png" type="image/png">
    <title>Actualités - Bookollection</title>
</head>
<body>
<header>
<nav>
            <img alt="Logo de MyBookollection" src="images/ico-removebg-preview.png"> 
            <input class="nav_button" type="button" onclick="window.location.href = 'collection.php';" value="Ma collection">
            <input class="nav_button focus" type="button" onclick="window.location.href = 'actualites.php';" value="Actualités">
            <input class="nav_button" type="button" onclick="window.location.href = 'recherche.php';" value="Recherche">
        </nav>
        <h1>Bookollection</h1>
        
        <a id="bouton_compte" href="moncompte.php"><img alt="compte" src="images/account_circle_clair-removebg-preview.png" id="img_compte"></a>
    </header>

    
    <?php
    require("PHPscripts/livreEstEcritPar.php");
    require("PHPscripts/date.php");
    require("PHPscripts/moyNotes.php");
    require("PHPscripts/connexionDB.php");

    $link = connexion();
    if (!isset($_SESSION['id'])){
        session_start();
    }
    $user = $_SESSION['id'];
    if (isset($_GET['idLivre'])){
        $idLivre = $_GET['idLivre'];
    }

    //top 5 des livres
    echo " <h2 id='haut'>Top des livres *</h2>
    <p id='gauche'>*Calculé en fonction des notes recensées</p>";
    echo "<div class='top'>";
    $req_top = "SELECT idLivre,AVG(note) AS moyenne FROM ajoutcollection  GROUP BY idLivre ORDER BY moyenne DESC LIMIT 5";
    if($res_top = mysqli_query($link, $req_top)){
        if(mysqli_num_rows($res_top) > 0){
            while($row = mysqli_fetch_array($res_top)){
                $idL = $row['idLivre'];
                $req = "SELECT couverture,titre,prenomAuteur,nomAuteur,dateParution,idLivre FROM livre INNER JOIN ecritpar USING(idLivre) INNER JOIN auteur USING(idAuteur) WHERE idLivre = {$idL} group by idLivre";
                if($res = mysqli_query($link, $req)){
                    if(mysqli_num_rows($res) > 0){
                        while($rowL = mysqli_fetch_array($res)){
                            echo "<div class='liv'>";
                            echo "<img class='book' src='images/livres/".$rowL['couverture']."' alt='couverture du livre'>";
                            echo "<h3>".$rowL['titre']."</h3>";
                            echo "<p>par ".livreEstEcritPar($rowL['idLivre'])." - paru le ".dateFormat($rowL['dateParution'])."</p>";
                            echo "<p>Avec une note global de : ".moyNotes($rowL['idLivre'])."/5</p>";
                            echo "<a href='livre.php?idLivre=".$rowL['idLivre']."' class='bouton boutonL'>Voir plus</a>";
                            echo "</div>";
                        }
                    }
                }
            }
        }
    }
    echo "</div>";


//nouvelles sorties
    echo "<h2>Les nouvelles sorties</h2>";
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
                            echo "<p>Avec une note global de : ".moyNotes($row['idLivre'])."/5</p>";
                            echo "<a href='livre.php?idLivre=".$row['idLivre']."' class='bouton boutonL'>Voir plus</a>";
                            echo "</div>";
                        }
                    }
                }
            }
        }
    }echo "</div>";

// ajout newsletter

    if(isset($_POST['newsletter'])){
        $reqNews = "SELECT newsletter FROM utilisateur WHERE idUtilisateur = $user AND newsletter = 1";
        $resNews = mysqli_query($link, $reqNews);
        $rowNews = mysqli_fetch_array($resNews);
        if($rowNews['newsletter'] == 1){
            echo "<script>alert('Vous êtes déjà inscrit à la newsletter !')</script>";
        }else{
            $addNews = "UPDATE utilisateur SET newsletter = 1 WHERE idUtilisateur = $user";
            if(mysqli_query($link, $addNews)){
                echo "<script>alert('Vous êtes bien inscrit à la newsletter !')</script>";
            }else{
                echo "<script>alert('Erreur lors de l\'inscription à la newsletter !')</script>";
            }
        }

    }


    if($link) mysqli_close($link);

    ?>




    <div class='box_fest'>
        <div class='text_fest'>
            <h4>Différents évenement pour les passionner de lecture !</h4>
            <br>
            <p>Partagez vos lectures du moment, avec les différents évenement autour des livres !
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>
            <a href='evenement.php' class='bouton bouton_fest'>Voir plus</a>
        </div>
        <img class='affiche_fest' src='images/affiche_fest_2.png' alt='actu'>
    </div>

    <footer>
        <form action="actualites.php" method="post">
        <div class="topo_newsletter">
            <h3 class="text-news">S'inscrire à la newsletter</h3>
            <div class="newsletter">
                <input class="bouton_nl" name="newsletter" type="submit" value="S'inscrire">
            </div>
        </div>
        <p>Bookollection - 2023</p>
    </footer>

    <script src="JSscripts/theme.js"></script>
</body>
</html>