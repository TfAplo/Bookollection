
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/livrephp.css">
        <link rel="icon" href="images\ico-removebg-preview.png" type="image/png">
        <title>Page d'un livre - Bookollection</title>
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
            
            <a id="bouton_compte" href="moncompte.php"><img alt="compte" src="images/account_circle_clair-removebg-preview.png" id="img_compte"></a>
        </header>

<?php
    require('PHPscripts/date.php');
    require('PHPscripts/moyNotes.php');
    require('PHPscripts/livreEstEcritPar.php');
    require('PHPscripts/livreEstRegistre.php');
    require('PHPscripts/noteLivre.php');
    require('PHPscripts/formatComment.php');
    require('PHPscripts/connexionDB.php');
    
    $link = connexion();
    if (!isset($_SESSION['id'])){
        session_start();
    }
    $user = $_SESSION['id'];

    if (isset($_GET['idLivre'])){
        $idLivre = $_GET['idLivre'];
    }

  
    

    // affichage global du livre et des informations

    $req_livre = "SELECT titre,description,couverture,dateParution,nomRegistre,nomGenre FROM livre INNER JOIN livreestregistre USING(idLivre) INNER JOIN registre ON registre.idRegistre = livreestregistre.idregistre INNER JOIN genre USING(idGenre) WHERE idLivre = {$idLivre}";
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
        $req_site = "SELECT urlSite,logo FROM sitecommercial INNER JOIN enventesur USING(idSite) INNER JOIN livre USING(idLivre) WHERE idLivre = {$idLivre}";
        if ($result_site = mysqli_query($link,$req_site)){
            while ($row_site = mysqli_fetch_row($result_site)){
                echo "<p><a id='buyLink' href='".$row_site[0]."' target='__BLANK'><img id='logoSite' src='".$row_site[1]."'></a></p>";
            }

        }
        
        echo "</div>";
        echo "</div>";

        // formulaire des notes

        echo "<div class='rating'>";
        echo "<form action='livre.php?idLivre=".$idLivre."' method='post'>";
        echo "<button type='submit' name='note[]' value='5' class='ratingStar'"; 
        $reqNote5 = "SELECT * FROM ajoutcollection WHERE idUtilisateur={$user} AND idLivre = {$idLivre} AND note >= 5";
        $resNote5 = mysqli_query($link,$reqNote5);
        $rowsNote5 = mysqli_num_rows($resNote5);
        if ($rowsNote5 == 1){
            echo 'style ="color:orange";';
        }else if (isset($_POST['note'])){$note = $_POST['note'];   if($note[0]>=5){echo 'style ="color:orange";';}}
        echo ">☆</button>";
        echo "<button type='submit' name='note[]' value='4' class='ratingStar'";
        $reqNote4 = "SELECT * FROM ajoutcollection WHERE idUtilisateur={$user} AND idLivre = {$idLivre} AND note >= 4";
        $resNote4 = mysqli_query($link,$reqNote4);
        $rowsNote4 = mysqli_num_rows($resNote4);
        if ($rowsNote4 == 1){
            echo 'style ="color:orange";';
        }else if (isset($_POST['note'])){$note = $_POST['note'];   if($note[0]>=4){echo 'style ="color:orange";';}}
        echo ">☆</button>";
        echo "<button type='submit' name='note[]' value='3' class='ratingStar'";
        $reqNote3 = "SELECT * FROM ajoutcollection WHERE idUtilisateur={$user} AND idLivre = {$idLivre} AND note >= 3";
        $resNote3 = mysqli_query($link,$reqNote3);
        $rowsNote3 = mysqli_num_rows($resNote3);
        if ($rowsNote3 == 1){
            echo 'style ="color:orange";';
        }else if (isset($_POST['note'])){$note = $_POST['note'];   if($note[0]>=3){echo 'style ="color:orange";';}}
        echo ">☆</button>";
        echo "<button type='submit' name='note[]' value='2' class='ratingStar'";
        $reqNote2 = "SELECT * FROM ajoutcollection WHERE idUtilisateur={$user} AND idLivre = {$idLivre} AND note >= 2";
        $resNote2 = mysqli_query($link,$reqNote2);
        $rowsNote2 = mysqli_num_rows($resNote2);
        if ($rowsNote2 == 1){
            echo 'style ="color:orange";';
        }else if (isset($_POST['note'])){$note = $_POST['note'];   if($note[0]>=2){echo 'style ="color:orange";';}}
        echo ">☆</button>";
        echo "<button type='submit' name='note[]' value='1' class='ratingStar'";
        $reqNote1 = "SELECT * FROM ajoutcollection WHERE idUtilisateur={$user} AND idLivre = {$idLivre} AND note >= 1";
        $resNote1 = mysqli_query($link,$reqNote1);
        $rowsNote1 = mysqli_num_rows($resNote1);
        if ($rowsNote1 == 1){
            echo 'style ="color:orange";';
        }
        else if (isset($_POST['note'])){$note = $_POST['note'];   if($note[0]>=1){echo 'style ="color:orange";';}}
        echo ">☆</button>";
        echo "</form>";
        echo "</div>";


     // ajout/suppression collection add
