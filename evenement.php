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
            <input class="nav_button" type="button" onclick="window.location.href = 'collection.html';" value="Ma collection">
            <input class="nav_button" type="button" onclick="window.location.href = 'actualites.php';" value="Actualités">
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

        <script src="JSscripts/popup.js"></script>
    <script src="JSscripts/theme.js"></script>
</body>
</html>

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


echo '
<div class="grid_tri">
    <div class="box_tri">
        <h2>Tri des Evènements </h2>
        <form action="evenement.php" method="post">
            <select name="triEvent" id="tri">
                <optgroup label="Méthodes de Tri">
                <option value="ASC"'; if($_SESSION['triEvent']=="ASC"){ echo 'selected="selected"';}  echo '> Date croissante</option>
                <option value="DESC"'; if($_SESSION['triEvent']=="DESC"){ echo 'selected="selected"';} echo '>Date décroissante</option>
                </optgroup>
            </select>
            <input class="boutonTri" type="submit" value="Valider">
        </form>
    </div>
';

echo '
    <div class="box_pref">
        <h2>Préférences</h2>
        <form action="evenement.php" method="post">';
            echo '<input type="radio" id="fav" name="fav" value="fav"'; if($_SESSION['fav']=="fav"){ echo 'checked="checked"';}
            echo ' onchange="submit();">
            <label for="fav">Favoris</label><br>
            <input type="radio" id="fav" name="fav" value="all"'; if($_SESSION['fav']=="all"){ echo 'checked="checked"';}
            echo ' onchange="submit();">
            <label for="fav">Tous</label><br>
        </form>
    </div>
</div>';


echo "<br>";

    function afficheEvent($link,$user){
        echo "<div class='grid_event'>";
        if ($_SESSION['fav']=="fav"){
            $req_triC = "SELECT * FROM evenement WHERE idEvenement IN (SELECT idEvenement FROM ajoutevenement WHERE idUtilisateur={$user}) ORDER BY dateDebut {$_SESSION['triEvent']}";
        }else
            $req_triC = "SELECT * FROM evenement ORDER BY dateDebut {$_SESSION['triEvent']}";

        if ($result_triC=mysqli_query($link,$req_triC)){
            if (mysqli_num_rows($result_triC) > 0){
                while ($row_triC=mysqli_fetch_array($result_triC)){
                    echo "<div class='box_event'>";
                    echo '<img class="img_event" src="'.$row_triC['photo'].'">';
                    echo "<div class='text_event'>"; 
                    echo "<form action='evenement.php' method='post'>";
                    echo "<button type='submit' class='addEvent' name='addEvent[]' value='".$row_triC['idEvenement']."'";
                    $reqAdd = "SELECT * FROM ajoutevenement WHERE idUtilisateur={$user} AND idEvenement = {$row_triC['idEvenement']}";
                    $resAdd = mysqli_query($link,$reqAdd);
                    $rowsAdd = mysqli_num_rows($resAdd);
                    if ($rowsAdd == 1 && (isset($_POST['addEvent'])==False || $_POST['addEvent'][0] != $row_triC['idEvenement']) || (isset($_POST['addEvent']) && $_POST['addEvent'][0]== $row_triC['idEvenement'] && $rowsAdd==0)){
                        echo 'style ="color:#e11e45";';
                    }
                    echo '>';
                    echo "♡</button>";
                    echo "</form>";
                    echo "<h3>".$row_triC['nomEvenement']."</h3>";
                    echo "<br>";
                    echo "Date début : ".dateFormat($row_triC['dateDebut'])." - Date fin : ".dateFormat($row_triC['dateFin'])."</p>";
                    echo "<br>";
                    echo "<p>".$row_triC['description']."</p>";
                    echo "<br>";
                    echo "<a href='".$row_triC['lien']."' class='bouton' target='__BLANK'>Voir plus</a>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }
      echo "</div>";      
    

    }
    afficheEvent($link,$user);



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
// filtre par favoris

    if (isset($_POST['fav'])){
        $fav = $_POST['fav'];
        $reqFav = "SELECT idEvenement FROM ajoutevenement WHERE idUtilisateur={$user}";
        $resFav = mysqli_query($link,$reqFav);
        $rowsFav = mysqli_num_rows($resFav);
        

       
    }
    



if($link) mysqli_close($link);

?>

