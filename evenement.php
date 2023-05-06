
<?php

require('demo.inc.php');
require('date.php');
require('account.inc.php');
$link = connexion();

if (!isset($_SESSION['id']));
    session_start();

$user = $_SESSION['id'];


if (isset($_POST['triEvent'])){
    $_SESSION['triEvent'] = $_POST['triEvent'];
}else if ($_SESSION['triEvent']==""){
    $_SESSION['triEvent'] = "DESC";
}

if (isset($_POST['fav'])){
    if ($_SESSION['fav']=="fav"){
        $_SESSION['fav'] = "all";
    }else if ($_SESSION['fav']=="all"){
        $_SESSION['fav'] = "fav";
    }
}else if ($_SESSION['fav']==""){
    $_SESSION['fav'] = "all";
}

// fonction affichage des événements
function afficheEvent($link,$user){
    echo "<div class='grid_event'>";
    if ($_SESSION['fav']=="fav"){
        $req_tri = "SELECT * FROM evenement WHERE idEvenement IN (SELECT idEvenement FROM ajoutevenement WHERE idUtilisateur={$user}) ORDER BY dateDebut {$_SESSION['triEvent']}";
    }else
        $req_tri = "SELECT * FROM evenement ORDER BY dateDebut {$_SESSION['triEvent']}";

    if ($result_tri=mysqli_query($link,$req_tri)){
        if (mysqli_num_rows($result_tri) > 0){
            while ($row_tri=mysqli_fetch_array($result_tri)){
                echo "<div class='box_event'>";
                echo '<img class="img_event" src="'.$row_tri['photo'].'">';
                echo "<div class='text_event'>"; 
                echo "<form action='evenement.php' method='post'>";
                echo "<button type='submit' class='addEvent' name='addEvent[]' value='".$row_tri['idEvenement']."'";
                $reqAdd = "SELECT * FROM ajoutevenement WHERE idUtilisateur={$user} AND idEvenement = {$row_tri['idEvenement']}";
                $resAdd = mysqli_query($link,$reqAdd);
                $rowsAdd = mysqli_num_rows($resAdd);
                if ($rowsAdd == 1 && (isset($_POST['addEvent'])==False || $_POST['addEvent'][0] != $row_tri['idEvenement']) || (isset($_POST['addEvent']) && $_POST['addEvent'][0]== $row_tri['idEvenement'] && $rowsAdd==0)){
                    echo 'style ="color:#e11e45";';
                }
                echo '>';
                echo "♡</button>";
                echo "</form>";
                echo "<h3>".$row_tri['nomEvenement']."</h3>";
                echo "<br>";
                echo "Date début : ".dateFormat($row_tri['dateDebut'])." - Date fin : ".dateFormat($row_tri['dateFin'])."</p>";
                echo "<br>";
                echo "<p>".$row_tri['description']."</p>";
                echo "<br>";
                echo "<a href='".$row_tri['lien']."' class='bouton' target='__BLANK'>Voir plus</a>";
                echo "</div>";
                echo "</div>";
            }
        }mysqli_free_result($result_tri);
    }
    if ($_SESSION['fav']=="fav"){
        if (mysqli_num_rows($result_tri) == 0){
            echo "<p style='text-align:center;'>Vous n'avez pas d'évènement favoris</p>";
        }
        
  echo "</div>";      

    }
}

// fonction ajout/suppression événement
function ajouteEvent($link,$user){
    if (isset($_POST['addEvent']) ){
        $addEvent = $_POST['addEvent'];
        $reqAdd = "SELECT * FROM ajoutevenement WHERE idUtilisateur={$user} AND idEvenement = {$addEvent[0]}";
        $resAdd = mysqli_query($link,$reqAdd);
        $rowsAdd = mysqli_num_rows($resAdd);
        if ($rowsAdd == 0){
            $reqAdd = "INSERT INTO ajoutevenement (idUtilisateur,idEvenement) VALUES ($user,$addEvent[0])";
            $resAdd = mysqli_query($link,$reqAdd);
        }else{
            $reqAdd = "DELETE FROM ajoutevenement WHERE idUtilisateur={$user} AND idEvenement = {$addEvent[0]}";
            $resAdd = mysqli_query($link,$reqAdd);
        }
    }
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/actualites.css">
    <link rel="stylesheet" href="styles/popup.css">
    <link rel="icon" href="images\ico-removebg-preview.png" type="image/png">
    <title>Evènement - Bookollection</title>
</head>
<body>
        
<header>
        <nav>
            <img alt="Logo de MyBookollection" src="images/ico-removebg-preview.png"> 
            <input class="nav_button" type="button" onclick="window.location.href = 'collection.php';" value="Ma collection">
            <input class="nav_button" type="button" onclick="window.location.href = 'actualites.php';" value="Actualités">
            <input class="nav_button" type="button" onclick="window.location.href = 'recherche.php';" value="Recherche">
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
                <button id="deconnecter" onclick="location.replace('connexion.php')">Se déconnecter</button>
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

    <div class="grid_tri">
        <div class="box_tri">
            <h2>Tri des Evènements </h2>
            <form action="evenement.php" method="post">
                <select name="triEvent" id="tri">
                    <optgroup label="Méthodes de Tri">
                    <option value="ASC" <?php if($_SESSION['triEvent']=="ASC"){ echo 'selected="selected"';}?>  > Date croissante</option>
                    <option value="DESC" <?php if($_SESSION['triEvent']=="DESC"){ echo 'selected="selected"';}?> >Date décroissante</option>
                    </optgroup>
                </select>
                <input class="boutonTri" type="submit" value="Valider">
            </form>
        </div>
        <div class="box_pref">
            <h2>Préférences</h2>
            <form action="evenement.php" method="post">
                <input type="radio" id="fav" name="fav" value="fav" <?php if($_SESSION['fav']=="fav"){ echo 'checked="checked"';}?> onchange="submit();">
                <label for="fav"><span></span>Favoris</label><br>
                <input type="radio" id="all" name="fav" value="all" <?php if($_SESSION['fav']=="all"){ echo 'checked="checked"';}?> onchange="submit();">
                <label for="all"><span></span>Tous</label><br>
            </form>
        </div>
    </div>
        <?php
            afficheEvent($link,$user);
            ajouteEvent($link,$user);
            if($link) mysqli_close($link);
        ?>

    <script src="JSscripts/popup.js"></script>
    <script src="JSscripts/theme.js"></script>
</body>
</html>



