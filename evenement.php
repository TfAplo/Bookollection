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
   <div class="box_tri">
        <h2>Tri des Evènements </h2>
        <div><form action="evenement.php" method="post">
            <select name="tri" id="tri">
                <optgroup label="Méthodes de Tri">
                <option value="dateC" <?php if(isset($_POST['tri']) && $_POST['tri'] == "dateC") echo 'selected="selected"';?>> Date croissante</option>
                <option value="dateD" <?php if(isset($_POST['tri']) && $_POST['tri'] == "dateD") echo 'selected="selected"';?>>Date décroissante</option>
                </optgroup>
            </select>
            <input class="boutonTri" type="submit" value="Valider">
        </form>
    </div>


        <script src="JSscripts/popup.js"></script>
    <script src="JSscripts/theme.js"></script>
</body>
</html>

<?php

require('demo.inc.php');
require('date.php');
require('account.inc.php');
$link = connexion();
if (!isset($_SESSION['id'])){
    session_start();
}
$user = $_SESSION['id'];


echo "<br>";
$tab_tri=array();
if (isset($_POST['tri'])){
    $tri = $_POST['tri'];
    if ($tri == "dateC"){
        echo "<div class='grid_event'>";
        $req_triC = "SELECT * FROM evenement ORDER BY dateDebut ASC";
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
                if ($rowsAdd == 1 || isset($_POST['addEvent'])){
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
    else{
        echo "<div class='grid_event'>";
        $req_triD = "SELECT * FROM evenement ORDER BY dateDebut DESC";
        if ($result_triD=mysqli_query($link,$req_triD)){
            if (mysqli_num_rows($result_triD) > 0){
            while ($row_triD=mysqli_fetch_array($result_triD)){
                echo "<div class='box_event'>";
                echo '<img class="img_event" src="'.$row_triD['photo'].'">';
                echo "<div class='text_event'>"; 
                echo "<form action='evenement.php' method='post'>";
                echo "<button type='submit' class='addEvent' name='addEvent[]' value='".$row_triD['idEvenement']."'";
                $reqAdd = "SELECT * FROM ajoutevenement WHERE idUtilisateur={$user} AND idEvenement = {$row_triD['idEvenement']}";
                $resAdd = mysqli_query($link,$reqAdd);
                $rowsAdd = mysqli_num_rows($resAdd);
                if ($rowsAdd == 1 || isset($_POST['addEvent'])){
                    echo 'style ="color:#e11e45";';
                }
                echo '>';
                echo "♡</button>";
                echo "</form>";
                echo "<h3>".$row_triD['nomEvenement']."</h3>";
                echo "<br>";
                echo "Date début : ".dateFormat($row_triD['dateDebut'])." - Date fin : ".dateFormat($row_triD['dateFin'])."</p>";
                echo "<br>";
                echo "<p>".$row_triD['description']."</p>";
                echo "<br>";
                echo "<a href='".$row_triD['lien']."' class='bouton' target='__BLANK'>Voir plus</a>";
                echo "</div>";
                echo "</div>";
            }
            }
        }
        echo "</div>";

    }
}else{

    echo "<div class='grid_event'>";
    $req_triD = "SELECT * FROM evenement ORDER BY dateDebut DESC";
    if ($result_triD=mysqli_query($link,$req_triD)){
        if (mysqli_num_rows($result_triD) > 0){
        while ($row_triD=mysqli_fetch_array($result_triD)){
            echo "<div class='box_event'>";
            echo '<img class="img_event" src="'.$row_triD['photo'].'">';
            echo "<div class='text_event'>"; 
            echo "<form action='evenement.php' method='post'>";
            echo "<button type='submit' class='addEvent' name='addEvent[]' value='".$row_triD['idEvenement']."'";
            $reqAdd = "SELECT * FROM ajoutevenement WHERE idUtilisateur={$user} AND idEvenement = {$row_triD['idEvenement']}";
            $resAdd = mysqli_query($link,$reqAdd);
            $rowsAdd = mysqli_num_rows($resAdd);
            if (($rowsAdd == 1 && (isset($_POST['addEvent'])==False || $_POST['addEvent'][0] != $row_triD['idEvenement'])) || (isset($_POST['addEvent']) && $_POST['addEvent'][0]== $row_triD['idEvenement'] && $rowsAdd==0)){
                echo 'style ="color:#e11e45";';
            }
            echo '>';
            echo "♡</button>";
            echo "</form>";
            echo "<h3>".$row_triD['nomEvenement']."</h3>";
            echo "<br>";
            echo "Date début : ".dateFormat($row_triD['dateDebut'])." - Date fin : ".dateFormat($row_triD['dateFin'])."</p>";
            echo "<br>";
            echo "<p>".$row_triD['description']."</p>";
            echo "<br>";
            echo "<a href='".$row_triD['lien']."' class='bouton' target='__BLANK'>Voir plus</a>";
            echo "</div>";
            echo "</div>";
            }
        }
    }
    echo "</div>";

}



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
    



if($link) mysqli_close($link);

?>

