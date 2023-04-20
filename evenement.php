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
   <div class="box_tri">
        <h2>Tri des Evènements </h2>
        <div><form action="evenement.php" method="post">
            <select name="tri" id="tri">
                <optgroup label="Méthodes de Tri">
                <option value="dateC">Date croissante</option>
                <option value="dateD">Date décroissante</option>
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
debutHtml('Evènement');



$link = mysqli_connect('localhost','root','','bookollection',3306);

if (!$link) {
    echo "Erreur: Impossible de se connecter à la base de données";
    exit;
}

echo "<br>";
$tab_tri=array();
if (isset($_POST['tri'])){
    $tri = $_POST['tri'];
    if ($tri == "dateC"){
        $req_triC = "SELECT idEvenement FROM evenement ORDER BY dateDebut ASC";
        if ($result_triC=mysqli_query($link,$req_triC)){
            while ($row_triC=mysqli_fetch_row($result_triC)){
                $tab_tri[] = $row_triC[0];
            }echo "<p>tri croissant</p>";
            }mysqli_free_result($result_triC);
            
    }else{
        $req_triD = "SELECT idEvenement FROM evenement ORDER BY dateDebut DESC";
        if ($result_triD=mysqli_query($link,$req_triD)){
            while ($row_triD=mysqli_fetch_row($result_triD)){
                $tab_tri[] = $row_triD[0];
            }
            }mysqli_free_result($result_triD);
    }
}else{
    $req_triDefault = "SELECT idEvenement FROM evenement ORDER BY dateDebut DESC";
        if ($result_triDefault=mysqli_query($link,$req_triDefault)){
            while ($row_triDefault=mysqli_fetch_row($result_triDefault)){
                $tab_tri[] = $row_triDefault[0];
            }
            }mysqli_free_result($result_triDefault);
}

//nb evenement
$sql="SELECT COUNT(idEvenement) FROM evenement";
$result_sql=mysqli_query($link,$sql);
$nb_event=mysqli_fetch_array($result_sql); 

// image evenement
$tabImage = array();
$req_pictevent="SELECT photo FROM evenement";
if($result_pictevent=mysqli_query($link,$req_pictevent)){
while($row_pictevent=mysqli_fetch_row($result_pictevent)){
    $tabImage[] = $row_pictevent[0];
}
}mysqli_free_result($result_pictevent);


// titre evenement
$tabTitre = array();
$req_title = "SELECT nomEvenement FROM evenement";
if ($result_title=mysqli_query($link,$req_title)){
while ($row_title=mysqli_fetch_row($result_title)){
    $tabTitre[] = $row_title[0];
}
}mysqli_free_result($result_title);

// description evenement
$tabDesc = array();
$req_desc = "SELECT description FROM evenement";
if ($result_desc=mysqli_query($link,$req_desc)){
while ($row_desc=mysqli_fetch_row($result_desc)){
    $tabDesc[] = $row_desc[0];
}
}mysqli_free_result($result_desc);

// date debut evenement
$tabDateD = array();
$req_dateD = "SELECT dateDebut FROM evenement";
if ($result_dateD=mysqli_query($link,$req_dateD)){
while ($row_dateD=mysqli_fetch_row($result_dateD)){
    $tabDateD[] = $row_dateD[0];
}
}mysqli_free_result($result_dateD);
// date fin evenement
$tabDateF = array();
$req_dateF = "SELECT dateFin FROM evenement";
if ($result_dateF=mysqli_query($link,$req_dateF)){
while ($row_dateF=mysqli_fetch_row($result_dateF)){
    $tabDateF[] = $row_dateF[0];
}
}mysqli_free_result($result_dateF);

//lien evenement
$tabLien = array();
$req_lien = "SELECT lien FROM evenement";
if ($result_lien=mysqli_query($link,$req_lien)){
while ($row_lien=mysqli_fetch_row($result_lien)){
    $tabLien[] = $row_lien[0];
}
}mysqli_free_result($result_lien);




$compteur=0;

echo "<div class='grid_event'>";

while ($compteur<$nb_event[0]){
    echo "<div class='box_event'>";
    echo '<img class="img_event" src="'.$tabImage[$tab_tri[$compteur]-1].'">';        
    echo "<div class='text_event'>";
    echo "<h3>".$tabTitre[$tab_tri[$compteur]-1]."</h3>";
    echo "<br>";
    echo "<p>Date début : ".dateFormat($tabDateD[$tab_tri[$compteur]-1])." - Date fin : ".dateFormat($tabDateF[$tab_tri[$compteur]-1])."</p>";
    echo "<br>";
    echo "<p>".$tabDesc[$tab_tri[$compteur]-1]."</p>";
    echo "<br>";
    echo '<a href="'.$tabLien[$tab_tri[$compteur]-1].'" class="bouton" target="__BLANK">Voir plus</a>';
    echo "</div>";
    echo "</div>";

    $compteur++;

}

echo "</div>";

if($link) mysqli_close($link);
finHtml();

?>