if (isset($_POST['add'])){
    if ($_POST['add'] == "add"){
        $Upcollec = 1;
    } else {
        $Upcollec = 0;
    }
    $reqAdd = "SELECT * FROM ajoutcollection WHERE idUtilisateur = {$user} AND idLivre = {$idLivre}";
    $resAdd = mysqli_query($link,$reqAdd);
    $rowAdd = mysqli_num_rows($resAdd);
    if ($rowAdd == 0){
        $addAdd = "INSERT INTO  ajoutcollection (idUtilisateur,idLivre,ajout) VALUES ({$user},{$idLivre},{$Upcollec})";
        $resAddAdd = mysqli_query($link,$addAdd);
    }
    else{
        $addAdd = "UPDATE ajoutcollection SET ajout = {$Upcollec} WHERE idUtilisateur = {$user} AND idLivre = {$idLivre}";
        $resAddAdd = mysqli_query($link,$addAdd);
    }

}

    //bouton pour ajouter le livre à la collection (ajout collection)
    echo "
    <div class='add'>
        <h2 id='Tadd'>Ajouter à ma collection :</h2>
        <form method='post' action='livre.php?idLivre=".$idLivre."'>";
        $reqAdd = "SELECT ajout FROM ajoutcollection WHERE idUtilisateur = {$user} AND idLivre = {$idLivre}";
        $resAdd = mysqli_query($link,$reqAdd);
        $rowsAdd = mysqli_fetch_row($resAdd);
        $numAdd = mysqli_num_rows($resAdd);
        
        if (($numAdd==1 && $rowsAdd[0] == 0 ) || (isset($_POST['add']) && $_POST['add'] == 'remove') || $numAdd ==0){
            echo "<button type='submit' name='add' value='add' class='addButton'>Ajouter</button>";
        }else{
            echo "<button type='submit' name='add' value='remove' class='addButton'>Supprimer</button>";
        }
  
        echo '
        <div class="bookre">
            <label id="BookRead">

                <input class="box" type="checkbox" name="bookread" ';
                $reqRead = "SELECT * FROM ajoutcollection WHERE idLivre = {$idLivre} AND idUtilisateur = {$user} AND lu = 1";
                $resRead = mysqli_query($link,$reqRead);
                $rowsRead = mysqli_num_rows($resRead);
                if ($rowsRead == 1 || isset($_POST['bookread'])){
                    echo 'checked="checked"';
                }
                echo ' onchange="submit();"">
                Livre lu
            </label>';

            echo '  <br>
            <label id="BookHave">
                <input class="box" type="checkbox" name = "bookhave" ';
                $reqHave = "SELECT * FROM ajoutcollection WHERE idLivre = {$idLivre} AND idUtilisateur = {$user} AND possede = 1";
                $resHave = mysqli_query($link,$reqHave);
                $rowsHave = mysqli_num_rows($resHave);
                if ($rowsHave == 1 || isset($_POST['bookhave'])){
                    echo 'checked="checked"';
                }
                echo 'onchange="submit();"">
                Livre possédé
            </label>
            </div>
        </form>
    </div>';

    // affichage des informations
    echo "<div class='info'>";
    echo "<h2 id='Tinfo'>Informations :</h2>";
    echo "<p id='info'>Date de parution : ".dateFormat($row[3])."</p>";
    echo "<p id='info'>Genre : ".$row[5]."</p>";
    echo "<p id='info'>Registre : ".livreEstRegistre($idLivre)."</p>";
    echo "<p id='info'>Auteur(s) : ".livreEstEcritPar($idLivre)."";
    echo "</div>";
    
    mysqli_free_result($result_livre);
}
else {
    echo "Erreur: Impossible d'executer la requete $req_livre. " . mysqli_error($link);
    exit;
}





// affichage des commentaires
$req_note = "SELECT note FROM ajoutcollection WHERE idLivre = {$idLivre} AND note IS NOT NULL";
$result_note = mysqli_query($link,$req_note);
$rows_note = mysqli_num_rows($result_note);
if (isset($_POST['note'])){
    $_SESSION['note'] +=1;
}else {
    $_SESSION['note'] = $rows_note;
}

$req_comments = "SELECT avis,note,nomUtilisateur,dateCommentaire FROM ajoutcollection INNER JOIN utilisateur USING(idUtilisateur) WHERE idLivre = {$idLivre} AND avis IS NOT NULL ORDER BY dateCommentaire DESC";
if ($result_comments = mysqli_query($link,$req_comments)){
    
    echo 
    "<div class='grid_comment'>
        <div class='box_comment'>
            <h2>Commentaires <span>(".$_SESSION['note']." évaluations : ".moyNotes($idLivre)."/5)</span></h2>
            ";
            echo "
            <h3>Ajouter un commentaire</h3>
            <form method='post' action='livre.php?idLivre={$idLivre}'>
                <textarea name='comment' placeholder='Votre commentaire...'></textarea>
                <br>
                <input type='submit' name='submit' value='Ajouter'>
                
            </form>
            ";
            
    if (isset($_POST['comment'])){
        $dateC = date("d/m/Y");
        $reqComment = "SELECT note,nomUtilisateur FROM ajoutcollection INNER JOIN utilisateur USING(idUtilisateur) WHERE idLivre = {$idLivre} AND idUtilisateur = {$user}";
        $resComment = mysqli_query($link,$reqComment);
        $rowComment = mysqli_fetch_row($resComment);
        echo  "
        <div class='comment'>
            <p>".$rowComment[1]." - <span class='noteStar'>".noteStyle($rowComment[0])."</span> - <span class='dateComment'>".$dateC."</span></p>
            <p class='avisUser'>".$_POST['comment']."</p>
        </div>";
    }
    while ($row_comments = mysqli_fetch_row($result_comments)){
        if (isset($_POST['comment']) == False || $row_comments[0] != $_POST['comment']){
            echo "
            <div class='comment'>
                <p>".$row_comments[2]." - <span class='noteStar'>".noteStyle($row_comments[1])."</span> - <span class='dateComment'>".dateFormat($row_comments[3])."</span></p>
                <p class='avisUser'>".$row_comments[0]."</p>
                
            </div>";
        }
    }
        echo "
        </div>
        <div>
        </div>
    </div>";
}

    //ajout des notes en bd

    if (isset($_POST['note'])){
        $note = $_POST['note'];
        $reqNote = "SELECT * FROM ajoutcollection WHERE idLivre = {$idLivre} AND idUtilisateur = {$user}";
        $resNote = mysqli_query($link,$reqNote);
        $rowsNote = mysqli_num_rows($resNote);
        if ($rowsNote == 0){
            $addNote = "INSERT INTO ajoutcollection (idLivre,idUtilisateur,note) VALUES ($idLivre,$user,$note[0])";
            $resNote= mysqli_query($link,$addNote);
        }
        else {
            $updateNote = "UPDATE ajoutcollection SET note = $note[0] WHERE idLivre = {$idLivre} AND idUtilisateur = {$user}";
            $resNote= mysqli_query($link,$updateNote);
        }
    
    }

// ajouter un commentaire

if (isset($_POST['comment'])){
    $comment = $_POST['comment'];
    $dateC = date("Y-m-d");
    $reqComment = "SELECT * FROM ajoutcollection WHERE idLivre = {$idLivre} AND idUtilisateur = {$user}";
    $resComment = mysqli_query($link,$reqComment);
    $rowsComment = mysqli_num_rows($resComment);
    if ($rowsComment == 0){
        $addComment = "INSERT INTO ajoutcollection (idLivre,idUtilisateur,avis,dateCommentaire) VALUES ($idLivre,$user,'".formatComment($comment)."','$dateC')";
        $resComment= mysqli_query($link,$addComment);
    }
    else {
        $updateComment = "UPDATE ajoutcollection SET avis = '".formatComment($comment)."',dateCommentaire='".$dateC."' WHERE idLivre = {$idLivre} AND idUtilisateur = {$user}";
        $resComment= mysqli_query($link,$updateComment);
    }
}

// ajout collection lu et possédé
$reqCollec = "SELECT * FROM ajoutcollection WHERE idUtilisateur = {$user} AND idLivre = {$idLivre}";
$resCollec = mysqli_query($link,$reqCollec);
$rowsCollec = mysqli_num_rows($resCollec);


if (isset($_POST['bookread'])){
    $lu = 1;
}else{
    $lu = 0;
}
if (isset($_POST['bookhave'])){
    $possede = 1;
}else{
    $possede = 0;
}

$reqCollec = "SELECT * FROM ajoutcollection WHERE idUtilisateur = {$user} AND idLivre = {$idLivre}";
$resCollec = mysqli_query($link,$reqCollec);
$rowsCollec = mysqli_num_rows($resCollec);
if ($rowsCollec==0){
    $addCollec = "INSERT INTO ajoutcollection (idUtilisateur,idLivre,lu,possede) VALUES ({$user},{$idLivre},{$lu},{$possede})";
    $resAddCollec = mysqli_query($link,$addCollec);
}
else{
    $addCollec = "UPDATE ajoutcollection SET lu = {$lu}, possede = {$possede} WHERE idUtilisateur = {$user} AND idLivre = {$idLivre}";
    $resAddCollec = mysqli_query($link,$addCollec);
}

?>
        <script src="JSscripts/theme.js"></script>
    </body>
</html>
